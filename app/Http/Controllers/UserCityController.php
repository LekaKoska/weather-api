<?php

namespace App\Http\Controllers;

use App\Models\UserCityModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\FavouriteCityRepository;


class UserCityController extends Controller
{
    private $userCityRepo;

      public function __construct() 
        {
            $this->userCityRepo = new FavouriteCityRepository();
        }

    public function favourite(Request $request, $city)
    {
        

      
        $user = Auth::user();

        if($user === null)
        {
            return redirect()->back()->with("error", "You must be logged to favourite city");
        }

        $this->userCityRepo->addToFavourite($city, $user);

            return redirect()->back();
    }

    public function unfavourite(Request $request, $city)
    {
        $user = Auth::user();

        if($user === null)
        {
            return redirect()->back()->with("error", "You must be logged to favourite city");
        }

        $userFavourites = UserCityModel::where([
            'city_id' => $city,
            'user_id' => $user->id
        ])->first();
        $userFavourites->delete();

        return redirect()->back();
    }
}
