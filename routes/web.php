<?php

use App\Http\Controllers\AdminWeatherController;
use App\Http\Controllers\ForecastController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WeatherController;
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

Route::view("/about", "about");

Route::view("/shop", "shop");

Route::get("/prognoza", [WeatherController::class, "all"]);

Route::get("/forecast/{city:name}", [ForecastController::class, "index"]);

Route::middleware('auth')->prefix('admin')->group(function ()
{
    Route::view("/weather", "weather.addFormWeather");
    Route::post("/weather/update", [AdminWeatherController::class, "update"])
    ->name("weather.update");
});










require __DIR__.'/auth.php';
