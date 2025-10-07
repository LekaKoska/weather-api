@extends("layout")

@section("pageHeader")
    About
@endsection

@section("pageSection")
    <div class="container py-5">
        <h2 class="mb-4 text-primary">About This Project</h2>

        <p>
            This project is a modern weather application that provides accurate <strong>daily weather forecasts</strong>
            for cities around the world. Users can simply enter any city name and instantly get the forecast for
            the current day, including temperature, sunrise and sunset times, chance of precipitation, and more.
        </p>

        <p>
            One of the key features of the application is the ability for registered users to add cities to their
            <strong>Favourites</strong>. This allows users to quickly access the weather information for the cities
            they care about most, without having to search for them every time.
        </p>

        <p>
            The app is designed to be user-friendly, responsive, and visually intuitive, with icons representing
            the current weather conditions. Whether it's sunny, rainy, cloudy, or snowy, the weather icon will
            help users understand the forecast at a glance.
        </p>

        <p>
            Feel free to explore any city in the world and add it to your favourites to stay up-to-date with
            the latest weather conditions.
        </p>
    </div>
@endsection
