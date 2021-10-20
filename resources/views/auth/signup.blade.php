@extends('auth.template')

@section('pgtitle', "Registrarse")

@section('pgcontent')
    <div class="box">
        <div class="box-register shadow">
            <div class="h2-cont">
                <h2> Regístrate en el SIAC </h2>
            </div>

            <!-- Form structure using Laravel Collective -->
            {!! Form::open(['url' => '/register']) !!}
            
            <label for="num_empleado" class="inline-label"> Número empleado: </label>
            <label for="puesto" class="inline-label lb-mleft"> Puesto: </label>
            <div class="input-group">
                <div class="input-group-text"> <i class="fas fa-hashtag"></i> </div>
                {!! Form::text('num_empleado', null, ['class' => 'form-control inline-input']) !!}

                <div class="input-group-text"> <i class="fas fa-user"></i> </div>
                {!! Form::text('puesto', null, ['class' => 'form-control']) !!}
            </div>

            <label for="nombre" class="inline-label"> Nombre(s): </label>
            <label for="apellidos" class="inline-label lb-mleft"> Apellidos: </label>
            <div class="input-group">
                {!! Form::text('nombre', null, ['class' => 'form-control inline-input', 'placeholder' => 'Nombre(s)']) !!}

                {!! Form::text('apellidos', null, ['class' => 'form-control', 'placeholder' => 'Apellidos']) !!}
            </div>

            <label for="dependencia"> Dependencia: </label>
            <div class="input-group">
                <div class="input-group-text"> <i class="fas fa-building"></i> </div>
                {!! Form::select('dependencia', ['0' => 'Selecciona tu dependencia', '1' => 'Innovación', '2' => 'Ecología'], '0', ['class' => 'form-control']) !!}
            </div>

            <label for="new_email"> Correo electrónico: </label>
            <div class="input-group">
                <div class="input-group-text"> <i class="fas fa-at"></i> </div>
                {!! Form::email('new_email', null, ['class' => 'form-control', 'placeholder' => "Correo institucional"]) !!}
            </div>
    
            <label for="new_password" class="inline-label"> Contraseña: </label>
            <label for="repeat_password" class="inline-label lb-mleft"> Repetir contraseña: </label>
            <div class="input-group">
                <div class="input-group-text"> <i class="fas fa-key"></i> </div>
                {!! Form::password('new_password', ['class' => 'form-control inline-input', 'placeholder' => "Contraseña"]) !!}

                <div class="input-group-text"> <i class="fas fa-key"></i> </div>
                {!! Form::password('repeat_password', ['class' => 'form-control', 'placeholder' => "Repetir contraseña"]) !!}
            </div>
    
            {!! Form::submit('Registrarse', ['class' => 'btn btn-primary btn-register']) !!}
            
            {!! Form::close() !!}
        </div>
    </div>
@endsection