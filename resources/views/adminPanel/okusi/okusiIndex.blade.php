@extends('layouts.app')

@section('content')


<p> Dodaj Okus </p>

{!! Form::open(['url'=>'/dodajOkus', 'method'=> 'post']) !!}

{!!Form::text('imeOkusa','',['class'=>'form-control','id'=>'adminPanelTextInput','placeholder'=>'Vpišite ime novega okusa','required'=>'required'])!!}


<label> Izberite skupino Okusa </label> <br>
<select class="form-control" name="skupinaID" id="skupinaID" >
    <option value="0" selected disabled> Izberite skupino </option>
    @foreach ($skupine as $skupina)
        <option value="{{$skupina->id}}"> {{$skupina->name}} </option>
    @endforeach
</select> <br> <br>


{!! Form::submit('Dodaj',['class'=>'btn btn-success']) !!}


{!! Form::close() !!}


<br><br><br>

<!-- All OBLIKE table -->
<table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">Ime Okusa</th>
        <th scope="col">Ime Skupina kateri pripada</th>
        <th scope="col">Datum Dodajanja</th>
        <th scope="col">#</th>
        <th scope="col">#</th>
      </tr>
    </thead>
    <tbody>

        @foreach($okusi as $okus)

      <tr>
        <td scope="row">{{$okus->name}}</td>

        <!-- get group name with ID -->
        <td>
            @foreach ($skupine as $skupina)
                @if($skupina->id == $okus->skupinaID)
                    {{$skupina->name}}
                @endif
            @endforeach
        </td>

        <td>{{$okus->created_at}}</td>
        <td><button onclick="location.href='/urediOkus/{{$okus->id}}'" class="btn btn-warning">Uredi</button></td>
        <td><button onclick="location.href='/izbrisiOkus/{{$okus->id}}'" class="btn btn-danger">Izbriši</button></td>
      </tr>

      @endforeach

    </tbody>
  </table>




@endsection
