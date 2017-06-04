<?php

require_once __DIR__.'/../../vendor/autoload.php';
require_once __DIR__.'/../Loader.php';

use Illuminate\Queue\Capsule\Manager as Queue;
use peter\Scheduler\Loader;
use peter\Scheduler\WeatherJob;
use peter\Scheduler\MonitorJob;

// Make this Capsule instance available globally via static methods... (optional)
$queue = Loader::loadDriver();
$queue->setAsGlobal();
//Queue::push(WeatherJob::class, ['email' => 'masnun@gmail.com']);
Queue::push(MonitorJob::class, ['email' => 'masnun@gmail.com',
    'urls' => [
        'peter279k.com.tw',
        'www.goo.com',
        '12345678',
    ]
]);
