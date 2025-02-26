@foreach($cities as $city)
    <p>Temperatura za {{$city->forecast_date}} je: {{$city->temperature}} stepena</p>
    <p>Sunce izlazi u: {{$sunrise}} a zalazi u: {{$sunset}}</p>

@endforeach
