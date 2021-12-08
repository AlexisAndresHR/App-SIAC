<!-- Using corresponding page template -->
@extends('dashboard.template')
@section('pg-title', "Panel Administrador")
@section('sidebar-menu-items')
<div>
    <a href="{{ route('admin.panel') }}"> <li> <i class="fas fa-home"></i> &nbsp; Inicio </li> </a>
    <a href="{{ route('get.solicitudes.adm') }}"> <li> <i class="fas fa-file-alt"></i> &nbsp; Solicitudes </li> </a>
    <a href="{{ route('get.secretarias.adm') }}"> <li> <i class="fas fa-building"></i> &nbsp; Secretarías </li> </a>
    <a href="{{ url('admin/') }}"> <li> Dependencias </li> </a>
    <a href="{{ url('admin/') }}"> <li> ... </li> </a>
</div>
@endsection

@section('content')
    <h2> Working on Admin content... </h2>
    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quos numquam dolores exercitationem officia, maiores aut! Sint, at blanditiis ipsa, in delectus nihil officia voluptates, minima suscipit quas corrupti recusandae. Odio.
    <br>
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Id adipisci reprehenderit odit similique ipsam eum mollitia, officiis soluta optio aut a quo commodi magnam nam! Quibusdam aliquam adipisci dolor animi!
@endsection