<?php

namespace App\Repositories;

use  App\Models\UserCityModel;

class FavouriteCityRepository
{
    private  $userCityModel;

   public function __construct()
   {
    $this->userCityModel = new UserCityModel();
   }

   public function addToFavourite($city, $user)
   {
    return  UserCityModel::create(
            [
                "user_id" => $user->id,
                "city_id" => $city            ]
        );

   }

   public function unfavourite($city, $user)
   {
     $userFavourites = UserCityModel::firstWhere([
            'city_id' => $city,
            'user_id' => $user->id
        ]);
       return $userFavourites->delete();
   }
}
