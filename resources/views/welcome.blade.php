<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Kampai</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ URL::asset('assets/css/estiloWelcome.css') }}" rel="stylesheet" type="text/css">
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="{{ URL::asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{ URL::asset('assets/js/sidebar.js')}}"></script>
    <!-- Bootstrap Js CDN -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container-fluid sinpadding">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
            <nav  id="sidebar">
                <!-- Sidebar Header -->
                <div class="sidebar-header">
                    <h3>Kampai</h3>
                    <input type="search" placeholder="Search...">
                </div>
                <!-- Sidebar Links -->
                <ul class="list-unstyled components">
                    <li class="active"><a href="#">Home</a></li>
                    <li><a href="{{ route('login') }}">Iniciar sesion</a></li>
                    <li><a href="{{ route('register') }}">Registrarse</a></li>
                    <li><!-- Link with dropdown items -->
                        <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">Bares</a>
                        <ul class="collapse list-unstyled" id="homeSubmenu">
                            <li><a href="#">Bar Arkupe</a></li>
                            <li><a href="#">Bar Lasarte</a></li>
                            <li><a href="#">Bar Campero</a></li>
                        </ul>
                    <li><a href="#">Idioma</a></li>
                    <li><!-- Link with dropdown items -->
                        <a href="#shareSubmenu" data-toggle="collapse" aria-expanded="false">Compartir</a>
                        <ul class="collapse list-unstyled" id="shareSubmenu">
                            <li>
                                <a href="http://www.youtube.com" target="_blank" class="youtube"><span class="fa fa-youtube"></span> </a>
                                <a href="http://www.facebook.com" target="_blank" class="facebook"><span class="fa fa-facebook"></span> </a>
                                <a href="http://twitter.com" target="_blank" class="twitter"><span class="fa fa-twitter"></span> </a>
                                <a href="http://www.instagram.com" target="_blank" class="instagram"><span class="fa fa-instagram"></span> </a>
                            </li>
                        </ul>
                </ul>
            </nav>
        </div>
        <div class="col-lg-10 col-md-9 col-sm-8 col-xs-12" id="insideContent" >
            <div class="mapa">
                @include('maps.map')
            </div>
        </div>
    </div>
</div>
</body>
</html>
