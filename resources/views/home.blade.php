@extends('layouts.orderLayout')
@section('content')

<div class="checkoutContainer">

    <button onclick="location.href='/home'"> admin panel </button>

{!! Form::open(['url'=>'/step2', 'method'=> 'post','autocomplete'=>'off']) !!}
@csrf

<div class="container">
    <div id="active" class="calm">
        1 Korak: Naročilo
    </div>

    <div class="calm">
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





    <div class="prvaLijeva">
        <label> 1. Število tort </label> <br>
        <input name="steviloTort" id="steviloTort" value="0" type="number">

        <br><br>

        <label> 2. Izbor torte </label> <br>
        <select class="form-control"  name="skupinaID" id="skupinaID">
            <option value="0" selected disabled> Izberite skupino </option>

            @foreach ( $skupinas ?? '' as $skupina)
                <option value="{{$skupina->id}}"> {{$skupina->name}} </option>
            @endforeach
        </select>

        <br><br>


        <label> 3.  Izbor oblike </label> <br>
        <select class="form-control" name="oblikaID" id="oblikaID" >
            <option value="0" selected disabled> Izberite obliko </option>
        </select> <br> <br>
    </div>



    <div class="prvaDesna">
        <label> 4.  Izbor okusa </label> <br>
        <select class="form-control" name="okusID" id="okusID"  >
            <option value="0" selected disabled> Izberite Okus </option>
        </select> <br>

        <label> 5. izbor preliva </label> <br>
        <select class="form-control" name="prelivID" id="prelivID"  >
            <option value="0" selected disabled> Izberite preliv </option>
            @foreach ($prelivi as $preliv)
                <option value="{{$preliv->id}}"> {{$preliv->name}} </option>
            @endforeach
        </select> <br> <br>

        <label> 6. Tortni dekor </label> <br>
        <select class="form-control" name="dekorID" id="dekorID"  >
            <option value="0" selected disabled> Izberite dekor </option>
            @foreach ($okraski as $orkas)
                <option value="{{$orkas->id}}"> {{$orkas->name}} </option>
            @endforeach
        </select> <br> <br>
    </div>

    <div id="submitDiv">

    <input type="submit" class="btn btn-warning" id="myb" value="Nadaljuj na naslednji korak">

    </div>



    {!! Form::close() !!}
</div>


<script type=text/javascript>

    //dynamic oblika field
    $('#skupinaID').change(function(){
    var skupinaID = $(this).val();
    if(skupinaID){
      $.ajax({
        type:"GET",
        url:"{{url('getOblikasList')}}?skupinaID="+skupinaID,
        success:function(res){
        if(res){
          $("#oblikaID").empty();
          $("#oblikaID").append('<option>Select</option>');
          $.each(res,function(key,value){
            $("#oblikaID").append('<option value="'+key+'">'+value+'</option>');
          });

        }else{
          $("#oblikaID").empty();
        }
        }
      });
    }else{
      $("#oblikaID").empty();

    }
    });

    //Dynamic OKUS field
    $('#skupinaID').on('change',function(){
  var skupinaID = $(this).val();
  if(skupinaID){
    $.ajax({
      type:"GET",
      url:"{{url('getOkusList')}}?skupinaID="+skupinaID,
      success:function(res){
      if(res){
        $("#okusID").empty();
        $.each(res,function(key,value){
          $("#okusID").append('<option value="'+key+'">'+value+'</option>');
        });

      }else{
        $("#okusID").empty();
      }
      }
    });
  }else{
    $("#okusID").empty();
  }
  });


  </script>



@endsection



