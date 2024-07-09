@extends('layout')
@section('content')
@vite(['resources/js/favoritos.js'])
<div class="container my-5">
    <div class="row justify-content-center ">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <h1 class="text-center">Busca dentro de tus videos de favoritos</h1>
            <favoritos :user="{{auth()->user()}}"></favoritos>
        </div>
    </div>
</div>
@endsection