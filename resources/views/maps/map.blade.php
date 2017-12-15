@extends('maps.map_master')
@section('styles')
    <link rel="stylesheet" href="{{URL::to('assets/leaflet/css/main.css')}}">
    <link rel="stylesheet" href="{{URL::to('assets/leaflet/css/leaflet.css')}}">
@endsection

@section('scripts')
    <script src="{{URL::to('assets/leaflet/js/leaflet.js')}}"></script>
    <script src="{{URL::to('assets/leaflet/js/main.js')}}"></script>
@endsection


@section('map')
    <div id="mapid">

    </div>
@endsection