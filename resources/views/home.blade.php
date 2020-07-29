{!! Form::open(['url'=>'/newCampaignExe', 'method'=> 'post','autocomplete'=>'off', 'class'=>'form-control']) !!}
@csrf


<label> Izbor torte </label> <br>


<select onchange="oblikaBasedOnSkupina()" name="skupinaID" id="skupinaID">
    <option value="" selected disabled> Izberite skupino </option>

    @foreach ($skupinas as $skupina)
        <option value="{{$skupina->id}}"> {{$skupina->name}} </option>
    @endforeach
</select>

<br><br>


<label> Izbor oblike </label> <br>
<select name="oblikaID" id="oblikaID">
    <option value="" selected disabled> Izberite obliko </option>

    @foreach ($oblikas as $oblika)
        <option value="{{$oblika->id}}"> {{$oblika->name}} </option>
    @endforeach

</select>

{!! Form::close() !!}


<script>


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
