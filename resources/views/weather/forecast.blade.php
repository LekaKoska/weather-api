@extends('layout')
<div class="container my-4">
    <h2 class="text-center mb-4">Weather Forecast</h2>

    <div class="row justify-content-center">
        @foreach($cities as $city)
            <div class="col-md-5 col-lg-4 m-3">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <h5 class="card-title text-primary fw-bold">
                            {{$location}}
                        </h5>

                        <p class="card-text mb-2">
                            <i class="fa-solid fa-temperature-half text-danger me-2"></i>
                            Temperature: <strong>{{$city->temperature}}°C</strong>
                        </p>

                        <p class="card-text mb-2">
                            <i class="fa-solid fa-calendar-day text-secondary me-2"></i>
                            Date: <strong>{{$city->forecast_date}}</strong>
                        </p>

                        <p class="card-text mb-2">
                            <i class="fa-solid fa-sun text-warning me-2"></i>
                            Sunrise: <strong>{{$sunrise}}</strong>
                        </p>

                        <p class="card-text mb-2">
                            <i class="fa-solid fa-moon text-primary me-2"></i>
                            Sunset: <strong>{{$sunset}}</strong>
                        </p>

                        <p class="card-text mb-2">
                            <i class="fa-solid fa-location-dot text-success me-2"></i>
                            Region: <strong>{{$region}}</strong>
                        </p>

                        <p class="card-text mb-3">
                            <i class="fa-solid fa-droplet text-info me-2"></i>
                            Chance of precipitation: <strong>{{$city->probability}}%</strong>
                        </p>

                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

