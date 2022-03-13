import numpy as np
import mpl_toolkits.mplot3d.axes3d as p3
import matplotlib.pyplot as plt
from libKMCUDA import kmeans_cuda
import time
import cv2
import matplotlib.animation as animation


start_time = time.time()
im = cv2.imread("frame10000.tiff",1) #hardcoded need to change in next versions. Same for all files.
im = cv2.cvtColor(im, cv2.COLOR_BGR2RGB)
print(im.shape)
newim = im.flatten().reshape(2073600, 3)
CUDAArr = newim.astype(np.uint16)
centroids, assignments = kmeans_cuda(CUDAArr, 10, tolerance=0.005,  init="k-means++", verbosity=0, seed=0)

palette = centroids.astype(np.uint8)
palette = palette.flatten().reshape(10,3)
unique, counts = np.unique(assignments, return_counts=True)
counts = counts.reshape(10)
presortArr = np.hstack((counts[:, None], palette))
indexArr = np.argsort(presortArr[:,0])[::-1]
sortedArr = presortArr[indexArr]
a = np.array_split(sortedArr, [1], axis=1)     
countsArr = a[0]
colorsArr = a[1]
R_channel = sortedArr[:,[1,]]
G_channel = sortedArr[:,[2,]]
B_channel = sortedArr[:,[3,]]

countsArr = np.true_divide(countsArr,200)
colorsArr = np.true_divide(colorsArr,255)
fig = plt.figure()
ax = p3.Axes3D(fig)
ax.scatter(R_channel, G_channel, B_channel, marker='o',  facecolors=colorsArr, s=countsArr,  depthshade=True)

ax.set_xlabel('R')
ax.set_ylabel('G')
ax.set_zlabel('B')
fig.add_axes(ax)

def rotate(angle):
	ax.view_init(azim=angle)

print("Making animation...")

rot_animation = animation.FuncAnimation(fig, rotate, frames=np.arange(0,362,2), interval=75)
rot_animation.save("frame10000DunkirkKmeans3D.gif", dpi=100, writer='imagemagick')
plt.show()
