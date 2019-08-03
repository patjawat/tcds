from flask import Flask, request, jsonify
from flask_restful import Resource, Api, reqparse
from flask_cors import CORS
from pathlib import Path
import pandas as pd
import os
import shutil
from pyzbar import pyzbar
import argparse
import cv2
import datetime
from PIL import Image
# import psycopg2
import mysql.connector
from mysql.connector import Error
from mysql.connector import errorcode
import simplejson as json
import requests
import json

SOURCE_PATH = "../web/document-qr-him"
DIST_PATH = "../web/document-qr"
root_dir = Path(SOURCE_PATH)



def moveFile(hn,data,dataText):
        filename = dataText+'.'+data.name.split('.')[1]
        # print(filename)
  
        # check directory
        dir_path = DIST_PATH+'/'+hn
        if not os.path.exists(dir_path):
                os.makedirs(dir_path)
        # End Check directory
        shutil.copyfile(data,dir_path+'/'+filename)   #คัดลอกจากต้นฉบับมาที่ปลายทาง
        os.remove(data)
        return filename
        

def ReadQR(data):
    image = cv2.imread(str(data))
    decodedObjects = pyzbar.decode(image)
    
    for obj in decodedObjects:
        dataText = obj.data.decode("utf-8")
        dataType = obj.type
        if(dataType == 'QRCODE'):
                hn = dataText.split('-')[0]
                vn = dataText.split('-')[1]
                docType = dataText.split('-')[2]
                page = dataText.split('-')[3]
                # fileName = 
                fileName = dataText+'.'+data.name.split('.')[1]
                
                payload = {'file_name':fileName,'hn':hn,'vn':vn,'type_id':docType,'page':page}
                r = requests.post("http://192.168.1.3:81/index.php?r=api/add-qr",json=payload)
                
                if(r.text != 'null'):
                        print('Scan '+fileName+' To database')
                        moveFile(hn,data,dataText)
                else:
                        print('skip => '+fileName)
        else:
                ''

if(root_dir.iterdir()):
        for item in root_dir.iterdir():
#                 #อ่าน QR-Code แล้วบันทึก
                file = item.name
                if os.path.splitext(file)[1] == ".jpg":
                        ReadQR(item)
