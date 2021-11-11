@extends('admin.template')
@section('pgtitle', "Nueva Solicitud")
@section('extra_style_sheet')
    <link rel="stylesheet" href="{{ url('/static/css/solicitudes/register.css') }}">
@endsection

@section('content')
    <h3> Registro de Solicitud </h3>

    <!-- Form structure with Laravel Collective -->
    {!! Form::open(['url' => '/solicitudes/new']) !!}
    
    <label for="nom_remitente" class="inline-label"> Nombre del remitente (u organización): </label>
    {!! Form::text('nom_remitente', null, ['class' => 'form-control inline-input', 'placeholder' => 'Remitente', 'required']) !!}

    <label for="telefono_remitente" class="inline-label lb-mleft"> Teléfono: </label>
    {!! Form::text('telefono_remitente', null, ['class' => 'form-control', 'placeholder' => 'Teléfono', 'required']) !!}

    <label for="referencia_sol" class="inline-label"> Referencia(s): </label>
    {!! Form::text('referencia_sol', null, ['class' => 'form-control inline-input', 'placeholder' => 'Referencia', 'required']) !!}

    <label for="tipo_sol"> Tipo de solicitud: </label>
    {!! Form::select('tipo_sol', ['0' => 'Selecciona tipo', '1' => 'Recursos materiales', '2' => 'Apoyos', '3' => '...'], '0', ['class' => 'form-control', 'required']) !!}

    <label for="asunto_sol" class="inline-label lb-mleft"> Asunto: </label>
    {!! Form::text('asunto_sol', null, ['class' => 'form-control', 'placeholder' => 'Asunto', 'required']) !!}

    <label for="observaciones_sol" class="inline-label lb-mleft"> Observaciones: </label>
    {!! Form::textarea('observaciones_sol', null, ['class' => 'form-control', 'placeholder' => 'Observaciones', 'rows' => 3, 'required']) !!}

    <label for="prioridad_sol"> Prioridad: * </label>
    {!! Form::select('prioridad_sol', ['0' => 'Selecciona opción', '1' => 'Normal', '2' => 'Importante', '3' => 'Urgente'], '0', ['class' => 'form-control', 'required']) !!}

    <div class="center-item">
        {!! Form::submit('Guardar Solicitud', ['class' => 'btn btn-primary btn-register-sol']) !!}
    </div>

    {!! Form::close() !!}

@endsection