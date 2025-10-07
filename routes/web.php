<?php

use App\Http\Controllers\AdminForecastController;
use App\Http\Controllers\AdminWeatherController;
use App\Http\Controllers\ForecastController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserCityController;
use App\Http\Controllers\WeatherController;
use App\Http\Middleware\AdminCheckMiddleware;
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

Route::view("/", "welcome");

Route::controller(ForecastController::class)->prefix('/forecast/')->name('forecast.')->group(function ()
{
    Route::get("search", "search")->name("search");
    Route::get("{city:name}",  "index")->name("permalink");

});

Route::view("/about", "about");

Route::get("/favourites", function () {
    $userFavourites = [];
    $user = Auth::user();
    if ($user !== null) {
        $userFavourites = UserCityModel::where([
            'user_id' => $user->id
        ])->get();
    }
    return view("favourites", compact("userFavourites"));
})->name("forecast.favourites");


Route::get("/today", [WeatherController::class, "all"]);



Route::controller(UserCityController::class)->prefix('user-')->name('forecast.')->group(function ()
{
    Route::get("favourite/{city}",  "favourite")->name("favourite");
    Route::get("unfavourite/{city}", "unfavourite")->name("unfavourite");
});


Route::middleware(['auth', AdminCheckMiddleware::class])->prefix('admin')->controller(AdminWeatherController::class)->group(function ()
{
    Route::view("/weather", "weather.addFormWeather");
    Route::post("/weather/update",  "update")->name("weather.update");
    Route::view("/forecasts", "weather.addForecast");
    Route::post("/forecasts/add",  "add")->name("forecast.add");
});










require __DIR__.'/auth.php';
