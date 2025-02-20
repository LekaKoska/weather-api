<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class CitiesModel extends Model
{
    protected $table = "cities";

    protected $fillable = ['name',];

    public function forecast()
    {
        return $this->hasMany(ForecastModel::class, "city_id", "id")
            ->orderBy("forecast_date");
    }

    public function todayForecast()
    {
        return $this->hasOne(ForecastModel::class, "city_id", "id") // Nadji mi vezu izmedju ovogo modela i Forecast
            ->whereDate("forecast_date", Carbon::now()); // Pronadji mi datum forecast_date koji je isti kao i danasnji
    }
}
