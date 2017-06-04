<?php
    namespace peter\Scheduler;

    require_once __DIR__.'/../vendor/autoload.php';
    require_once __DIR__.'/SendMail.php';

    class MonitorJob implements SendMail {
        private static $urls = [
            'mywebservice.info',
            'peter279k.com.tw',
            'www.goo.com',
            '12345678',
        ];
        public function fire($job, $data) {
            if(isset($data['email'])) {
                echo 'Sending server status to '.$data['email'].PHP_EOL;
                if(empty($data['urls'])) {
                    $data['urls'] = $this::$urls;
                }
                $this::monitorServer($data['urls']);
            } else {
                echo 'The e-mail address missing...'.PHP_EOL;
            }
        }
        private static function monitorServer($urls) {
            foreach($urls as $value) {
                $ch = curl_init();
                $options = [
                    CURLOPT_URL => $value,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_TIMEOUT => 60,
                ];
                curl_setopt_array($ch, $options);
                $result = curl_exec($ch);
                $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                if(empty($httpCode)) {
                    echo 'The site '.$value.' is not available.'.PHP_EOL;
                } else {
                    if ($httpCode == 200 || $httpCode == 301 || $httpCode == 302) {
                        echo 'The site '.$value.' is online.'.PHP_EOL;
                    } else if ($httpCode >= 500) {
                        echo 'The site has some trouble now...'.PHP_EOL;
                    } else {
                        echo 'The site '.$value.' is HTTP status code: '.$httpCode.' now.'.PHP_EOL;
                    }
                }
                curl_close($ch);
            }
        }
    }
