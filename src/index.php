<?php
    namespace peter\Scheduler;
    require_once __DIR__.'/../vendor/autoload.php';
    require_once __DIR__.'/Loader.php';
    require_once __DIR__.'/SendMail.php';

    use Illuminate\Queue\Worker;

    $queue = Loader::loadDriver();

    $worker = new Worker($queue->getQueueManager(), null, null);

    $theTime = time();
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
