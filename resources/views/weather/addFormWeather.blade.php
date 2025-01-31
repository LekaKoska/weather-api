@php use App\Models\CitiesModel;use App\Models\WeatherModel; @endphp
    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
</head>
<body>
<form action="{{route("weather.update")}}" method="POST">
    {{csrf_field()}}
    <input type="number" required placeholder="Unesite temperaturu" name="temperature">
    <select name="cityId">
        @foreach(CitiesModel::all() as $city)
            <option value="{{$city->id}}">{{$city->name}}</option>
        @endforeach

    </select>
    <button>Snimi</button>
</form>
<div>
    @foreach(WeatherModel::all() as $weather)
        <p>{{$weather->city->name}} - {{$weather->temperature}} </p>
    @endforeach
</div>
</body>
</html>
