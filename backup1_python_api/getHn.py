# from flask import Flask, request, jsonify
# from flask_restful import Resource, Api, reqparse
# from flask_cors import CORS
from pathlib import Path
import pandas as pd
import os
import shutil
from pyzbar import pyzbar
import argparse
import cv2

from PIL import Image
import psycopg2

hn = '156656'

#กำหนดที่เก็บรูปภาพ
DATASET_PATH = 'REG/'+hn
root_dir = Path(DATASET_PATH)
items = root_dir.iterdir()
for item in items:
    # print(item)
    if item.is_dir():
        # 1 ภาพอาจมีหลายหน้า loop แยกในหน้าอีก 1 ชั้น
        his_directory = item # ที่อยู่ของ File ต้นฉบับ
        medico_directory = 'REG2/'+hn+'/'+str(item.name)

        #ตรวจสอบ directory ถ้าไม่มีให้สร้าง
        if not os.path.exists(medico_directory):
            os.makedirs(medico_directory)

        for sub_dir in item.iterdir():
            # sub_dir =  REG/1000053/01/6103150045-2.TIF
            file = sub_dir.name
            file_name = file.split('.')[0] #แยกชื่อไฟล์
            file_type = file.split('.')[1] #แยกนามสกุล

            source = str(his_directory)+'/'+str(file_name)+".TIF"
            disination = str(medico_directory)+'/'+str(file_name)+".TIF"
            if(file_type == 'tif'):
                # print(sub_dir)
                    # image = Image.open(file)
                    # print(str(sub_dir)+' => '+ str(medico_directory)+'/'+str(file_name)+'.TIF')
                    shutil.copyfile(sub_dir,str(medico_directory)+'/'+str(file_name)+'.TIF')   #คัดลอกจากต้นฉบับมาที่ปลายทาง
                    
                    image = Image.open(source)   
                    image.convert('L').save(str(medico_directory)+'/'+str(file_name)+'.jpg') #แปลง จาก TIF เป็น jpg
                    os.remove(disination)
            elif(file_type == 'db'):
                            # ถ้าเป็นนามสกุล .db ไม่ต้องทำอะไร
                            print('Thumbs.db ===> Not Convert')
            elif(file_type == 'TIF'): # ถ้าเป็น .TIF ให้ convert ได้เลย
                    image = Image.open(source)   
                    image.convert('L').save(str(medico_directory)+'/'+str(file_name)+'.jpg') #แปลง จาก TIF เป็น jpg
