<?php

use Illuminate\Queue\Capsule\Manager as Queue;
use peter\Scheduler\Loader;

require_once __DIR__.'/../../vendor/autoload.php';
require_once __DIR__.'/../Loader.php';

// Make this Capsule instance available globally via static methods... (optional)
$queue = Loader::loadDriver();
$queue->setAsGlobal();
Queue::push('peter\Scheduler\SendMail', array('email' => 'masnun@gmail.com'));
