<?php

namespace App\Http\Controllers;

use App\Models\CitiesModel;
use App\Models\WeatherModel;
use Illuminate\Http\Request;

class WeatherController extends Controller
{
    public function all()
    {
        $weather = WeatherModel::all();

        return view("weather.prognoza", compact("weather"));
    }



}
