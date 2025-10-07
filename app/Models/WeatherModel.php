<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WeatherModel extends Model
{
    const TABLE = "weather";
    protected $table = self::TABLE;

    protected $fillable = [
        "city_id", "temperature",
        ];

    public function city()
    {
     return $this->hasOne(CitiesModel::class, "id", "city_id");
    }
}
