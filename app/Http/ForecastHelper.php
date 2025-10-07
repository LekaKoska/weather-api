<?php

    namespace App\Http;

    use App\Enum\WeatherType;
    use App\Models\ForecastModel;

    class ForecastHelper
    {
        public static function getColorByTemperature($temperature)
        {
            switch (true) {
                case $temperature === 0:
                    $color = 'lightblue';
                    break;
                case $temperature >= 1 && $temperature <= 10:
                    $color = 'blue';
                    break;
                case $temperature >= 11 && $temperature <= 25:
                    $color = 'green';
                    break;
                default:
                    $color = 'red';
            }

            return $color;

        }

        public static function getIconByWeatherType($type)
        {
            return match ($type) {
                WeatherType::SUNNY->value => 'fa-sun',
                WeatherType::SNOW->value  => 'fa-snowflake',
                WeatherType::RAIN->value  => 'fa-cloud-rain',
                WeatherType::CLOUD->value => 'fa-cloud',
                default  => 'fa-cloud',
            };

        }
    }

