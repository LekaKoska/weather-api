@foreach($weather as $prognoza)
   <p> Trenutno ima {{$prognoza->temperature}} stepena u {{$prognoza->city->name}} </p>
@endforeach
