{!! Form::open(['url'=>'/step1exe', 'method'=> 'post','autocomplete'=>'off', 'class'=>'form-control']) !!}
@csrf

{{Form::number('steviloTort', null, ['class' => 'number', 'id' => 'numberField'])}}
{{Form::submit('Confirm',['class'=>'btn btn-secondary'])}}
{!! Form::close() !!}
