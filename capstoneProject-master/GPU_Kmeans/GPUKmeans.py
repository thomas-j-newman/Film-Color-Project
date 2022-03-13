import numpy
from matplotlib import pyplot as plt
from libKMCUDA import kmeans_cuda
import cv2
import time
import sys



def openConvert(filename):
	im = cv2.imread(filename,1) 									#open
	im = cv2.cvtColor(im, cv2.COLOR_BGR2RGB)						#Colorspace Conversion
	#print(im.shape) Left in for Numpy Shape diagnostics
	height, width, channels = im.shape  							#Determine arraysize
	imFlat = im.flatten().reshape((height*width), channels)
	cudaArray = imFlat.astype(numpy.float32) 							#unsigned integer 8 = 2^8; exactly 256 possible.

	return cudaArray												#return result



def calcCentroids(arr, numClusters, reassignTol):
	centroids, assignments = kmeans_cuda(arr, numClusters, tolerance=reassignTol,  init="k-means++", verbosity=0, seed=0)

	palette = centroids.astype(numpy.uint8) 						#re-convert due to float on GPU process.
	palette = palette.flatten().reshape(numClusters,3)				#Cluster count with channels
	unique, counts = numpy.unique(assignments, return_counts=True)	#get unique counts of EACH assignment in centroid array. 
	counts = counts.reshape(numClusters)							#Reshape to 1-D

	presortArr = numpy.hstack((counts[:, None], palette))			#Sort of nasty -> assign count to their true index value
	indexArr = numpy.argsort(presortArr[:,0])[::-1]					#Sort by *unique counts*, drag actual RGB Value along with (inversion for printing purposes)
	sortedArr = presortArr[indexArr]								
	#print(sortedArr)												Kept for diagnostics
	array = numpy.array_split(sortedArr, [1], axis=1)   
	
	countsArray = array[0]											#Final True Counts
	colorsArray = numpy.true_divide(array[1],255)					#/255 for pyplot RGB nonsense
	total = numpy.sum(countsArray)									#total Unique counts summation for graphin ratios.

	return countsArray, colorsArray, total



def plotter(counts, colors, total ,outputdir):
		
	bottomAccumulation = 0											#Relevent for adjusting "height markers" on each bar color-subplot
	for j in range(len(counts)):
		plt.bar(1, (counts[j]/total), color=colors[j], width=1, bottom=bottomAccumulation)
		bottomAccumulation = bottomAccumulation + (counts[j]/total)	#Accumulates "height"
	
	plt.axis('off')													#Matplotlib off axis
	fig = plt.gcf()													#Re-grab current figure
	fig.set_size_inches(3, 10)										#Scale for acceptable manip later
	fig.savefig(outputdir, bbox_inches='tight')						#Save with Out-directory



def main():
	start_time = time.time() #For performance purposes
	
	inputDir = sys.argv[1] #Get arguments in order ------>          GPUKmeans.py <input dir> <outputdir> <clusters> <tolerance>
	outputdir = sys.argv[2]
	clusterCount = sys.argv[3]
	tolerance = sys.argv[4]

	#Send args to open and BGR2RGB conversion
	convertedResult =  openConvert(inputDir)
	counts, colors, total = calcCentroids(convertedResult, int(clusterCount), float(tolerance))
	endtime = (time.time() - start_time)							#Monitor time w/o plot time
	
	print("--------This operation took %s seconds ----------" % endtime)
	
	plotter(counts, colors, total, outputdir)						#Plot image


main()