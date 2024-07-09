@extends('layout')
@section('content')
@vite(['resources/js/home.js'])
<div class="container my-5">
    <div class="row justify-content-center ">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <h1 class="text-center"><b>¿Que te interesa ver hoy?</b></h1>
            <home user="2"></home>
        </div>
    </div>
</div>
@endsection