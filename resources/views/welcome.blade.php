@php use Illuminate\Support\Facades\Session; @endphp
@extends("layout")

@section("pageHeader")
    Main Page
@endsection

@section("pageSection")
    <section class="d-flex justify-content-center align-items-center vh-100 bg-light">
        <div class="container text-center bg-white shadow-lg p-5 rounded-4" style="max-width: 500px;">
            <h1 class="mb-4 text-primary">
                <i class="fa-solid fa-city me-2"></i>Search City
            </h1>

            @if(Session::has("error"))
                <div class="alert alert-danger">
                    {{ Session::get("error") }}
                </div>
            @endif

            <form action="{{ route('forecast.search') }}" method="GET">
                <div class="mb-3">
                    <input
                        type="text"
                        name="city"
                        class="form-control form-control-lg text-center"
                        placeholder="Enter city name..."
                        required
                    >
                </div>
                <button type="submit" class="btn btn-primary btn-lg w-100">
                    <i class="fa-brands fa-searchengin me-2"></i>Find Forecast
                </button>
            </form>

            <p class="text-muted mt-4 mb-0">
                Type the city name and get the latest weather forecast instantly.
            </p>
        </div>
    </section>
@endsection
