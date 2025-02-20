<?php

namespace App\Http\Controllers;

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


    }
}
