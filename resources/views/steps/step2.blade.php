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

    <div id="contactContainer">
        <div class="prvaLijeva">
            <label> 1 kupec </label><br>
            <!-- FIRST NAME -->
            {{ Form::text('firstName', '', ['class' => 'form-control','placeholder'=> 'ime'  ])}}
            <br> <br>

            <!-- LAST NAME -->
            {{ Form::text('lastName', '', ['class' => 'form-control','placeholder'=> 'priimek'  ])}}
            <br> <br>
        </div>

        <div  class="prvaDesna">
            <label> 2 Kontakt </label><br>
            <!-- PHONE -->
            {{ Form::text('phoneNumber', '', ['class' => 'form-control','placeholder'=> 'tel. stevilka'  ])}}
            <br> <br>

            <!-- EMAIL -->
            {{ Form::text('email', '', ['class' => 'form-control','placeholder'=> 'elektronski naslov'  ])}}
            <br> <br>
        </div>
    </div>



    <input type="submit" id="myb" value="Nadaljuj na naslednji korak">




    {!! Form::close() !!}
</div>
</div>


