@php use App\Http\ForecastHelper;use Illuminate\Support\Facades\Session; @endphp
@extends("layout")

@section("sadrzajStranice")
    @if(Session::has("error"))
        <p class="text-danger">{{Session::get("error")}}</p>
        <a class="btn btn-primary" href="/login">Login</a>
    @endif
    <div class="d-flex flex-wrap container">

        @foreach($cities as $city)

            @php
                $icon = "fa-sun";
                //$icon = ForecastHelper::getIconByWeatherType($city->todayForecast->weather_type); // Uzmi ikonicu od danasnje temperature
            @endphp

            <p>
                @if(in_array($city->id, $userFavourite))
                <a class="btn btn-success" href="{{route("forecast.unfavourite", ["city" => $city->id ])}}"><i
                        class="fa-solid fa-heart"></i></a>
                @else
                    <a class="btn btn-warning" href="{{route("forecast.favourite", ["city" => $city->id ])}}"><i
                            class="fa-regular fa-heart"></i></a>
                @endif
                <a class=" btn btn-primary text-white m-2"
                   href="{{route("forecast.permalink", ["city" => $city->name])}}"><i
                        class="fa-solid {{$icon}}"></i>{{$city->name}}</a>
            </p>

        @endforeach
    </div>
@endsection
