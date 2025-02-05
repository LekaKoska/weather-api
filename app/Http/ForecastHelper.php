<?php

    namespace App\Http;

    use App\Models\ForecastModel;

    class ForecastHelper
    {
        public static function getColorByTemperature($temperature)
        {

            if($temperature <= 0)
            {
                $boja = "lightblue";
            }
            else if($temperature >= 1 && $temperature <= 10)
            {
                $boja = "blue";
            }
            else if($temperature > 10 && $temperature < 25)
            {
                $boja = "green";
            }
            else
            {
                $boja = "red";
            }
            return $boja;
        }

        public static function getIconByWeatherType($type)
        {
//        <i class="fa-regular fa-snowflake"></i>
//        <i class="fa-regular fa-sun"></i>
//        <i class="fa-solid fa-cloud-rain"></i>

            if($type == "sunny")
            {
                $icon = "fa-sun";
            }
            else if($type == "snowy")
            {
                $icon = "fa-snowflake";
            }
            else if($type == "rainy")
            {
                $icon = "fa-cloud-rain";
            }

            return $icon;
        }



    }

