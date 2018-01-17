@extends('layouts.master')

@section('content')

<div class="row">


        <div class="col-md-4">
                <router-link to="/bars">  <a class="btn btn-primary" href="" role="button">Bars</a></router-link>
                <router-link to="/users">  <a class="btn btn-primary" href="" role="button">Users</a></router-link>
                <router-link to="/users/login">  <a class="btn btn-primary" href="" role="button">Login</a></router-link>


        </div>


        <div class="col-md-8">

                <maps></maps>

        </div>

</div>


@endsection