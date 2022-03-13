#CPU IMPLEMENTATION FOR REFERENCE
import time
import numpy as np
import pylab as pl
from sklearn.cluster import MiniBatchKMeans, KMeans
import cv2


start_time = time.time()
im = cv2.imread("frame23000.tiff",1)
print(im.shape)
newim = im.flatten().reshape(2073600, 3)
k_means = KMeans(init='k-means++', n_clusters=10, n_init=25)
t0 = time.time()
k_means.fit(newim)
t_batch = time.time() - t0
k_means_labels = k_means.labels_
k_means_cluster_centers = k_means.cluster_centers_
k_means_labels_unique = np.unique(k_means_labels)
RGBArr = k_means_cluster_centers.astype(np.uint8)
print(RGBArr)
print("--------This operation took %s seconds ----------" % t_batch)