@extends('layouts.master')

@section('content')

        <router-link to="/bars">  <a class="btn btn-primary" href="#" role="button">Bars</a></router-link>
        <router-link to="/users">  <a class="btn btn-primary" href="#" role="button">Users</a></router-link>


        <router-view>

        </router-view>


@endsection