@extends('layouts.app')

@section('content')

<!-- add group -->
{!! Form::open(['url'=>'/dodajSkupino', 'method'=> 'post']) !!}

{!!Form::text('imeSkupine','',['class'=>'form-control','id'=>'adminPanelTextInput','placeholder'=>'Vpišite ime nove skupine','required'=>'required'])!!}

{!! Form::submit('Dodaj',['class'=>'btn btn-success']) !!}


{!! Form::close() !!}


<!-- All groups table -->
<table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">Ime Skupine</th>
        <th scope="col">Datum Dodajanja</th>
        <th scope="col">#</th>
        <th scope="col">#</th>
      </tr>
    </thead>
    <tbody>

        @foreach($skupine as $skupina)

      <tr>
        <td scope="row">{{$skupina->name}}</td>
        <td>{{$skupina->created_at}}</td>
        <td><button onclick="location.href='/urediSkupino/{{$skupina->id}}'" class="btn btn-warning">Uredi</button></td>
        <td><button onclick="location.href='/izbrisiSkupino/{{$skupina->id}}'" class="btn btn-danger">Izbriši</button></td>
      </tr>

      @endforeach

    </tbody>
  </table>
@endsection
