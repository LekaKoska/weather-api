<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserCityModel extends Model
{
    const TABLE = "user_cities";
    protected $table = self::TABLE;

    protected $fillable = ["user_id", "city_id"];

    public function city()
    {
        return $this->hasOne(CitiesModel::class, "id", "city_id");
    }
}
