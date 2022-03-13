import numpy
from matplotlib import pyplot as plt
from libKMCUDA import kmeans_cuda
import cv2
import time
import sys
import glob
import pandas as pd


def retrieveDir(inputDir):
	fileList = glob.glob(inputDir+"*.tiff")
	count = 0
	for file in fileList:
		print(count)
		print(file)
		openConvert(file)
		count = count + 1



def openConvert(filename):
	im = cv2.imread(filename,1) 									#open
	im = cv2.cvtColor(im, cv2.COLOR_BGR2RGB)						#Colorspace Conversion
	#print(im.shape) Left in for Numpy Shape diagnostics
	height, width, channels = im.shape  							#Determine arraysize
	imFlat = im.flatten().reshape((height*width), channels)
	cudaArray = imFlat.astype(numpy.float32) 							#unsigned integer 8 = 2^8; exactly 256 possible.

	calcCentroids(cudaArray, int(sys.argv[2]), float(sys.argv[3]), int(sys.argv[4]))	#pass to Calc Centroids


def calcCentroids(arr, numClusters, reassignTol, GpuID,):
	centroids, assignments = kmeans_cuda(arr, numClusters, tolerance=reassignTol,  init="k-means++", verbosity=0, seed=0, device=GpuID)

	palette = centroids.astype(numpy.uint8) 						#re-convert due to float on GPU process.
	df = pd.DataFrame(palette)
	df.drop_duplicates(keep='first', inplace=True)
	df = df.values
	unique, counts = numpy.unique(assignments, return_counts=True)	#get unique counts of EACH assignment in centroid array. 
	counts = counts.reshape(unique.size)							#Reshape to 1-D
	presortArr = numpy.hstack((counts[:, None], df))			#Sort of nasty -> assign count to their true index value
	indexArr = numpy.argsort(presortArr[:,0])[::-1]					#Sort by *unique counts*, drag actual RGB Value along with (inversion for printing purposes)
	sortedArr = presortArr[indexArr]								
	#print(sortedArr)												Kept for diagnostics
	array = numpy.array_split(sortedArr, [1], axis=1)   
	
	countsArray = array[0]											#Final True Counts
	colorsArray = numpy.true_divide(array[1],255)					#/255 for pyplot RGB nonsense
	total = numpy.sum(countsArray)		
	print(sortedArr)


def main():
	start_time = time.time() #For performance purposes
	inputDir = sys.argv[1] #Get arguments in order ------>          GPUKmeans.py <input dir> <outputdir> <clusters> <tolerance> <GpuID>
	print(sys.argv[1], sys.argv[2], sys.argv[3], sys.argv[4])
	retrieveDir(inputDir)
	end_time = time.time() - start_time
	print(end_time)
	#convertedResult =  openConvert(inputDir)
	#counts, colors, total = calcCentroids(convertedResult, int(clusterCount), float(tolerance), int(GpuID))
main()