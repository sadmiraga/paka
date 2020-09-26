@extends('layouts.app')

@section('content')


<p> Uredi Mozno stevilo kosov </p>

{!! Form::open(['url'=>'/urediSteviloKosov', 'method'=> 'post']) !!}

<label> Izberite skupino </label> <br>
<select class="form-control" name="skupinaID" id="skupinaID" >

    @foreach ($skupine as $skupina)

        @if($skupina->id == $part->skupinaID)
            <option selected value="{{$skupina->id}}"> {{$skupina->name}} </option>
        @else
            <option value="{{$skupina->id}}"> {{$skupina->name}} </option>
        @endif
    @endforeach
</select> <br> <br>

{!!Form::text('steviloKosov', $part->steviloKosov, ['class' => 'form-control','placeholder'=> 'vnesite mozno stevilo kosov za izbrano skupino'])!!}

{{ Form::hidden('partID', $part->id) }}

{!! Form::submit('Shrani',['class'=>'btn btn-success']) !!}


{!! Form::close() !!}




@endsection
