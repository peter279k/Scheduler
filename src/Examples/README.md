# Introduction

The ```job.php``` is the sample code for calling two jobs.

The ```WeatherJob``` and ```MonitorJob```.There are all in the ```src``` folder.

## Create the jobs

If you want to create your own job, you can create the ```YourJob``` class in ```YourJob.php``` file and put it in the ```src``` folder.

And Remember to add the ```require_once __DIR__.'/WeatherJob.php';``` in ```worker.php```.

You have to notice that the namespace so you need to set the right namespace in ```YourJob.php``` and ```job.php```.
