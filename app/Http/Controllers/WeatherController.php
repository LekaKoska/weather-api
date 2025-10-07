<?php

namespace App\Http\Controllers;

use App\Models\CitiesModel;
use App\Models\WeatherModel;
use Illuminate\Http\Request;
use Illuminate\View\View;

class WeatherController extends Controller
{
    public function all(): View
    {
        return view("weather.prognoza", ['weather' => WeatherModel::paginate()]);
    }



}
