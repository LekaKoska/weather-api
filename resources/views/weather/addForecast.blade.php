@php use App\Models\CitiesModel;use App\Models\ForecastModel; @endphp
    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
</head>
<body>
<form action="{{route("forecast.add")}}" method="POST">
    {{csrf_field()}}
    <select name="cityName">
        @foreach(CitiesModel::all() as $cityName)
            <option value="{{$cityName->id}}">{{$cityName->name}}</option>
        @endforeach
    </select>
    <input type="number" name="temperature" placeholder="Unesite temperaturu">
    <select name="weatherType">
       @foreach(ForecastModel::WEATHER as $weather)
            <option>{{$weather}}</option>
       @endforeach
    </select>
    <input type="text" name="chance" placeholder="Sanse za padavinu">
    <input type="date" name="forecastDate">
    <button>Dodaj</button>
</form>
        @foreach(CitiesModel::all() as $city)
            <h4>{{$city->name}}</h4>
                <ul>
                        @foreach($city->forecast as $forecast)
                           <li>{{$forecast->forecast_date}} - {{$forecast->temperature}} </li>
                        @endforeach
                </ul>
        @endforeach




</body>
</html>
