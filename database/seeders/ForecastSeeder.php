<?php

namespace Database\Seeders;

use App\Models\CitiesModel;
use App\Models\ForecastModel;
use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ForecastSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


       $cities = CitiesModel::all();


       foreach ($cities as $city)
       {
           $lastTemperature = null;
           for ($i = 0; $i < 5; $i++)
           {

                $weatherType = ForecastModel::WEATHER[rand(0, 3)];
                $probability = null;

                if($weatherType === "rainy" || $weatherType === "snowy")
                {
                    $probability = rand(1, 100);
                }
                    $temperature = null;
                if($lastTemperature !== null)
                {
                   $minTemperature = $lastTemperature-5;      // 15  -  5  =  10
                   $maxTemperature = $lastTemperature+5;      // 15  +  5  =  20
                   $temperature = rand($minTemperature, $maxTemperature);
                }
                else
                {
                    switch ($weatherType)
                    {
                        case "sunny":
                            $temperature = rand(-20, 40);
                            break;

                        case "cloudy":
                            $temperature = rand(-15, 15);
                            break;

                        case "rainy":
                            $temperature = rand(40, -10);
                            break;

                        case "snowy":
                            $temperature = rand(-50, 1);
                            break;
                    }
                }



               ForecastModel::create([
                   'city_id' => $city->id,
                   'temperature' => $temperature,
                   'forecast_date' => Carbon::now()->addDays(rand(1, 30)),
                   'weather_type' => $weatherType,
                   'probability' => $probability
               ]);
                $lastTemperature = $temperature;
           }
       }
    }
}
