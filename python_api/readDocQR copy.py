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

# SOURCE_PATH = "../web/document-qr-him"
# DIST_PATH = "../web/document-qr"
SOURCE_PATH = "../mount/ttr-scan-files"
DIST_PATH = "../web/document-qr"
root_dir = Path(SOURCE_PATH)


def ReadQR(item):
    img = cv2.imread(str(item))
    barcodes = pyzbar.decode(img)
    for barcode in barcodes:
        (x, y, w, h) = barcode.rect
        barcodeData = barcode.data.decode("utf-8")
        barcodeType = barcode.type
        if(barcodeType == 'QRCODE'):
            if (barcodeData.split('-')[0]) == "tcds":
                hn = barcodeData.split('-')[1]
                vn = barcodeData.split('-')[2]
                docType = barcodeData.split('-')[3]
                page = barcodeData.split('-')[4]
                fileName = barcodeData+'.'+item.name.split('.')[1]
                payload = {'file_name': fileName, 'hn': hn,
                           'vn': vn, 'type_id': docType, 'page': page}
                r = requests.post(
                    "http://192.168.1.3:81/index.php?r=api/add-qr", data=payload)
                if(r.text != 'null'):
                    print('Scan '+fileName+' To database Success')
                    moveFile(hn, data, dataText)
                else:
                    print('skip => '+fileName)
                dir_path = DIST_PATH+'/'+hn+'/'
                print(item)
                if not os.path.exists(dir_path):
                    os.makedirs(dir_path)
                cv2.imwrite(dir_path+barcodeData+'.jpg', img)


if(root_dir.iterdir()):
    for item in root_dir.iterdir():
        file = item.name
        if os.path.splitext(file)[1] == ".jpg":
            ReadQR(item)

        elif os.path.splitext(file)[1] == '.TIF':
            ReadQR(item)
        elif os.path.splitext(file)[1] == '.png':
            ReadQR(item)
        #     print(item.name)

        # cv2.imwrite("new_img.jpg", img)
        # barcodeData = barcode.data.decode("utf-8")
        # barcodeType = barcode.type
