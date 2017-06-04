<?php
    namespace peter\Scheduler;
    require_once __DIR__.'/../vendor/autoload.php';
    require_once __DIR__.'/Loader.php';
    require_once __DIR__.'/MonitorJob.php';
    require_once __DIR__.'/WeatherJob.php';

    use Illuminate\Queue\Worker;

    $queue = Loader::loadDriver();

    $worker = new Worker($queue->getQueueManager(), null, null);

    $theTime = time();
    echo 'The Queue Worker ha been started...'.PHP_EOL.PHP_EOL;
    // Run indefinitely
    while (true) {
        // Parameters:
        // 'default' - connection name
        // 'default' - queue name
        // delay
        // time before retries
        // max number of tries
        $worker->pop('default', 'default', 0, 3, 1);
        $timeout = time() - $theTime;
        if ($timeout > 120) {
            break;
        }
    }
