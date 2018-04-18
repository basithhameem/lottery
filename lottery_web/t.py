# USAGE
# python detect_mrz.py --images examples

# import the necessary packages
from __future__ import print_function
import pyzbar.pyzbar as pyzbar
from imutils import paths
import numpy as np
import imutils
import cv2
import pymysql
import argparse






# construct the argument parse and parse the arguments
ap = argparse.ArgumentParser()
ap.add_argument("-i", "--images", required=True, help="path to images directory")
args = vars(ap.parse_args())

def decode(im) : 
  # Find barcodes and QR codes
  decodedObjects = pyzbar.decode(im)
 
  # Print results
  for obj in decodedObjects:
  	code = str(obj.data)[2:-1]  # convert it to string and removed " 'b " from left and" ' "" from right
  	return code
    #print( obj.data,'\n')
     
  return decodedObjects

# initialize a rectangular and square structuring kernel
rectKernel = cv2.getStructuringElement(cv2.MORPH_RECT, (13, 4))
sqKernel = cv2.getStructuringElement(cv2.MORPH_RECT, (15, 15))

# loop over the input image paths
i =1
for imagePath in paths.list_images(args["images"]):
	# load the image, resize it, and convert it to grayscale
	image = cv2.imread(imagePath)

	gray = cv2.cvtColor(image, cv2.COLOR_BGR2GRAY)
	cv2.imshow("original", image)
	cv2.imshow("resize", image)
	cv2.imshow("gray", gray)
	cv2.waitKey(0)

