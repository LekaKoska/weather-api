@extends("layout")

@section("naslovStranice")
    Glavna strana
@endsection

@section("sadrzajStranice")
    <p>Trenutno vreme je : {{ date("h:i:s") }} </p>
@endsection
