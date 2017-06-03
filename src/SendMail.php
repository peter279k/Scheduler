<?php
    namespace peter\Scheduler;
    require_once __DIR__.'/../vendor/autoload.php';

    use Cmfcmf\OpenWeatherMap;
    use Cmfcmf\OpenWeatherMap\Exception as OWMException;

    class SendMail {
        public function fire($job, $data) {
            echo 'Sending email to '.$data['email'].PHP_EOL;
        }
    }
