<?php

use App\Http\Controllers\AdminForecastController;
use App\Http\Controllers\AdminWeatherController;
use App\Http\Controllers\ForecastController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserCityController;
use App\Http\Controllers\WeatherController;
use App\Models\UserCityModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get("/", function ()
{
    $userFavourites = [];
    $user = Auth::user();
    if($user !== null)
    {
       $userFavourites = UserCityModel::where([
           'user_id' => $user->id
       ])->get();
    }

    return view("welcome", compact("userFavourites"));
});
Route::get("/forecast/search", [ForecastController::class, "search"])
->name("forecast.search");

Route::view("/about", "about");

Route::view("/shop", "shop");

Route::get("/prognoza", [WeatherController::class, "all"]);

Route::get("/forecast/{city:name}", [ForecastController::class, "index"])
->name("forecast.permalink");

Route::get("/user-favourite/{city}", [UserCityController::class, "favourite"])
    ->name("forecast.favourite");

Route::get("/user-unfavourite/{city}", [UserCityController::class, "unfavourite"])
->name("forecast.unfavourite");

Route::middleware(['auth', AdminCheckMiddleware::class])->prefix('admin')->group(function ()
{
    Route::view("/weather", "weather.addFormWeather");
    Route::post("/weather/update", [AdminWeatherController::class, "update"])
    ->name("weather.update");
    Route::view("/forecasts", "weather.addForecast");
    Route::post("/forecasts/add", [AdminForecastController::class, "add"])
    ->name("forecast.add");
});










require __DIR__.'/auth.php';
