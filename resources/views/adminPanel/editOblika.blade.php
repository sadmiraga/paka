@extends('layouts.app')

@section('content')


<p> Uredi obliko </p>

{!! Form::open(['url'=>'/urediOblikoExe', 'method'=> 'post']) !!}

{!!Form::text('imeOblike',$oblika->name,['class'=>'form-control','id'=>'adminPanelTextInput','required'=>'required'])!!}

{{ Form::hidden('oblikaID', $oblika->id) }}


{!! Form::submit('Shrani',['class'=>'btn btn-success']) !!}


{!! Form::close() !!}




@endsection
