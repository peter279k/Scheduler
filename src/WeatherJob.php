<?php
    namespace peter\Scheduler;

    require_once __DIR__.'/../vendor/autoload.php';
    require_once __DIR__.'/SendMail.php';

    use Cmfcmf\OpenWeatherMap as WeatherMap;
    use Cmfcmf\OpenWeatherMap\Exception as OWMException;

    class WeatherJob implements SendMail{
        public function fire($job, $data) {
            if(isset($data['email'])) {
                echo 'Sending weather info to '.$data['email'].PHP_EOL;
                $this::getWeather($data['city'], $data['lang'], $data['api-key']);
            } else {
                echo 'The e-mail address missing...'.PHP_EOL;
            }
        }

        private static function getWeather($city, $lang, $apiKey) {
            // Language of data (try your own language here!):
            if(is_null($lang)) {
                $lang = 'tw';
            }
            if(is_null($city)) {
                $city = 'Taipei';
            }
            if(is_null($apiKey)) {
                // Important!This api key is only for testing and nobody can guarantee to make the key available.
                $apiKey = '2695cefb6769d1fa95be8c9ec3bdbcdd';
            }

            // Units (can be 'metric' or 'imperial' [default]):
            $units = 'metric';

            // Create OpenWeatherMap object.
            // Don't use caching (take a look into Examples/Cache.php to see how it works).
            $owm = new WeatherMap($apiKey);

            try {
                $weather = $owm->getWeather('Taipei', $units, $lang);
            } catch(OWMException $e) {
                echo 'OpenWeatherMap exception: ' . $e->getMessage() . ' (Code ' . $e->getCode() . ').'.PHP_EOL;
            } catch(\Exception $e) {
                echo 'General exception: ' . $e->getMessage() . ' (Code ' . $e->getCode() . ').'.PHP_EOL;
            }

            echo $weather->temperature.PHP_EOL;
            echo $weather->city->name.PHP_EOL;
            echo $weather->precipitation.PHP_EOL;
            echo $weather->weather->getIconUrl().PHP_EOL;
            echo $weather->weather->description.PHP_EOL;
        }
    }
