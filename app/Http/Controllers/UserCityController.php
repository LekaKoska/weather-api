<?php

namespace App\Http\Controllers;

use App\Models\UserCityModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserCityController extends Controller
{
    public function favourite(Request $request, $city)
    {
        $user = Auth::user();

        if($user === null)
        {
            return redirect()->back()->with("error", "You must be logged to favourite city");
        }

        UserCityModel::create(
            [
                "user_id" => $user->id,
                "city_id" => $city            ]
        );

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
