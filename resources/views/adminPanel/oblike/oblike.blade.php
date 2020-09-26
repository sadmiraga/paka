@extends('layouts.app')

@section('content')


<p> Dodaj obliko </p>

{!! Form::open(['url'=>'/dodajObliko', 'method'=> 'post']) !!}

{!!Form::text('imeOblike','',['class'=>'form-control','id'=>'adminPanelTextInput','placeholder'=>'Vpišite ime nove oblike','required'=>'required'])!!}

{!!Form::number('cenaOblike', '', ['class' => 'form-control', 'placeholder' => 'Vnesite ceno oblike v €'])!!}

<label> Izberite skupino oblike </label> <br>
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
        <th scope="col">Ime Oblike</th>
        <th scope="col">Ime Skupina kateri pripada</th>
        <th scope="col">cena oblike</th>
        <th scope="col">Datum Dodajanja</th>
        <th scope="col">#</th>
        <th scope="col">#</th>
      </tr>
    </thead>
    <tbody>

        @foreach($oblike as $oblika)

      <tr>
        <td scope="row">{{$oblika->name}}</td>

        <!-- get group name with ID -->
        <td>
            @foreach ($skupine as $skupina)
                @if($skupina->id == $oblika->skupinaID)
                    {{$skupina->name}}
                @endif
            @endforeach
        </td>

        <td scope="row">{{$oblika->cena}}€</td>

        <td>{{$oblika->created_at}}</td>
        <td><button onclick="location.href='/urediObliko/{{$oblika->id}}'" class="btn btn-warning">Uredi</button></td>
        <td><button onclick="location.href='/izbrisiObliko/{{$oblika->id}}'" class="btn btn-danger">Izbriši</button></td>
      </tr>

      @endforeach

    </tbody>
  </table>




@endsection
