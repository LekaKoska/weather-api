@php
    use App\Http\ForecastHelper;
    use Illuminate\Support\Facades\Session;
@endphp

@extends("layout")

@section("pageSection")

    <div class="container py-5">

        @if(Session::has("error"))
            <div class="alert alert-danger text-center">
                {{ Session::get("error") }}
            </div>
        @endif


        <div class="row g-4 justify-content-center">
            @foreach($cities as $city)
                @php
                    $icon = ForecastHelper::getIconByWeatherType($city->todayForecast->weather_type);
                    $isFavourite = in_array($city->id, $userFavourite);
                @endphp

                <div class="col-md-4 col-sm-6">
                    <div class="card shadow-sm border-0 h-100 text-center p-3 bg-light">

                        <div class="mb-3">
                            <i class="fa-solid {{ $icon }} fa-3x text-primary"></i>
                        </div>

                        <h4 class="fw-bold mb-3">{{ $city->name }}</h4>


                        <div class="d-flex justify-content-center gap-2">
                            @if($isFavourite)
                                <a href="{{ route('forecast.unfavourite', ['city' => $city->id]) }}"
                                   class="btn btn-outline-danger">
                                    <i class="fa-solid fa-heart"></i> Remove
                                </a>
                            @else
                                <a href="{{ route('forecast.favourite', ['city' => $city->id]) }}"
                                   class="btn btn-outline-warning">
                                    <i class="fa-regular fa-heart"></i> Favourite
                                </a>
                            @endif

                            <a href="{{ route('forecast.permalink', ['city' => $city->name]) }}"
                               class="btn btn-primary text-white">
                                <i class="fa-solid fa-circle-info"></i> Details
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
