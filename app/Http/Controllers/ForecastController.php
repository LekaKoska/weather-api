<?php

namespace App\Http\Controllers;

use App\Models\CitiesModel;
use App\Models\ForecastModel;
use Illuminate\Http\Request;
use Illuminate\Notifications\Action;
use Illuminate\Support\Facades\Auth;

class ForecastController extends Controller
{
    public function index(CitiesModel $city)
    {

       $cities = ForecastModel::where(['city_id' => $city->id])->get();

        return view("weather.forecast", compact("cities"));
    }

    public function search(Request $request)
    {
        $cityName = $request->get("city");

        $cities = CitiesModel::with("todayForecast")->where("name", "LIKE", "%$cityName%")->get();
       if(count($cities) == 0)
       {
           return redirect()->back()->with("error", "Nismo uspeli da pronadjemo zeljeni grad!");
       }

        $userFavourite = [];
       if(Auth::check())
       {
           $userFavourite = Auth::user()->cityFavourites;
           $userFavourite = $userFavourite->pluck("city_id")->toArray();
       }


        return view("search_results", compact("cities", "userFavourite"));
    }


}
