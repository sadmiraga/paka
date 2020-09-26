@extends('layouts.app')

@section('content')


<p> Uredi preliv </p>

{!! Form::open(['url'=>'/urediSkupinoExe', 'method'=> 'post']) !!}

{!!Form::text('imeSkupine',$skupina->name,['class'=>'form-control','id'=>'adminPanelTextInput','required'=>'required'])!!}

{{ Form::hidden('skupinaID', $skupina->id) }}

{!!Form::number('cenaSkupine', $skupina->cena, ['class' => 'form-control', 'placeholder' => 'Vnesite ceno skupine v €'])!!}

{!! Form::submit('Shrani',['class'=>'btn btn-success']) !!}


{!! Form::close() !!}




@endsection
