#!/usr/bin/env python
# USAGE
# python detect_mrz.py --images examples
# import the necessary packages
from __future__ import print_function
import pyzbar.pyzbar as pyzbar
from imutils import paths
import numpy as np
import argparse
import imutils
import cv2
import pymysql
import os

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
j = 2


photFolder = '/opt/lampp/htdocs/lottery/lottery_web/photo/'

while True:
	if  os.listdir(photFolder):	    		
		image = cv2.imread('photo/ticket.jpg')
		image = imutils.resize(image, height=600)
		gray = cv2.cvtColor(image, cv2.COLOR_BGR2GRAY)
		#cv2.imshow("resize", image)
		#cv2.imshow("gray", gray)
		#cv2.waitKey(0)
		# smooth the image using a 3x3 Gaussian, then apply the blackhat
		# morphological operator to find dark regions on a light background
		gray = cv2.GaussianBlur(gray, (3, 3), 0)
		blackhat = cv2.morphologyEx(gray, cv2.MORPH_BLACKHAT, rectKernel)
		#cv2.imshow("gaussian", gray)
		#cv2.imshow("Blackhat", blackhat)
		#cv2.waitKey(0)	
		# compute the Scharr gradient of the blackhat image and scale the
		# result into the range [0, 255]
		gradX = cv2.Sobel(blackhat, ddepth=cv2.CV_32F, dx=1, dy=0, ksize=-1)
		gradX = np.absolute(gradX)
		(minVal, maxVal) = (np.min(gradX), np.max(gradX))
		gradX = (255 * ((gradX - minVal) / (maxVal - minVal))).astype("uint8")

		# apply a closing operation using the rectangular kernel to close
		# gaps in between letters -- then apply Otsu's thresholding method
		gradX = cv2.morphologyEx(gradX, cv2.MORPH_CLOSE, rectKernel)
		thresh = cv2.threshold(gradX, 0, 255, cv2.THRESH_BINARY | cv2.THRESH_OTSU)[1]
		#cv2.imshow("gradx", gradX)
		#cv2.imshow("thresh_otsu", thresh)
		#cv2.waitKey(0)



		# perform another closing operation, this time using the square
		# kernel to close gaps between lines of the MRZ, then perform a
		# serieso of erosions to break apart connected components
		thresh = cv2.morphologyEx(thresh, cv2.MORPH_CLOSE, sqKernel)
		thresh = cv2.erode(thresh, None, iterations=4)
		#cv2.imshow("thrsh_morphology_sqr",thresh)
		#cv2.waitKey(0)
		# during thresholding, it's possible that border pixels were
		# included in the thresholding, so let's set 5% of the left and
		# right borders to zero
		p = int(image.shape[1] * 0.05)
		thresh[:, 0:p] = 0
		thresh[:, image.shape[1] - p:] = 0

		# find contours in the thresholded image and sort them by their
		# size
		cnts = cv2.findContours(thresh.copy(), cv2.RETR_EXTERNAL,
			cv2.CHAIN_APPROX_SIMPLE)[-2]
		cnts = sorted(cnts, key=cv2.contourArea, reverse=True)

		# loop over the contours
		for c in cnts:
			# compute the bounding box of the contour and use the contour to
			# compute the aspect ratio and coverage ratio of the bounding box
			# width to the width of the image
			(x, y, w, h) = cv2.boundingRect(c)
			ar = w / float(h)
			crWidth = w / float(gray.shape[1])
		#	print (ar)
		#	print (crWidth)
			# check to see if the aspect ratio and coverage width are within
			# acceptable criteria
			if ar > 2 and crWidth > 0.16:
				# pad the bounding box since we applied erosions and now need
				# to re-grow it
				pX = int((x + w) * 0.03)
				pY = int((y + h) * 0.03)
		#		print (pX)
		#		print (pY)
				(x, y) = (x - pX, y - pY)
				(w, h) = (w + (pX * 2), h + (pY * 2))

				# extract the ROI from the image and draw a bounding box
				# surrounding the MRZ
				roi = image[y:y + h, x:x + w].copy()
				cv2.rectangle(image, (x, y), (x + w, y + h), (0, 25, 30), 2)
				break
		for c in cnts:
			# compute the bounding box of the contour and use the contour to
			# compute the aspect ratio and coverage ratio of the bounding box
			# width to the width of the image
			(x, y, w, h) = cv2.boundingRect(c)
			ar = w / float(h)
			crWidth = w / float(gray.shape[1])
		#	print (ar)
		#	print (crWidth)
			# check to see if the aspect ratio and coverage width are within
			# acceptable criteria
			if ar > 1.6 and crWidth < 0.25:
				# pad the bounding box since we applied erosions and now need
				# to re-grow it
				pX = int((x + w) * 0.03)
				pY = int((y + h) * 0.03)
		#		print (pX)
		#		print (pY)
				(x, y) = (x - pX, y - pY)
				(w, h) = (w + (pX * 2), h + (pY * 2))

				# extract the ROI from the image and draw a bounding box
				# surrounding the MRZ
				roi2 = image[y:y + h, x:x + w].copy()
				cv2.rectangle(image, (x, y), (x + w, y + h), (0, 25, 30), 2)
				break

		# show the output images

		#cv2.imshow("Image", image)
		#cv2.imshow("ROI", roi)
		#cv2.imshow("ROI2",roi2)
		#cv2.imwrite("/home/pirate/Desktop/Lottery_project/lottery_pics/result/roi1-"+str(i)+".jpg",roi)
		#cv2.imwrite("/home/pirate/Desktop/Lottery_project/lottery_pics/result/roi2-"+str(i)+".jpg",roi2)
		i = i + 1
		#cv2.waitKey(0)




		secretCode = 	 decode(roi)
		print ("Secret code = " + secretCode)
		#cv2.waitKey(0)


		lottNo = decode(roi2)
		print ("lottNo = " + lottNo)
				

		conn = pymysql.connect(host="localhost", user="root",passwd="", db="lottery")
		myCursor = conn.cursor()
		myCursor.execute ("""
		UPDATE temp_ticket_info 
		SET x=%s, y=%s
		WHERE id=1
		""", (secretCode,lottNo))
		print("updated data in id 1")

		conn.commit()
		conn.close


		os.remove("photo/ticket.jpg")