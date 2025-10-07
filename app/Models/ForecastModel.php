<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ForecastModel extends Model
{
    const TABLE = "forecast";
    protected $table = self::TABLE;
    protected $fillable = [
        'city_id', 'temperature', 'forecast_date', 'weather_type', 'probability',
    ];

    const WEATHER = ['sunny', 'rainy', 'snowy', 'cloudy'];
    public function city()
    {
        return $this->hasOne(CitiesModel::class, "id", "city_id");
    }


}
