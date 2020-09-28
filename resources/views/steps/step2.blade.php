@extends('layouts.orderLayout')


<div class="checkoutContainer">


{!! Form::open(['url'=>'/step3', 'method'=> 'post','autocomplete'=>'off']) !!}
@csrf


<input type="hidden" name="orderID" value="{{$orderID}}">

<div class="container">
    <div  class="calm">
        1 Korak: Naročilo
    </div>

    <div id="active" class="calm">
        2 Korak: Podatki o kupcu
    </div>

    <div class="calm">
        3 Korak: Plačilo
    </div>
</div>



    <!-- errror messages -->
    @if ($errors->any())
        <div class="danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

<div class="checkoutContainer">


        <div class="entireRow">
            <label> 1 kupec </label><br>

            <div class="formElement">
                {{ Form::text('firstName', '', ['class' => 'form-control','placeholder'=> 'ime'  ])}}
            </div>


            <div class="formElement">
                {{ Form::text('lastName', '', ['class' => 'form-control','placeholder'=> 'priimek'  ])}}
            </div>

        </div>


        <div class="entireRow">
            <label> 2 Kontakt </label><br>

            <div class="formElement">
                {{ Form::text('phoneNumber', '', ['class' => 'form-control','placeholder'=> 'tel. stevilka'  ])}}
            </div>

            <div class="formElement">
            {{ Form::text('email', '', ['class' => 'form-control','placeholder'=> 'elektronski naslov'  ])}}
            </div>

        </div>





    <input type="submit" id="myb" value="Nadaljuj na naslednji korak">




    {!! Form::close() !!}
</div>
</div>


