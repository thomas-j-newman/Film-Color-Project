#include <opencv2/core.hpp>
#include <opencv2/opencv.hpp>
#include <opencv2/videoio.hpp>
#include <opencv2/imgproc.hpp>
#include <opencv2/imgcodecs.hpp>
#include <iostream>
#include <thread>
#include <stdio.h>
#include <string>
#include <ctime>
#include <vector>


using namespace cv;
using namespace std;



void threadWriteFunction(int startFrame, int endFrame){             //Initialize a thread.
VideoCapture video("filmRepo/dunkirk.mp4");
video.set(CV_CAP_PROP_POS_FRAMES, startFrame);
  for(int i = startFrame; i <= endFrame; i = i + 1){                 //Main file writing.
    Mat frame;
    video >> frame;
    if(frame.empty()){
      frame.release();
      return;
    }
    vector<uchar> buf;
    imencode(".tiff", frame, buf);
    string fileName = "frame" + to_string(i) + ".tiff";
    imwrite("/mnt/filmOutput/dunkirk/"+ fileName, frame);
    frame.release();
  }
  return;                                                             //End main writing Logic.
}                                                                     //Return to Parent Process.


int main( int argc, char** argv ) {

  int startTime = clock();                                            //start CPU execution timer//
  VideoCapture video("filmRepo/dunkirk.mp4");
  if(!video.isOpened()) {
      cout <<  "Could not open or find the video file." << endl;
      return -1;
    }
  else{ cout << "Successfully opened file.\n" << endl;}

  Mat frame;                                                        //Gather video File object.
  video.read(frame);
  int numTotalFrames = video.get(CV_CAP_PROP_FRAME_COUNT);
  double fps = video.get(CV_CAP_PROP_FPS);
  cout << numTotalFrames << " Frames in video file at " << fps << " frames per second." << endl;


  frame.release();                                                  //Release file object

  int CPU_CORES = 23;
  cout << CPU_CORES << endl;
  int increment = (numTotalFrames - (numTotalFrames % CPU_CORES))/CPU_CORES;
  int a = 0;
  int overflow = (numTotalFrames % CPU_CORES);
  cout << "increment is: " << increment << endl;
  int b = a + increment;
  cin.get();
  vector<thread> threads;
  for (int i = 0; i < CPU_CORES; i++){
    threads.push_back(thread(threadWriteFunction, a, b));
    cout << "Thread number " << i << " A and B are: " << a << "||"<< b << endl;
    a = b + 1;
    b = b + (increment + overflow);
    overflow = 0;
    }
    
  for (int j = 0; j < CPU_CORES; j++){
    threads.at(j).join();
  }
 

//end CPU execution timer//
  int endTime = clock();
cout << "Execution Time: " << (double(endTime-startTime)/1000000)/23 << endl;
return 0;
}
