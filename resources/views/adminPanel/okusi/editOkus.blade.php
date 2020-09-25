@extends('layouts.app')

@section('content')


<p> Uredi Okus </p>

{!! Form::open(['url'=>'/urediOkusExe', 'method'=> 'post']) !!}

{!!Form::text('imeOkusa',$okus->name,['class'=>'form-control','id'=>'adminPanelTextInput','required'=>'required'])!!}

{{ Form::hidden('okusID', $okus->id) }}


{!! Form::submit('Shrani',['class'=>'btn btn-success']) !!}


{!! Form::close() !!}




@endsection
