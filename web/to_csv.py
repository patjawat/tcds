from pathlib import Path
import pandas as pd
import os


from pyzbar import pyzbar
import argparse
import cv2

from PIL import Image
#กำหนดที่เก็บรูปภาพ
DATASET_PATH = 'REG'
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
for item in items:
    if item.is_dir():
        # print(item.name)
        
        # 1 ภาพอาจมีหลายหน้า loop แยกในหน้าอีก 1 ชั้น
        for sub_dir in item.iterdir():
            for file in sub_dir.iterdir():
                if (file.is_file()):
                    file_name = file.name.split('.')[0]

                    directory = 'REG2/'+item.name+'/'+ str(sub_dir.name)
                    newfile = directory+'/'+str(file_name)+'.jpg'
                    image = Image.open(file)
                    if not os.path.exists(directory):
                        os.makedirs(directory)
                        print('copy To  => '+directory)
                        
                        
                        # newfile = image.convert('L').save(directory+'/'+str(file_name)+'.jpg')
                        print(newfile)
                    else:
                        if (os.path.isfile(newfile)):
                            print('Is File => '+newfile)
                        else:
                            image.convert('L').save(directory+'/'+str(file_name)+'.jpg')
                            print('convert File => '+newfile)

                            

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
                        # print(sub_dir.name)

                        dir_path.append(sub_dir)
                        filename.append(file_name)
                        hn.append(item.name)
                        doc_type.append(sub_dir.name)
                        barcode_form.append(text)
                        

    raw_data = {'hn': hn, 'dir_path': dir_path, 'type':doc_type, 'filename': filename,'barcode':barcode_form}
    df = pd.DataFrame(raw_data, columns = ['hn','dir_path', 'type', 'filename','barcode'])
    df.to_csv(OUTPUT_FILE)
