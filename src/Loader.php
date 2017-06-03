<?php
    namespace peter\Scheduler;

    use Illuminate\Queue\Capsule\Manager as Queue;
    use Illuminate\Encryption\Encrypter;

    class Loader {
        private static $driver = 'beanstalkd';
        private static $host = 'localhost';
        private static $queue = 'default';

        public function __construct() {}

        public static function loadDriver() {
            $queuer = new Queue;

            // Some drivers need it
            $queuer->getContainer()->bind('encrypter', function() {
                return new Encrypter('my-queue');
            });

            // Configure the connection to Beanstalk
            // Note: The second parameter is the connection name
            // We also define a queue name
            // We will need these two names later

            $queuer->addConnection([
                    'driver' => Loader::$driver,
                    'host' => Loader::$host,
                    'queue' => Loader::$queue,
                ], 'default');
            return $queuer;
        }
    }
