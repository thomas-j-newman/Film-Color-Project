# Film-Color-Project
This was a collaborative project done for the University of Missouri Capstone in CS/IT.

The intent of the project was to create a method which can take a film file and iterate through each of its frames and run an analysis of the colors used in each frame.
From each frame we created a method to determine the top 10 most "dominant" colors using the k-means algorithm to group colors.
We also created a method to extract the "true" top 10 colors of each frame, a pure count of which colors appeared most often by pixel count.
We then created a web survey to distribute and determine whether our "dominant" color selection results were human significant.


Example: 
Given image:
![mad max 1](https://user-images.githubusercontent.com/78329984/158067952-1c0b7a23-9095-4dad-b853-6cae44f2e8b8.png)

K-Means colors:
![Madmax_Kmeans_24970](https://user-images.githubusercontent.com/78329984/158067993-bd56c009-4b38-4079-8b39-2c348f0ce294.png)

True Top 10 colors:
![Madmax_T10_24970](https://user-images.githubusercontent.com/78329984/158068000-edc5ddc1-ed3d-423f-9bf3-6400b8c64ec2.png)

Graph: ![frame24970MadmaxKmeans3D](https://user-images.githubusercontent.com/78329984/158068003-e1ab51b5-cb0d-4f93-ad4d-928d8a320621.gif)
