@extends("layout")
@section("naslovStranice")
    Glavna strana
@endsection



@section("sadrzajStranice")
    <form action="{{route("forecast.search")}}" method="GET" style="height: 70vh;" class="text-white text-left d-flex flex-wrap flex-column container justify-content-center align-items-center ">
        <h1 class="col-md-4 col-12 text-dark"><i class="fa-solid fa-house"></i>Pronadjite svoj grad</h1>
        @if(\Illuminate\Support\Facades\Session::has("error"))
            <p class="text-danger">{{\Illuminate\Support\Facades\Session::get("error")}}</p>
        @endif
        <div class="mb-3 col-md-4 col-12">
            <input type="text" placeholder="Unesite ime grada" name="city" class="form-control col-12">
            <button type="submit" class="btn btn-primary col-12 mt-3"><i class="fa-brands fa-searchengin"></i> Pronadji</button>
        </div>
    </form>
@endsection
