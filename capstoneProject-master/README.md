# Capstone Project
This serves as a repository for all contributions to the "Film Color Trends" research project. 


### Installation instructions

Generally, the order is:

1. Ubnutu 18.04
2. Cuda 10.0
3. OpenCV
4. IDE of user preference

#### Installing Cuda
The CUDA version used with this project is the CUDA toolkit 10.0. This toolkit requires an Nvdia Graphics card, and a reccommended driver version of at least ~410 (415 in current use). Make sure to source .bashrc with the following appended in order to create library links (default installation pathway). This package will also install the latest nvidia stable release, if you haven't already, and will blacklist nouveau if required.

#### In console

```
sudo dpkg -i cuda-repo-ubuntu1804_10.0.130-1_amd64.deb
**Get Key at prompt**
sudo apt-get update
sudo apt-get install cuda
(After sourcing below)
nvcc --Version
```
```
export PATH=$PATH:/usr/local/cuda-10.0/bin
export CUDADIR=/usr/local/cuda-10.0
export LD_LIBRARY_PATH=$LD_LIBRARY_PATH:/usr/local/cuda-10.0/lib64
```


#### Building OpenCV on top of CUDA:
This part is a little tricky - I've listed the CMakeFile flags below that allowed me to compile on a x64 Ubuntu 18.04 Distro. Generally speaking the process is smooth; note the inclusion of two critical flags **OPENCV_EXTRA_MODULES_PATH=..** and **BUILD_opencv_cudacodec=OFF**. For some reason compilation issues are experienced in toolkit 10.0 with various codec plugins. The OpenCV Variant used is ***3.4.2***.


```
# Build tools:
sudo apt-get install -y build-essential cmake

# Media I/O:
sudo apt-get install -y zlib1g-dev libjpeg-dev libwebp-dev libpng-dev libtiff5-dev libjasper-dev libopenexr-dev libgdal-dev

# Video I/O:
sudo apt-get install -y libdc1394-22-dev libavcodec-dev libavformat-dev libswscale-dev libtheora-dev libvorbis-dev libxvidcore-dev libx264-dev yasm libopencore-amrnb-dev libopencore-amrwb-dev libv4l-dev libxine2-dev

# Parallelism and linear algebra libraries:
sudo apt-get install -y libtbb-dev libeigen3-dev

sudo cmake -DBUILD_TIFF=ON -DWITH_CUDA=ON -DCUDA_TOOLKIT_ROOT_DIR=/usr/local/cuda-10.0 -DWITH_TBB=ON -DENABLE_PRECOMPILED_HEADERS=OFF -DOPENCV_EXTRA_MODULES_PATH=~/OpenCV/opencv_contrib-3.4.2/modules -DBUILD_opencv_cudacodec=OFF -DOPENCV_GENERATE_PKGCONFIG=ON -DCUDA_GENERATION=Auto ..

make -j4
sudo make install
sudo ldconfig
```

### Project Contents:
