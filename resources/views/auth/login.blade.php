<!-- Auth pages template -->
@extends('auth.template')

@section('pgtitle', "Iniciar Sesión")

@section('pgcontent')
    <div class="box">
        <div class="box-login shadow">
            <div class="h2-cont">
                <h2> Bienvenid@ al SIAC </h2>
            </div>

            <!-- Form structure using Laravel Collective -->
            {!! Form::open(['url' => '/login']) !!}
            <label for="email"> Correo de acceso: </label>
            <div class="input-group">
                <!--<div class="input-group-prepend"></div>-->
                <div class="input-group-text"> <i class="fas fa-at"></i> </div>
                {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => "Correo institucional"]) !!}
            </div>
    
            <label for="password"> Contraseña: </label>
            <div class="input-group">
                <!--<div class="input-group-prepend"></div>-->
                <div class="input-group-text"> <i class="fas fa-key"></i> </div>
                {!! Form::password('password', ['class' => 'form-control', 'placeholder' => "Contraseña"]) !!}
            </div>
    
            {!! Form::submit('Ingresar', ['class' => 'btn btn-success']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection
