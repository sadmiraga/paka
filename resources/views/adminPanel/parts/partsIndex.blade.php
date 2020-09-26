@extends('layouts.app')

@section('content')


<p> Dodaj mozno stevilo kosov za posamezno Skupino </p>

{!! Form::open(['url'=>'/dodajSteviloKosov', 'method'=> 'post']) !!}

<label> Izberite skupino </label> <br>
<select class="form-control" name="skupinaID" id="skupinaID" >
    <option value="0" selected disabled> Izberite skupino </option>
    @foreach ($skupine as $skupina)
        <option value="{{$skupina->id}}"> {{$skupina->name}} </option>
    @endforeach
</select> <br> <br>

{!!Form::text('steviloKosov', '', ['class' => 'form-control','placeholder'=> 'vnesite mozno stevilo kosov za izbrano skupino'])!!}


{!! Form::submit('Dodaj',['class'=>'btn btn-success']) !!}


{!! Form::close() !!}


<br><br><br>

<!-- All OBLIKE table -->
<table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">Stevilo kosov</th>
        <th scope="col">Ime skupine</th>
        <th scope="col">Datum dodajanja</th>
        <th scope="col">#</th>
        <th scope="col">#</th>
      </tr>
    </thead>
    <tbody>

        @foreach($parts as $part)

      <tr>
        <td scope="row">{{$part->steviloKosov}}</td>
        <td>
            @foreach ($skupine as $skupina)
                @if($skupina->id == $part->skupinaID)
                    {{$skupina->name}}
                @endif
            @endforeach
        </td>
        <td>{{$part->created_at}}</td>
        <td><button onclick="location.href='/urediKos/{{$part->id}}'" class="btn btn-warning">Uredi</button></td>
        <td><button onclick="location.href='/IzbrisiKos/{{$part->id}}'" class="btn btn-danger">Izbriši</button></td>
      </tr>

      @endforeach

    </tbody>
  </table>




@endsection
