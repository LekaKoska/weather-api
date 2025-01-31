<?php

namespace App\Http\Controllers;

use App\Models\CitiesModel;
use App\Models\ForecastModel;
use Illuminate\Http\Request;

class ForecastController extends Controller
{
    public function index(CitiesModel $city)
    {

       $cities = ForecastModel::where(['city_id' => $city->id])->get();

        return view("weather.forecast", compact("cities"));
    }
}
