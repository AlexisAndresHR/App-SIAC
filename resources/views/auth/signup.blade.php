@extends('auth.template')

@section('pgtitle', "Registrarse")

@section('pgcontent')
    <div class="box">
        <div class="box-register shadow">
            <div class="h2-cont">
                <h3> Regístrate en el SIAC </h3>
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
            {!! Form::open(['url' => '/register']) !!}
            
            <label for="num_empleado" class="inline-label"> Número empleado: </label>
            <label for="puesto" class="inline-label lb-mleft"> Puesto: </label>
            <div class="input-group">
                <div class="input-group-text"> <i class="fas fa-hashtag"></i> </div>
                {!! Form::text('num_empleado', null, ['class' => 'form-control inline-input', 'placeholder' => '0000', 'maxlength' => 4, 'required']) !!}

                <div class="input-group-text"> <i class="fas fa-user"></i> </div>
                {!! Form::text('puesto', null, ['class' => 'form-control', 'placeholder' => 'Puesto', 'required']) !!}
            </div>

            <label for="nombre" class="inline-label"> Nombre(s): </label>
            <label for="apellidos" class="inline-label lb-mleft"> Apellidos: </label>
            <div class="input-group">
                {!! Form::text('nombre', null, ['class' => 'form-control inline-input', 'placeholder' => 'Nombre(s)', 'required']) !!}

                {!! Form::text('apellidos', null, ['class' => 'form-control', 'placeholder' => 'Apellidos', 'required']) !!}
            </div>

            <label for="dependencia"> Dependencia: </label>
            <div class="input-group">
                <div class="input-group-text"> <i class="fas fa-building"></i> </div>
                {!! Form::select('dependencia', $dependenciesItems, '0', ['class' => 'form-control', 'required']) !!}
            </div>

            <label for="new_email"> Correo electrónico: </label>
            <div class="input-group">
                <div class="input-group-text"> <i class="fas fa-at"></i> </div>
                {!! Form::email('new_email', null, ['class' => 'form-control', 'placeholder' => "Correo institucional", 'required']) !!}
            </div>
    
            <label for="new_password" class="inline-label"> Contraseña: </label>
            <label for="repeat_password" class="inline-label lb-mleft"> Repetir contraseña: </label>
            <div class="input-group">
                <div class="input-group-text"> <i class="fas fa-key"></i> </div>
                {!! Form::password('new_password', ['class' => 'form-control inline-input', 'placeholder' => "Contraseña", 'required']) !!}

                <div class="input-group-text"> <i class="fas fa-key"></i> </div>
                {!! Form::password('repeat_password', ['class' => 'form-control', 'placeholder' => "Repetir contraseña", 'required']) !!}
            </div>
    
            {!! Form::submit('Regístrate', ['class' => 'btn btn-primary btn-register']) !!}
            
            {!! Form::close() !!}
        </div>
    </div>
@endsection