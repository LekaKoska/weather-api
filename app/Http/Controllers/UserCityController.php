<?php

namespace App\Http\Controllers;

use App\Models\UserCityModel;
use Illuminate\Http\RedirectResponse;
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

    public function favourite($city): RedirectResponse
    {

        $user = Auth::user();

        if($user === null)
        {
            return redirect()->back()->with("error", "You must be logged to favourite city");
        }

        $this->userCityRepo->addToFavourite($city, $user);

            return redirect()->back();
    }

    public function unfavourite($city): RedirectResponse
    {
        $user = Auth::user();

        if($user === null)
        {
            return redirect()->back()->with("error", "You must be logged to favourite city");
        }

        $this->userCityRepo->unfavourite($city, $user);

        return redirect()->back();
    }
}
