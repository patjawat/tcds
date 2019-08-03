from pyzbar import pyzbar
import argparse
import numpy as np
import cv2
from pathlib import Path

# image =cv2.imread("../web/document-qr-him/test-qr2.001.png")

# decodedObjects = pyzbar.decode(image)
# for obj in decodedObjects:
#     print("Type:", obj.type)
#     print("Data: ", obj.data, "\n")

# cv2.imshow("Frame", image)
# cv2.waitKey(0)


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
        print(dataType+'/'+dataText)


DATASET_PATH = "../web/document-qr-him"
root_dir = Path(DATASET_PATH)
items = root_dir.iterdir()
for item in items:
    # for sub_dir in item.iterdir():
	    # print(sub_dir)
    ReadQR(item)


