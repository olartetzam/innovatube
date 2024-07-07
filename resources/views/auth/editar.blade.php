@extends('layout')
@section('content')

<div class="container my-5">
    <div class="card">
        <div class="card-header">
            <p class="fs-2 fw-semibold">Bienvenido(a) 
                <span class="text-capitalize">{{auth()->user()->nombre}} {{auth()->user()->apellido}}</span>
            </p>
        </div>
        <div class="card-body">
            <h5 class="card-title">Editar</h5>
            <form action="{{route('update')}}" method="post">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-6 col-sm-12 col-md-12 col-lg-6 mb-3">
                        <label for="password" class="form-label">Nueva Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="col-6 col-sm-12 col-md-12 col-lg-6 mb-3">
                        <label for="confirm" class="form-label">Confirmar Contraseña</label>
                        <input type="password" class="form-control" id="confirm" name="confirm">
                    </div>
                    <div class="col-6 col-sm-12 col-md-12 col-lg-6 mb-3">
                        <button type="submit" class="btn btn-primary">Cambiar Contraseña</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection