@extends("layout")

@section("pageHeader")
    Favourites
@endsection

@section("pageSection")
    <div class="container mt-4">
        <h2 class="mb-4 text-center text-primary">Your Favourite Cities</h2>

        @if($userFavourites->isEmpty())
            <div class="alert alert-info text-center">
                You don't have any favourite cities yet.
            </div>
        @else
            <div class="row">
                @foreach($userFavourites as $favourite)
                    @if($favourite->city && $favourite->city->todayForecast)
                        <div class="col-md-4 mb-4">
                            <div class="card shadow-sm border-0 rounded-3">
                                <div class="card-body text-center">
                                    <h5 class="card-title text-dark mb-2">
                                        {{ $favourite->city->name }}
                                    </h5>
                                    <p class="card-text text-muted mb-2">
                                        Temperature:
                                        <strong>{{ $favourite->city->todayForecast->temperature }}°C</strong>
                                    </p>
                                    <a href="{{ route('forecast.unfavourite', ['city' => $favourite->city]) }}"
                                       class="btn btn-outline-danger btn-sm">
                                        <i class="fa-solid fa-heart-broken me-1"></i> Unfavourite
                                    </a>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="col-12">
                            <div class="alert alert-warning text-center">
                                Data for this city is not available at the moment.
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        @endif
    </div>
@endsection
