<!DOCTYPE html>
<!-- saved from url=(0052)https://getbootstrap.com/docs/4.0/examples/checkout/ -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="https://getbootstrap.com/docs/4.0/assets/img/favicons/favicon.ico">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- ajax -->
        <script src=//www.codermen.com/js/jquery.js></script>



        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <title>Paka</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/checkout/">

    <!-- Bootstrap core CSS -->
    <link href="./Checkout example for Bootstrap_files/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./Checkout example for Bootstrap_files/form-validation.css" rel="stylesheet">

    <style>




    .container{
        display:flex;
        width: 80%;
        margin-left: 10%;
        margin-right: 10%;
    }




    .bodyContainer{
        width: 80%;
        margin-left: 10%;
        margin-right: 10%;
        background-color: 	grey;
    }



    .danger{
        background-color: red;
        text-align: center;
        margin-left: 10%;
        margin-right: 10%;
        color:white;
    }

    #contactContainer{
        display:flex;
    }







    #steviloTort{
        height: 40px;
    }



    </style>
  </head>
  <body style="background-color:grey;" class="bg-light" data-gr-c-s-loaded="true">


    <div class="orderContent" >
        @yield('content')
    </div>

</body></html>
