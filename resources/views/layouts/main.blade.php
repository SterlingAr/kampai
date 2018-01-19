<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>

    <link rel="stylesheet" href="{{asset('assets/leaflet/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('assets/leaflet/css/leaflet.css')}}">



    <script src="{{asset('assets/leaflet/js/leaflet.js')}}"></script>
    <script src="{{asset('assets/leaflet/js/main.js')}}"></script>



    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <!-- Latest compiled and minified CSS -->
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">


    <script src="{{URL::asset('assets/app/js/side-menu.js')}}"></script>
    <link rel="stylesheet" href="{{URL::asset('assets/app/css/side-menu.css')}}">
    <link rel="stylesheet" href="{{URL::asset('assets/app/css/user-profile.css')}}">




</head>
<body>

    <div id="app" >
            @yield('content')
    </div>

    <script src="{{asset('js/app.js')}}"> </script>
</body>
</html>