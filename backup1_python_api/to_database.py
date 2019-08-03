
from pathlib import Path
import pandas as pd
import os
import shutil


from pyzbar import pyzbar
import argparse
import cv2

from PIL import Image
import psycopg2

def InsertDB(hn,filename,barcode,type):
        # print(barcode)
        try:
            connection = psycopg2.connect(user="postgres",password="1",host="127.0.0.1",port="5432",database="medicong-dev")
            cursor = connection.cursor()

            postgres_insert_query = """ INSERT INTO m_document (hn,filename, barcode, type ) VALUES (%s,%s,%s,%s)"""
            record_to_insert = (hn,str(filename),str(barcode),str(type))
            cursor.execute(postgres_insert_query, record_to_insert)

            connection.commit()
            count = cursor.rowcount
            # print (count, "Record inserted successfully into mobile table")

        except (Exception, psycopg2.Error) as error :
            if(connection):
                    print("Failed to insert record into mobile table", error)
                    

        finally:
                #closing database connection.
                if(connection):
                    cursor.close()
                    connection.close()
                    # print("PostgreSQL connection is closed")



def ReadBarcode(file):
        image = Image.open(file)

    # อ่าน barcode 
        image = cv2.imread(str(file))
        barcodes = pyzbar.decode(image)
        for barcode in barcodes:
            (x, y, w, h) = barcode.rect
            cv2.rectangle(image, (x, y), (x + w, y + h), (0, 0, 255), 2)
            barcodeData = barcode.data.decode("utf-8")
            barcodeType = barcode.type
                        # text = "{} ({})".format(barcodeData, barcodeType)
            text = "{}".format(barcodeData)
            return text
            # print(text)

        # print('xx')

# InsertDB()
#กำหนดที่เก็บรูปภาพ
DATASET_PATH = '/mnt/medico/REG'
#กำหนดที่เก็บ file.csv
OUTPUT_FILE = 'index.csv'

root_dir = Path(DATASET_PATH)
items = root_dir.iterdir()
dir_path = []
filename = []
hn = []
doc_type = []
barcode_form = []
#นำภาพมาวน loop
count = 0
for item in items:
    if item.is_dir():
        # print(item.name)

        # 1 ภาพอาจมีหลายหน้า loop แยกในหน้าอีก 1 ชั้น
        for sub_dir in item.iterdir():
            for file in sub_dir.iterdir():
                if (file.is_file()):
                    file_name = file.name.split('.')[0]
                    directory = '/mnt/medico/REG2/'+item.name+'/'+ str(sub_dir.name)
                    newfile = directory+'/'+str(file_name)+'.jpg'
                    # print(file.name)
                    checkfile = file.name.split('.')[1]
                    if not os.path.exists(directory):
                                #ถ้ายังไม่มี directory ให้สร้างตามรูปแบบของต้นทางที่คักลอกมา
                                os.makedirs(directory)

                    if(checkfile == 'tif'):
                        image = Image.open(file)

                        #ถ้าเป็นนามสกุล .tif ตัวเล็กให้แปลเป็น .TIF ตัวใหญ่  
                        shutil.copyfile(file, directory+'/'+str(file.name))   
                        disination = directory+'/'+file.name.split('.')[0]+".TIF"
                        os.rename(directory+'/'+str(file.name),disination)  
                        image.convert('L').save(directory+'/'+str(file_name)+'.jpg')
                        os.remove(disination)

                        print('Convert .tif ===>> .TIF')
                    elif(checkfile == 'db'):
                            # ถ้าเป็นนามสกุล .db ไม่ต้องทำอะไร
                            print('Thumbs.db ===> Not Convert')
                    elif(checkfile == 'TIF'):
                        
                            # ถ้าเป็นนามสกุล .TIF ตัวใหญ่อยู่แล้วให้เปิดไฟล์
                            image = Image.open(file)
                            if not os.path.exists(directory):
                                #ถ้ายังไม่มี directory ให้สร้างตามรูปแบบของต้นทางที่คักลอกมา
                                os.makedirs(directory)
                            
                            if (os.path.isfile(newfile)):
                                    # print('Is File => '+newfile)
                                # print('')
                                ''
                            else:
                                image.convert('L').save(directory+'/'+str(file_name)+'.jpg')
                            #     ReadBarcode(file)
                            disination = directory+'/'+str(file_name)+'.jpg'
                            barcode = ReadBarcode(disination)
                            InsertDB(item.name,file_name,barcode,sub_dir.name)
                            print(str(file)+'  ------> '+ str(disination))

                    


                        # dir_path.append(sub_dir)
                        # filename.append(file_name)
                        # hn.append(item.name)
                        # doc_type.append(sub_dir.name)
                        # barcode_form.append(text)
                        # InsertDB(item.name,file_name,barcode,sub_dir.name)

                                       

    # raw_data = {'hn': hn, 'dir_path': dir_path, 'type':doc_type, 'filename': filename,'barcode':barcode_form}
    # df = pd.DataFrame(raw_data, columns = ['hn','dir_path', 'type', 'filename','barcode'])
    # df.to_csv(OUTPUT_FILE)
# InsertDB()
