<?php

namespace App\Console\Commands;

use App\Models\CitiesModel;
use App\Models\ForecastModel;
use App\Models\WeatherModel;
use App\Services\WeatherService;
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
        $cityName = ucfirst(strtolower($this->argument("city")));


        $dbCity = CitiesModel::where('name', $cityName)->first();



        if ($dbCity && $dbCity->todayForecast && $dbCity->todayForecast->forecast_date == now()->toDateString()) {
            $this->getOutput()->comment("Forecast for {$cityName} is already up to date.");
            return;
        }


        $weatherService = new WeatherService();
        $convertJson = $weatherService->getForecast($cityName);


        if (isset($convertJson['error'])) {
            $this->getOutput()->error("City '{$cityName}' not found in API.");
            return;
        }


        if (!$dbCity) {
            $realCityName = $convertJson['location']['name'] ?? $cityName;
            $dbCity = CitiesModel::create(['name' => $realCityName]);
        }

        $forecastData = $convertJson['forecast']['forecastday'][0];
        $temperature = $forecastData['day']['avgtemp_c'];
        $forecastDate = $forecastData['date'];
        $weather_type = strtolower($forecastData['day']['condition']['text']);
        $probability = $forecastData['day']['daily_chance_of_rain'];


        ForecastModel::where('city_id', $dbCity->id)
            ->whereDate('forecast_date', '<', now()->toDateString())
            ->delete();


        ForecastModel::updateOrCreate(
            [
                'city_id' => $dbCity->id,
                'forecast_date' => $forecastDate,
            ],
            [
                'temperature' => $temperature,
                'weather_type' => $weather_type,
                'probability' => $probability,
            ]
        );

        WeatherModel::create(
            [
                'city_id' => $dbCity->id,
                'temperature' => $temperature
            ]);

        $this->getOutput()->info("Weather for {$cityName} updated successfully!");
    }

}
