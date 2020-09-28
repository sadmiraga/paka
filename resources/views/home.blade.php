@extends('layouts.orderLayout')
@section('content')

<div class="checkoutContainer">

    <button onclick="location.href='/home'"> admin panel </button>

{!! Form::open(['url'=>'/step2', 'method'=> 'post','autocomplete'=>'off', 'id'=>'firstStepForm']) !!}
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






        <div class="entireRow">
            <div class="formElement">
                <label class="formElementName">  1.  Število tort </label> <br>
                <input name="steviloTort" id="steviloTort" value="0" type="number">
            </div>
        </div>


        <div class="entireRow">

            <div class="formElement">
                <label class="formElementName">  2. Izbor torte </label> <br>
                <select class="form-control"  name="skupinaID" id="skupinaID">
                    <option value="0" selected disabled> Izberite skupino </option>
                    @foreach ( $skupinas ?? '' as $skupina)
                        <option value="{{$skupina->id}}"> {{$skupina->name}} </option>
                    @endforeach
                </select>
            </div>

            <div class="formElement">
                <label class="formElementName">  3.  Izbor oblike </label> <br>
                <select class="form-control" name="oblikaID" id="oblikaID" >
                    <option value="0" selected disabled> Izberite obliko </option>
                </select>
            </div>

            <div class="formElement">
                <label class="formElementName">  4. Izbor velikosti </label>
                <select aria-placeholder="Izberite stevilo kosov" class="form-control" name="steviloKosovID" id="steviloKosovID" >
                    <option value="0" selected disabled> Izberite stevilo kosov </option>
                </select>
            </div>

        </div>

        <div class="entireRow">

            <div class="formElement">
                <label class="formElementName">  5.  Izbor okusa </label> <br>
                <select class="form-control" name="okusID" id="okusID"  >
                    <option value="0" selected disabled> Izberite Okus </option>
                </select>
            </div>


            <div class="formElement">
                <label class="formElementName">  6. izbor preliva </label> <br>
                <select class="form-control" name="prelivID" id="prelivID"  >
                    <option value="0" selected disabled> Izberite preliv </option>
                    @foreach ($prelivi as $preliv)
                        <option value="{{$preliv->id}}"> {{$preliv->name}} </option>
                    @endforeach
                </select>
            </div>

            <div class="formElement">
                <label class="formElementName">  7. Tortni dekor </label> <br>
                <select class="form-control" name="dekorID" id="dekorID"  >
                    <option value="0" selected disabled> Izberite dekor </option>
                    @foreach ($okraski as $orkas)
                        <option value="{{$orkas->id}}"> {{$orkas->name}} </option>
                    @endforeach
                </select>
            </div>

        </div>

        <div class="entireRow">

            <div class="formElement">
                <label class="formElementName">  8. Napis na torti </label> <br>
                <textarea name="tortniNapis" form="firstStepForm" rows="2" cols="50" placeholder="Vpišite napis na torti"></textarea> <br>
            </div>

            <div class="formElement">
                <label class="formElementName">  9. Komentar </label> <br>
                <textarea name="komentar" form="firstStepForm" rows="2" cols="50" placeholder="Vpišite komentar"></textarea>
            </div>

        </div>




    <div id="submitDiv">
        <input type="submit" class="btn btn-warning"  value="Nadaljuj na naslednji korak">
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

    //Dynamic stevilo kosov field
    $('#skupinaID').on('change',function(){
  var skupinaID = $(this).val();
  if(skupinaID){
    $.ajax({
      type:"GET",
      url:"{{url('getSteviloKosovList')}}?skupinaID="+skupinaID,
      success:function(res){
      if(res){
        $("#steviloKosovID").empty();
        $.each(res,function(key,value){
          $("#steviloKosovID").append('<option value="'+key+'">'+value+'</option>');
        });

      }else{
        $("#steviloKosovID").empty();
      }
      }
    });
  }else{
    $("#steviloKosovID").empty();
  }
  });


  </script>



@endsection



