<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchCityRequest;
use App\Models\CitiesModel;
use App\Models\ForecastModel;
use App\Services\WeatherService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ForecastController extends Controller
{
    public function index(CitiesModel $city, WeatherService $weatherService): View
    {
        $cities = ForecastModel::where(['city_id' => $city->id])->get();

        $jsonResponse = $weatherService->getAstronomy($city->name);


        $location = $jsonResponse['location']['country'];
        $region = $jsonResponse['location']['region'];
        $sunrise = $jsonResponse['astronomy']['astro']['sunrise'];
        $sunset = $jsonResponse['astronomy']['astro']['sunset'];

        return view("weather.forecast", compact("cities", "sunrise", "sunset", 'location', 'region'));
    }

    public function search(SearchCityRequest $request, WeatherService $weatherService): RedirectResponse|View
    {
        $cityName = trim($request->get("city"));

        Artisan::call("weather:get-real", ["city" => $cityName]);

        $cities = $weatherService->citySearch($cityName);

        if ($cities->isEmpty()) {
            return redirect()->back()->with("error", "We can't find your city");
        }

        $userFavourite = [];
        if (Auth::check()) {
            $userFavourite = Auth::user()->cityFavourites->pluck("city_id")->toArray();
        }

        return view("search_results", compact("cities", "userFavourite"));
    }
}
