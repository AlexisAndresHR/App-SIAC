@extends('dashboard.template')
@section('pg-title', "Solicitudes")

@section('content')
    <h2> Solicitudes... </h2>
    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quos numquam dolores exercitationem officia, maiores aut! Sint, at blanditiis ipsa, in delectus nihil officia voluptates, minima suscipit quas corrupti recusandae. Odio.
    <br>
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Id adipisci reprehenderit odit similique ipsam eum mollitia, officiis soluta optio aut a quo commodi magnam nam! Quibusdam aliquam adipisci dolor animi!
    <br>
    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptas facilis illo minus at harum explicabo doloribus quod laudantium minima blanditiis sequi eveniet accusantium, non quis nulla ipsa quae molestiae tenetur?
    <br>
    <br>
    <br>
    <br>

    <a href="{{ route('new-solicitud') }}">
        <button class="btn btn-primary"> Nueva Solicitud </button>
    </a>

    <br>
@endsection