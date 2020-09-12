@extends('layouts.orderLayout')

<div class="checkoutContainer">



{!! Form::open(['url'=>'/finish', 'method'=> 'post','autocomplete'=>'off']) !!}
@csrf


<input type="hidden" name="orderID" value="{{$orderID}}">

<div class="container">
    <div  class="calm">
        1 Korak: Naročilo
    </div>

    <div class="calm">
        2 Korak: Podatki o kupcu
    </div>

    <div id="active" class="calm">
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

    <label> Izberi način plačila </label> <br>

    <input  type="radio" id="male" name="payment" value="poPrevzemu">
    <label for="male">Placilo ob prevzemu</label><br>

    <input type="radio" id="female" name="payment" value="prekoSpleta">
    <label for="female">Visa/MasterCad placilo preko spleta</label><br>

    <input type="radio" id="other" name="payment" value="trr">
    <label for="other">Predracun TRR</label>

<br> <br> <br>


    <input type="submit" id="myb" value="Oddaj naročilo">




    {!! Form::close() !!}
</div>
</div>


