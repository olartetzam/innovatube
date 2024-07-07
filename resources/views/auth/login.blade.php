@extends('auth.layoutLogin')
@section('content')
<div class="container container-login">
    <div class="row justify-content-center ">
        <div class="col-sm-4 col-md-4 col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="text-center">Iniciar Sesión</h5>
                </div>
                <div class="card-body">
                    <form action="{{route('login')}}" method="get">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Correo Electrónico</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" value="{{old('email')}}">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="*****">
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
    