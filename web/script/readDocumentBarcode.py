import sys
import time
from pathlib import Path
import os
import shutil
# from pyzbar import pyzbar
# from pyzbar.pyzbar import decode
# import argparse
# import cv2

from PIL import Image
# import psycopg2
hn  = str(sys.argv[1])
SOURCE_PATH = '/Users/patjawat/dev/scriptsoft/medicong-dev/web/REG_TIF/'+hn
DISINATION_PATH = '/Users/patjawat/dev/scriptsoft/medicong-dev/web/REG_JPG/' 

root_dir = Path(SOURCE_PATH)
items = root_dir.iterdir()
dir_path = []
filename = []
doc_type = []
barcode_form = []
#นำภาพมาวน loop
nums = []
for sub_dir in root_dir.iterdir():
   # print(sub_dir.name) # การแสดง 01 02 03 
    
    for file in sub_dir.iterdir():
        nums.append(sub_dir.name+'/'+file.name.split('.')[0]) 
        if (file.is_file()):
            file_name = file.name.split('.')[0]
            # print(file_name) 
            
            disination_dir = '/Users/patjawat/dev/scriptsoft/medicong-dev/web/REG_JPG/'+hn+'/'+ str(sub_dir.name)+'/' # กำหนดที่วางไฟล์
            newfile = disination_dir+str(file_name)+'.jpg'
            # print(newfile)
            checkfile = file.name.split('.')[1]
            # print(checkfile)
            if not os.path.exists(disination_dir):
            #ถ้ายังไม่มี directory ให้สร้างตามรูปแบบของต้นทางที่คักลอกมา
                os.makedirs(disination_dir)
            if(checkfile == 'tif'):
                image = Image.open(file)

                        #ถ้าเป็นนามสกุล .tif ตัวเล็กให้แปลเป็น .TIF ตัวใหญ่  
                shutil.copyfile(file, disination_dir+str(file.name))   
                disination = disination_dir+file.name.split('.')[0]+".TIF"
                os.rename(disination_dir+str(file.name),disination)  
                image.convert('L').save(disination_dir+str(file_name)+'.jpg')
                os.remove(disination)
            elif(checkfile == 'db'):
                            # ถ้าเป็นนามสกุล .db ไม่ต้องทำอะไร
                # print('Thumbs.db ===> Not Convert')
                ''
            elif(checkfile == 'TIF'):
                        
                    # ถ้าเป็นนามสกุล .TIF ตัวใหญ่อยู่แล้วให้เปิดไฟล์
                    image = Image.open(file)
                    if not os.path.exists(disination_dir):
                        #ถ้ายังไม่มี directory ให้สร้างตามรูปแบบของต้นทางที่คักลอกมา
                        os.makedirs(disination_dir)
                    if (os.path.isfile(newfile)):
                        # print('Is File => '+newfile)
                        ''
                    else:
                        image.convert('L').save(disination_dir+str(file_name)+'.jpg')
                        #ReadBarcode(file)
                        disination = disination_dir+str(file_name)+'.jpg'
                        # barcode = ReadBarcode(disination)
                        # InsertDB(item.name,file_name,barcode,sub_dir.name)
                        # print(str(file)+'  ------> '+ str(disination_dir))
                        # nums.append(22)

print(nums)