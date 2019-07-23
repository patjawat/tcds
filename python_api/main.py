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


# #กำหนดที่เก็บรูปภาพ
# DATASET_PATH = '/mnt/medico/REG'
# root_dir = Path(DATASET_PATH)
# items = root_dir.iterdir()

app = Flask(__name__)
# Enable CORS
CORS(app)


# function

def ReadQR(data):
    image = cv2.imread(str(data))
    decodedObjects = pyzbar.decode(image)
    for obj in decodedObjects:
        dataText = obj.data.decode("utf-8")
        dataType = obj.type
        # hn = dataText.split('/')[0]
        # vn = dataText.split('/')[1]
        # docType = dataText.split('/')[2]
        # vDate = dataText.split('/')[3]
        # print('HN: '+hn)
        # print('VN: '+vn)
        # print('DOCTYPE: '+docType)
        # print('DATE: '+vDate)
        # print(dataType+'/'+dataText)


def InsertDB(hn,sub_dir,filename,barcode,type):
			payload = {'hn':hn,'sub_dir':sub_dir,'filename':filename,'barcode':barcode,'type':type}
			r = requests.post("http://192.168.1.23/tcds/web/index.php?r=api/add-barcode",json=payload)
			print(r.text)


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






# End Function
@app.route('/')
def Home():
    return "<h1 style='text-align:center'>Python App API</h1>"


@app.route("/barcode-him", methods=["POST"])
def predict():
	result = 0
	if request.method == "POST":
            hn = request.form["hn"]
            # print(hn)
            ConvertFile(hn)
            # return hn
            return jsonify(
                prediction=hn
            ), 201
            # for item in items:
                # return input_value


@app.route("/document-qr", methods=["GET"])
def documentQR():
	DATASET_PATH = "../web/REG_JPG/460028/01"
	root_dir = Path(DATASET_PATH)
	items = root_dir.iterdir()
	for item in items:
		if item.is_dir():
			''
			# print(items)

	# return jsonify(
	# 	ReadQR(88)
	# ),201
	# return ReadQR(88)


def ConvertFile(hn):
	# print(hn)
	# กำหนดที่เก็บรูปภาพ

	DATASET_PATH = '../web/REG/'+hn
	root_dir = Path(DATASET_PATH)
	items = root_dir.iterdir()
	for item in items:
		# print(item)
		if item.is_dir():
			# 1 ภาพอาจมีหลายหน้า loop แยกในหน้าอีก 1 ชั้น
			his_directory = item  # ที่อยู่ของ File ต้นฉบับ

			# dis_dir = 'REG2/'+hn+'/'+str(item.name)
			dis_dir = '../web/REG2/'+hn+'/'+str(item.name)
            			# ตรวจสอบ directory ถ้าไม่มีให้สร้าง
			if not os.path.exists(dis_dir):
				os.makedirs(dis_dir)

			for sub_dir in item.iterdir():
                        # sub_dir =  REG/1000053/01/6103150045-2.TIF
                            file = sub_dir.name
                            file_name = file.split('.')[0]  # แยกชื่อไฟล์
                            file_type = file.split('.')[1]  # แยกนามสกุล
                            source = str(his_directory)+'/'+str(file_name)+".TIF"
                            disination = str(dis_dir)+'/'+str(file_name)+".TIF"

                            if file_type == 'tif':
                                        shutil.copyfile(sub_dir, str(dis_dir)+'/'+str(file_name)+'.TIF')
                                        print('tif')
                            elif file_type == 'db':
                                        # print('Thumbs.db ===> Not Convert')
                                        ''
                            elif file_type == 'TIF':
                                        image = Image.open(source)
                                        image.convert('L').save(str(dis_dir)+'/' + str(file_name)+'.jpg')
                                        barcode = ReadBarcode(str(dis_dir)+'/'+str(file_name)+'.jpg')
                                        InsertDB(hn,item.name,file_name,barcode,file_type)
                                        # print(barcode)
                            elif file_type == 'jpg':
                                        ''
                            else:   
                                # print(dis_dir+'/'+str(file_name)+'.jpg')
                                print('else')



