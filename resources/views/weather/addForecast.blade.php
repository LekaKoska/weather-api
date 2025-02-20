@extends("admin.layoutAdmin")
@php use App\Http\ForecastHelper;use App\Models\CitiesModel;use App\Models\ForecastModel; @endphp

    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Document</title>
</head>
<body>
@section("content")
    <form action="{{route("forecast.add")}}" method="POST">
        {{csrf_field()}}
        @if($errors->any())
            {{dd($errors->all())}}
        @endif
        <div class="mb-3 col-2">
            <select name="cityName" class="form-select">
                @foreach(CitiesModel::all() as $cityName)
                    <option value="{{$cityName->id}}">{{$cityName->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3 col-2">
            <input type="number" name="temperature" placeholder="Unesite temperaturu" class="form-control">
        </div>

        <div class="mb-3 col-2">
            <select name="weatherType" class="form-select">
                @foreach(ForecastModel::WEATHER as $weather)
                    <option>{{$weather}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3 col-2">
            <input type="text" name="chance" placeholder="Sanse za padavinu" class="form-control">
        </div>
        <div class="mb-3 col-2">
            <input type="date" name="forecastDate" class="form-control">
        </div>

        <button class="btn btn-outline-primary col-2 ">Dodaj</button>
    </form>
    <div class="d-flex flex-wrap" style="gap: 10px">

        @foreach(CitiesModel::all() as $city)
            <div>
                <h4 class="mb-1">{{$city->name}}</h4>

                <ul class="list-group mb-4">
                    @foreach($city->forecast as $forecast)
                        @php
                            $boja = ForecastHelper::getColorByTemperature($forecast->temperature);
                            $ikonica = ForecastHelper::getIconByWeatherType($forecast->weather_type);

                        @endphp

                        <li class="list-group-item">{{$forecast->forecast_date}} -
                            <i class="fa-solid {{$ikonica}}"></i>
                            <span style="color: {{$boja}};">{{$forecast->temperature}}   </span></li>
                </ul>
                @endforeach
            </div>
        @endforeach
    </div>

@endsection
</body>
</html>
