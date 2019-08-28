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

import simplejson as json
import requests
import json

# SOURCE_PATH = "../mount/ttr-scan-files"
# DIST_PATH = "../web/document-qr"

SOURCE_PATH = "/var/www/mount/ttr-scan-files"
DIST_PATH = "../web/document-qr"
root_dir = Path(SOURCE_PATH)


def ReadQR(item):

        try:
            image = Image.open(item)
            image.verify() # ถ้าไฟล์ใช้งานได้
            # print('Valid image')
            img = cv2.imread(str(item))

            image = Image.open(item)
            barcodes = pyzbar.decode(image)
            for barcode in barcodes:
                (x, y, w, h) = barcode.rect
                barcodeData = barcode.data.decode("utf-8")
                barcodeType = barcode.type
                # print(item.name)
                if(barcodeType == 'QRCODE'): # ตรวจสอบ ประเภท QRCODE
                    if (barcodeData.split('-')[0]) == "tcds": # ถ่าเป็นของ TCDS ให้แยกข้อมูลดังนี้
                        hn = barcodeData.split('-')[1]
                        vn = barcodeData.split('-')[2]
                        docType = barcodeData.split('-')[3]
                        page = barcodeData.split('-')[4]
                        fileName = barcodeData+'.jpg'
                        dep = item.name.split('-_')[0]
                        # print(barcodeData)

                        payload = { # เก็ยตัวแปรเป็น JSON
                            'file_name': fileName,
                            'hn': hn,
                            'vn': vn,
                            'type_id': docType,
                            'page': page,
                            'dep': dep
                        }
                        # r = requests.post(
                        #     "http://10.1.88.8/tcds/web/index.php?r=api/add-qr", data=payload)
                        #     # "http://127.0.0.1:81/index.php?r=api/add-qr", data=payload)
                        # if(r.text != 'null'): # ถ้ามีการบัยทึกฝั่ง server สำเร็จ ให้เก็บไฟล์
                        #     dir_path = DIST_PATH+'/'+hn+'/'
                        #     if not os.path.exists(dir_path):
                        #         os.makedirs(dir_path)

                        #     image.convert('L').save(dir_path+barcodeData+'.jpg')
                        #     print('Scan '+fileName+' To database Success')
                        #     os.remove(item)
                        #     moveFile(hn, data, dataText)
                        
                        # else:
                        #     print('skip => '+fileName)
                            # print(item)

        except Exception: # ถ้าช้ไม่ได้ให้ผ่านไป
            print('Invalid image'+str(item))


if(root_dir.iterdir()):
    for item in root_dir.iterdir():
        file = item.name

        if os.path.splitext(file)[1] == '.TIF':
            if file.split('-_')[0]:
                ReadQR(item)
        elif os.path.splitext(file)[1] == '.tif':
            if file.split('-_')[0]:
                ReadQR(item)
        # else:
            
        os.remove(item)

        # cv2.imwrite("new_img.jpg", img)
        # barcodeData = barcode.data.decode("utf-8")
        # barcodeType = barcode.type
