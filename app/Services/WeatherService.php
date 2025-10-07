<?php

namespace App\Services;

use App\Models\CitiesModel;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Http;

class WeatherService
{
    public function getForecast($city)
    {
        $url = "http://api.weatherapi.com/v1/forecast.json";

        $response = Http::get($url,
            [   "key" => env("WEATHER_API_KEY"),
                "q" =>  $city,
                "aqi" => "no",
                "days" => 1,
            ]);

        return $response->json();

    }

    public function getAstronomy($city)
    {
        $url = "http://api.weatherapi.com/v1/astronomy.json";

        $response = Http::get($url,
            [
                "key" => env("WEATHER_API_KEY"),
                "q" =>  $city,
                "aqi" => "no"

            ]);

        return $response->json();
    }

    public function citySearch($cityName): Collection
    {
        return CitiesModel::with("todayForecast")
            ->where("name", "LIKE", "%{$cityName}%")
            ->get();
    }
}
