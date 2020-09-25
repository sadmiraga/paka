@extends('layouts.app')

@section('content')


<p> Dodaj Preliv </p>

{!! Form::open(['url'=>'/dodajPreliv', 'method'=> 'post']) !!}

{!!Form::text('imePreliva','',['class'=>'form-control','id'=>'adminPanelTextInput','placeholder'=>'Vpišite ime novega preliva','required'=>'required'])!!}




{!! Form::submit('Dodaj',['class'=>'btn btn-success']) !!}


{!! Form::close() !!}


<br><br><br>

<!-- All OBLIKE table -->
<table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">Ime preliva</th>
        <th scope="col">Datum Dodajanja</th>
        <th scope="col">#</th>
        <th scope="col">#</th>
      </tr>
    </thead>
    <tbody>

        @foreach($prelivi as $preliv)

      <tr>
        <td scope="row">{{$preliv->name}}</td>
        <td>{{$preliv->created_at}}</td>
        <td><button onclick="location.href='/urediPreliv/{{$preliv->id}}'" class="btn btn-warning">Uredi</button></td>
        <td><button onclick="location.href='/izbrisiPreliv/{{$preliv->id}}'" class="btn btn-danger">Izbriši</button></td>
      </tr>

      @endforeach

    </tbody>
  </table>




@endsection
