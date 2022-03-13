import numpy
from matplotlib import pyplot as plt
import cv2
import matplotlib.image as mpimg
import time


start_time = time.time()
im = cv2.imread("frame10000.tiff",1)
im = cv2.cvtColor(im, cv2.COLOR_BGR2RGB)
print(im.shape)
newim = im.reshape(2073600, 3)
TtenArr = newim.astype(numpy.uint16)
unique, counts = numpy.unique(TtenArr, return_counts=True, axis=0)

countsTop = (counts[numpy.argsort(counts)[-10:]])

x = numpy.empty([10])
for j in range(10):
	x[j] = (numpy.argwhere(counts==countsTop[j]))


x= x.astype(int)
x = x[::-1]
colorsArr = numpy.empty([10,3])
countsTop = countsTop[::-1]
for i in range(10):
	colorsArr[i] = unique[x[i]]

colorsArr = numpy.true_divide(colorsArr, 255)
total = numpy.sum(countsTop)
bottomAccumulation = 0

for z in range(len(countsTop)):
	plt.bar(1, (countsTop[z]/total), color=colorsArr[z], width=1, bottom=bottomAccumulation)
	bottomAccumulation = bottomAccumulation + (countsTop[z]/total)
	print(unique[x[z]], countsTop[z])

plt.axis('off')
plt.savefig("Kmeans.png", bbox_inches='tight', pad_inches=0, frameon=False)
plt.show()
