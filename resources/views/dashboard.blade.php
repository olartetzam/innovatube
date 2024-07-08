@extends('layout')
@section('content')
@vite(['resources/js/home.js'])
<div class="container my-5">
    <div class="row justify-content-center ">
        <div class="card col-sm-12 col-md-12 col-lg-12">
            <h1 class="text-center">Busca tu video favorito</h1>
            <div id="home"></div>
        </div>
    </div>
</div>
@endsection