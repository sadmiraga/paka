@extends('layouts.orderLayout')
@section('content')

<div class="checkoutContainer">

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
        <select class="form-control" onchange="oblikaBasedOnSkupina();  okusiFunction(); sizeFunction(); " name="skupinaID" id="skupinaID">
            <option value="0" selected disabled> Izberite skupino </option>

            @foreach ( $skupinas ?? '' as $skupina)
                <option value="{{$skupina->id}}"> {{$skupina->name}} </option>
            @endforeach
        </select>

        <br><br>


        <label> 3.  Izbor oblike </label> <br>
        <select class="form-control" name="oblikaID" id="oblikaID" >
            <option value="0" selected disabled> Izberite obliko </option>
            @foreach ($oblikas as $oblika)
                <option value="{{$oblika->id}}"> {{$oblika->name}} </option>
            @endforeach
        </select> <br> <br>
    </div>



    <div class="prvaDesna">
        <label> 4.  Izbor okusa </label> <br>
        <select class="form-control" name="okusID" id="okusID"  >
            <option value="0" selected disabled> Izberite Okus </option>
            @foreach ($vsePriloznostiTaste as $okus)
                <option value="{{$okus->id}}"> {{$okus->name}} </option>
            @endforeach
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


@endsection
<script>


        function okusiFunction(){
            var selectedSkupina =  document.getElementById('skupinaID').value;
            var i;

            //get the right data to fill dropdown
            var tasteData;
            if(selectedSkupina == 1){
                tasteData = <?php echo json_encode($vsePriloznostiTaste); ?>
            } else if(selectedSkupina == 2){
                tasteData = <?php echo json_encode($torteZaOtrokeTaste); ?>
            } else if(selectedSkupina == 3){
                tasteData = <?php echo json_encode($torteIzPonudbeTaste); ?>
            } else {
                tasteData = <?php echo json_encode($porocneTorteTaste); ?>
            }

            //delete dropdown options
            var dropDownMeni = document.getElementById("okusID");
            var dolzina = dropDownMeni.length -1;

            do{
                dropDownMeni.remove(dolzina);
                dolzina-=1;
            } while (dolzina!=0);


            //add elements from the right group
            for(i=0;i<=tasteData.length-1;i++){

            var option = document.createElement("option");
            option.text= tasteData[i].name;
            option.value = tasteData[i].id;
            dropDownMeni.add(option);
            }



        }


        function oblikaBasedOnSkupina(){

            //get id from selected value
            var selectedSkupina =  document.getElementById('skupinaID').value;
            var i;
            var allShapes;

            //get the right data to fill dropdown
            var shapeData;
            if(selectedSkupina == 1){
                shapeData = <?php echo json_encode($vsePriloznostiOblike); ?>
            } else if(selectedSkupina == 2){
                shapeData = <?php echo json_encode($torteZaOtroke); ?>
            } else if(selectedSkupina == 3){
                shapeData = <?php echo json_encode($torteIzPonudbe); ?>
            } else if(selectedSkupina == 4){
                shapeData = <?php echo json_encode($porocneTorte); ?>
            }

            //delete dropdown options
            var dropDownMeni = document.getElementById("oblikaID");
            var dolzina = dropDownMeni.length -1;

            do{
                dropDownMeni.remove(dolzina);
                dolzina-=1;
            } while (dolzina!=0);

            //add elements from the right group
            for(i=0;i<=shapeData.length-1;i++){

                var option = document.createElement("option");
                option.text= shapeData[i].name;
                option.value = shapeData[i].id;
                dropDownMeni.add(option);
            }

        }
    </script>


