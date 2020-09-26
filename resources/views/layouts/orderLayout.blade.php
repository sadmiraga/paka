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

    <title>Checkout example for Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/checkout/">

    <!-- Bootstrap core CSS -->
    <link href="./Checkout example for Bootstrap_files/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./Checkout example for Bootstrap_files/form-validation.css" rel="stylesheet">

    <style>

    .calm{
        background-color: grey;
        padding:10px;
        width: 30%;
        font-size: 20px;
        font-weight: 500;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        text-align: center;
        margin: 1%;
    }

    .container{
        display:flex;
        width: 80%;
        margin-left: 10%;
        margin-right: 10%;
    }

    #active{
        background-color:orange;
    }

    .checkoutContainer{
        width: 80%;
        margin-right: 10%;
        margin-left: 10%;
        padding: 25px;

        margin-top:3%;

    }

    .bodyContainer{

        width: 80%;
        margin-left: 10%;
        margin-right: 10%;
        background-color: 	#D3D3D3;
    }

    #myb{
        border-radius: 50px;
        outline: none;
        width: 300px;
        background-color:orange;


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

    #right{
        margin-left: 10%;
        float: right;
    }

    #left{
        float:left;
        margin-right: 10%;
    }

    .prvaLijeva{
        width:40%;
        float: left;
        text-align: left;
        margin-top: 4%;
    }

    .prvaDesna{
        width:40%;
        float: right;
        text-align: left;
        margin-top: 4%;
    }

    #submitDiv{
        float:right;
        margin-top: 2%;
    }

    #steviloTort{
        height: 40px;
    }



    </style>
  </head>
  <body class="bg-light" data-gr-c-s-loaded="true">


    @yield('content')


</body></html>
