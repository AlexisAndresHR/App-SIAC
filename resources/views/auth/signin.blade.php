<!-- Auth pages template -->
@extends('auth.template')

@section('pgtitle', "Iniciar Sesión")

@section('pgcontent')
    <div class="box">
        <div class="box-login shadow">
            <div class="h2-cont">
                <h2> Bienvenid@ al SIAC </h2>
            </div>

            <!-- Code block to show form validation errors to users on screen -->
            @if (Session::has('message'))
                <div class="container">
                    <div class="alert alert-{{ Session::get('typealert') }}" style="display: none;">
                        {{ Session::get('message') }}
                        @if ($errors->any())
                            <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                            </ul>
                        @endif
                        <script>
                            $('.alert').slideDown();
                            setTimeout(function(){ $('.alert').slideUp; }, 10000);
                        </script>
                    </div>
                </div>
            @endif

            <!-- Form structure using Laravel Collective -->
            {!! Form::open(['url' => '/login']) !!}
            <label for="email"> Usuario: </label>
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

            <!-- To link the new users register section -->
            <div class="footer">
                <p class="text-center"> ó </p>
                <p class="text-center"> ¿Usuario nuevo? </p>
                <a href="{{ url('/register') }}">
                    <button class="btn btn-primary"> Registrarse </button>
                </a>
            </div>
        </div>
    </div>
@endsection
