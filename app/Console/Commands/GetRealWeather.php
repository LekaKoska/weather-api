<?php

namespace App\Console\Commands;

use App\Models\CitiesModel;
use App\Models\ForecastModel;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class GetRealWeather extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'weather:get-real {city}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command is used to synchronize real weather data with our app with open API ';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        $city = $this->argument("city");
        $dbCity = CitiesModel::where(['name' => $city])->first();  // Proveravamo da li grad postoji
        if($dbCity === null)
        {
            $dbCity = CitiesModel::create(['name' => $city]);
        }
        if($dbCity->todayForecast !== null ) // ako postoji
        {
            $this->getOutput()->comment("Command finished");
            return;                          // zaustavlja kod
        }

        $url = "http://api.weatherapi.com/v1/forecast.json";



        $response = Http::get($url,
            [   "key" => env("WEATHER_API_KEY"),
                "q" =>  $city,
                "aqi" => "no",
                "days" => 1,
            ]);
        $convertJson = $response->json();
        if(isset($convertJson['error']))
        {
            $this->getOutput()->error($convertJson['error']['message']);
        }


        $temperature = $convertJson['forecast']['forecastday'][0]['day']['avgtemp_c'];
        $forecastDate = $convertJson['forecast']['forecastday'][0]['date'];
        $weather_type = $convertJson['forecast']['forecastday'][0]['day']['condition']['text'];
        $probability = $convertJson['forecast']['forecastday'][0]['day']['daily_chance_of_rain'];

        $forecast = [
            'city_id' => $dbCity->id,
            'temperature' => $temperature,
            'forecast_date' => $forecastDate,
            'weather_type' => strtolower($weather_type),
            'probability' => $probability
        ];

        ForecastModel::create($forecast);
        $this->getOutput()->comment("Added new city!");
    }
}
