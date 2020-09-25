@extends('layouts.app')

@section('content')


<p> Dodaj Okras </p>

{!! Form::open(['url'=>'/dodajOkras', 'method'=> 'post']) !!}

{!!Form::text('imeOkrasa','',['class'=>'form-control','id'=>'adminPanelTextInput','placeholder'=>'Vpišite ime novega Okrasa','required'=>'required'])!!}

<br>
<label> Dimenzija </label>
{!!Form::text('dimenzija','',['class'=>'form-control','id'=>'adminPanelTextInput','placeholder'=>'Vpišite dimenzijo torte v CM ','required'=>'required'])!!}







{!! Form::submit('Dodaj',['class'=>'btn btn-success']) !!}


{!! Form::close() !!}


<br><br><br>

<!-- All OBLIKE table -->
<table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">Ime Okrasa</th>
        <th scope="col">Dimenzija</th>
        <th scope="col">Datum Dodajanja</th>
        <th scope="col">#</th>
        <th scope="col">#</th>
      </tr>
    </thead>
    <tbody>

        @foreach($okrasi as $okras)

      <tr>
        <td scope="row">{{$okras->name}}</td>
        <td>12cm</td>
        <td>{{$okras->created_at}}</td>
        <td><button onclick="location.href='/urediOkras/{{$okras->id}}'" class="btn btn-warning">Uredi</button></td>
        <td><button onclick="location.href='/izbrisiOkras/{{$okras->id}}'" class="btn btn-danger">Izbriši</button></td>
      </tr>

      @endforeach

    </tbody>
  </table>




@endsection
