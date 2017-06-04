# Scheduler

## Introduction

This project is an easy queue scheduler and help you build Queue server easiy.

It also provide Job sample code for sending action to the Queue server.

## Features

- It's easy to build the Queue service.
- It has the completed Sample code for creating the job.
- It has completed tutirial for building the Queue service.

## Usage

Before strating the easy Queue package, you need to do the following things:

### Operating System

You need to have own Unix-like OS.
Such as the Linux distro.For example, the Ubuntu, CentOS, Debian ans so on.

We strongly recommend you use the __Ubuntu__ for this tutorial because it woked well for our testing.

### Install the required package

We have some packages for this repo.Here is the installing command for __Ubuntu 16.04 LTS__.

```bash
sudo apt-get update
sudo apt-get install beanstalkd
sudo apt-get install php7.0-cli
```

### Getting Statred

This section is the tutorial. Here we go!

- Clone the repo.

```bash
git clone https://github.com/peter279k/Scheduler.git
```

- Download composer.phar and install the required packages.

```bash
curl -sS https://getcomposer.org/installer | php
cd path/to/this-project-root
php composer.phar install
```

- Create the job

The job is an action and asks for Queue to complete the action.

You can refer the ```job.php``` in ```Examples``` folder to understand how to create the jobs and push them to Queue.

You can refer the ```SendMail.php``` in ```src``` folder to understand how to extend this calss and create the job classes(such as ```WeatherJob.php``` and ```MonitorJob.php```) and let them call in ```job.php```.

- Start the Queue pool

Using the following command:

```bash
php path/to/Scheduler/src/worker.php
```
__The Queue pool will be expired after 2 minutes.__

__The timeout is not available for customizing value.__

If you have to make the queue non-stop, you can create a crontab job.

```bash
sudo contab -e
# add the following cron job in the cron file.
* * * * * php path/to/Scheduler/src/worker.php >> /dev/null 2>&1
```

- Start the Job via PHP CLI in terminal

```bash
php job.php
```

If you run the ```job.php```, you will look at the terminal window and notice that the output from the job handlers.

## Support

If you have some problems during building the projects, you can feel free to create issues or send the following e-mail address:
__peter279k@gmail.com__.

## Report

If you find some bugs or vulnerabilities, please feel free to send this e-mail address:
__peter279k@gmail.com__.

## References

We refer this [blog post](http://masnun.com/2015/05/24/using-laravel-queues-standalone-outside-laravel.html) and complete this project.
