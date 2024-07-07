@extends('auth.layoutLogin')
@section('content')
<div class="container container-login">
    <div class="row justify-content-center ">
        <div class="col-sm-4 col-md-4 col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="text-center">¿Olvidaste tu contraseña?</h5>
                </div>
                <div class="card-body">
                    <form action="{{route('login.reset')}}" method="get">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Correo Electrónico</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" value="{{old('email')}}">
                        </div>
                        <button type="submit" class="btn btn-primary">Confirmar</button>
                    </form>
                </div>
                <div class="card-footer">
                    <a href="{{route('inicio')}}">Regresar al login</a>
                    <a href="{{route('login.registro')}}">Registrarse</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection