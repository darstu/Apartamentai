<!DOCTYPE html>
<html>
<head>
    <title>apartamentunuoma.lt</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>
<body>

<script>

    $(function(){
        var url = window.location.href;
        $("#sidebar a").each(function(){
            if(url== (this.href)) {
                $(this).closest("a").addClass("active");
                $("#products").addClass("activeMenu");
            }
        });
        $("#navbarSide a").each(function(){
            if(url== (this.href)) {
                $(this).closest("a").addClass("active");
            }
        });
        $("#myNavbar a").each(function(){
            if(url== (this.href)) {
                $(this).closest("a").addClass("activeMenu");
            }
        });
    });
</script>


<div class="galva row" style="border-bottom-color: #6C6F6F; background-color: #FCBCAC; text-align: left">
    <div style="width: 800px"><div class="col-md-2" style="padding-right: 0px; text-align: right">Sistemos kalba</div><div class="dropdown col-md-2" style="padding-left: 20px"><button style="background-color: #FCBCAC; border-bottom: 1px solid black; color: black;" type="button" data-toggle="dropdown">Lietuvių
                <span class="caret"></span></button>
            <ul class="dropdown-menu">
                <li><a href="#">Lietuvių</a></li>
                <li><a href="#">Anglų</a></li>
            </ul></div></div>
    @if (\Session::has('success'))
        <div class="alert alert-success">
            <p>{!! \Session::get('success') !!}</p>

        </div>
    @endif
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <p>Netinkamai įvesta informacija:</p>
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif
</div>
<nav class="navbar navbar-inverse" style="background-color: #C8E7B5; border: 0px">
    <div class="container-fluid" >
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
                @if (Auth::guest())
                    <li><a href="{{asset('login')}}"><span class="glyphicon glyphicon-user"></span>&nbspPrisijungti</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-foggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="glyphicon glyphicon-user"></span> &nbsp{{ Auth::user()->name }} <span class="caret"></span> </a>
                        <div class="dropdown-menu" >
                            <a class="dropdown-item" href="{{ action('AccController@signout')}}">Atsijungti</a>
                        </div>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
<div class="jumbotron " style="background-color: #C8E7B5">
    <div class="container-fluid">
        <div class="row vertical-align" >
            {{--class=" col-sm-2 img-col"--}}
            <div>
                <img class="log" style="width: 500px; height:200px " src="{{asset('images/logotip.png')}}" />
            </div></div>
    </div>
</div>
</div>
{{--   /*kai sumazini atsidengia kitoje vietoje side bar*/--}}
<div class="wrapper">
    <nav id="sidebaradmin">
        <div class="log-card" style="width: 150px; background-color: #FFCD96; padding-top: 10px;">

            <ul class="list-unstyled components">
                <a href="{{ action('AdminController@index')}}"><div style="text-align: center;"><span class="glyphicon glyphicon-indent-left"></span><h5>Baldai</h5></div></a>
                <a href="{{ action('AdminController@users')}}"><div style="text-align: center;"><span class="glyphicon glyphicon-user"></span><h5>Naudotojai</h5></div></a>
                <a href="{{ action('AdminController@product')}}"><div style="text-align: center;"><span class="glyphicon glyphicon-list-alt"></span><h5>Apartamentai</h5></div></a>
                <a href="{{ action('AdminController@orders')}}"><div style="text-align: center;"><span class="glyphicon glyphicon-th-list"></span><h5>Rezervacijos</h5></div></a>
            </ul>

        </div>
    </nav>

    <div id="content">
        <div class="container-fluid" >
            <div class="row">
                @yield('turinys')
            </div>
        </div>

    </div>
</div>


<script>	/*Menu-toggle*/
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("active");
        alert(1);
    });</script>
</body>
</html>
