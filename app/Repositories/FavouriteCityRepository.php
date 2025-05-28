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
     UserCityModel::create(
            [
                "user_id" => $user->id,
                "city_id" => $city            ]
        );

   } 
}