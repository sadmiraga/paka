@extends('layouts.app')

@section('content')


<p> Uredi Okus </p>

{!! Form::open(['url'=>'/urediOkrasExe', 'method'=> 'post']) !!}

{!!Form::text('imeOkrasa',$okras->name,['class'=>'form-control','id'=>'adminPanelTextInput','required'=>'required'])!!}

{{ Form::hidden('okrasID', $okras->id) }}


{!! Form::submit('Shrani',['class'=>'btn btn-success']) !!}


{!! Form::close() !!}




@endsection
