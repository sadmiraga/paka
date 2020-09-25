@extends('layouts.app')

@section('content')


<p> Uredi preliv </p>

{!! Form::open(['url'=>'/urediPrelivExe', 'method'=> 'post']) !!}

{!!Form::text('imePreliva',$preliv->name,['class'=>'form-control','id'=>'adminPanelTextInput','required'=>'required'])!!}

{{ Form::hidden('prelivID', $preliv->id) }}


{!! Form::submit('Shrani',['class'=>'btn btn-success']) !!}


{!! Form::close() !!}




@endsection
