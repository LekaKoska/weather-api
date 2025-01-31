@foreach($cities as $city)
    <p>Temperatura za {{$city->forecast_date}} je: {{$city->temperature}} stepena</p>

@endforeach
