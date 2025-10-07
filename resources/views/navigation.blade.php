<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="/">WeatherApp</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navMenu">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a href="/" class="nav-link">Home</a>
                </li>

                @auth
                    <li class="nav-item">
                        <a href="{{ route('forecast.favourites') }}" class="nav-link">Favourites</a>
                    </li>
                @endauth

                @guest
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="nav-link">Login</a>
                    </li>
                @endguest

                <li class="nav-item">
                    <a href="/about" class="nav-link">About</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
