@extends('auth.layoutLogin')
@section('content')
<div class="container container-login">
    <div class="row justify-content-center ">
        <div class="col-sm-4 col-md-4 col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="text-center">Cambiar contraseña</h5>
                </div>
                <div class="card-body">
                    <form action="{{route('login.cambio')}}" method="get">
                        @csrf
                        <input hidden type="email" class="form-control" id="email" name="email" value="{{$email}}">
                        <div class="mb-3">
                            <label for="password" class="form-label">Nueva Contraseña</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <div class="mb-3">
                            <label for="confirm" class="form-label">Confirmar Contraseña</label>
                            <input type="password" class="form-control" id="confirm" name="confirm">
                        </div>
                        <button type="submit" class="btn btn-primary">Ingresar</button>
                    </form>
                </div>
                <div class="card-footer">
                    <a href="{{route('login.olvido')}}">Se te olvidó tu contraseña</a>
                    <a href="{{route('login.registro')}}">Registrarse</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
    