
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="theme-color" content="#000000">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <title>Kampai</title>
    {{--<script src="{{asset('assets/leaflet/css/leaflet.css')}}"></script>--}}
    {{--<script src="{{asset('assets/leaflet/js/leaflet.js')}}"></script>--}}



    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css"
          integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ=="
          crossorigin=""/>

    <link rel="stylesheet" href="{{URL::asset('assets/leaflet/css/leaflet-routing-machine.css')}}">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">




    {{--<link rel="stylesheet" href="https://api.tiles.mapbox.com/mapbox.js/plugins/leaflet-markercluster/v0.4.0/MarkerCluster.css">--}}
    {{--<link rel="stylesheet" href="https://api.tiles.mapbox.com/mapbox.js/plugins/leaflet-markercluster/v0.4.0/MarkerCluster.Default.css">--}}
    <link rel="stylesheet" href="{{URL::asset('assets/bootleaf/css/app.css')}}">
    <link rel="stylesheet" href="{{URL::asset('assets/leaflet/css/main.css')}}">
    {{--<link rel="apple-touch-icon" sizes="76x76" href="assets/img/favicon-76.png">--}}
    {{--<link rel="apple-touch-icon" sizes="120x120" href="assets/img/favicon-120.png">--}}
    {{--<link rel="apple-touch-icon" sizes="152x152" href="assets/img/favicon-152.png">--}}
    {{--<link rel="icon" sizes="196x196" href="assets/img/favicon-196.png">--}}
    {{--<link rel="icon" type="image/x-icon" href="assets/img/favicon.ico">--}}
</head>

<body>

<div id="app">
@yield('content')
</div>

<script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"
        integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw=="
        crossorigin=""></script>
<script src="{{URL::asset('assets/leaflet/js/leaflet-routing-machine.js')}}"></script>

<script src="{{asset('js/app.js')}}"></script>

<!-- <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script> -->
<script  src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/3.0.3/handlebars.min.js"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/list.js/1.1.1/list.min.js"></script>--}}
{{--<script src="https://api.tiles.mapbox.com/mapbox.js/plugins/leaflet-markercluster/v0.4.0/leaflet.markercluster.js"></script>--}}
{{--<script src="https://api.tiles.mapbox.com/mapbox.js/plugins/leaflet-locatecontrol/v0.43.0/L.Control.Locate.min.js"></script>--}}

<script src="{{URL::asset('assets/bootleaf/js/app.js')}}"></script>


</body>
</html>
