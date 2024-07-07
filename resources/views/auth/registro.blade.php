@extends('auth.layoutLogin')
@section('content')
<div class="container container-login">
    <div class="row justify-content-center ">
        <div class="col-sm-4 col-md-4 col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="text-center">Registrarse</h5>
                </div>
                <div class="card-body">
                    <form action="{{route('login.registro.add')}}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre(s)</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" value="{{old('nombre')}}" required>
                        </div>
                        <div class="mb-3">
                            <label for="apellido" class="form-label">Apellido(s)</label>
                            <input type="text" class="form-control" id="apellido" name="apellido" value="{{old('apellido')}}" required>
                        </div>
                        <div class="mb-3">
                            <label for="usuario" class="form-label">Usuario</label>
                            <input type="text" class="form-control" id="usuario" name="usuario" value="{{old('usuario')}}" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Correo Electrónico</label>
                            <input type="text" class="form-control" id="email" name="email" value="{{old('email')}}" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="mb-3">
                            <label for="confirm" class="form-label">Confirma la Contraseña</label>
                            <input type="password" class="form-control" id="confirm" name="confirm" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Registrarme</button>
                    </form>
                </div>
                <div class="card-footer">
                    <a href="{{route('inicio')}}">Regresar al Login</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection