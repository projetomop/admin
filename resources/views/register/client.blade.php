@extends('adminlte::page')

@section('title', 'Cadastro de Clientes')

@section('content')
    <div class="head mx-auto">
        <h1 class="text-center text-uppercase text-bold">Cadastro de Clientes</h1>
    </div>
    <div>
        {!! Form::open(['route' => 'route.name']) !!}

        {!! Form::close() !!}
        
    </div>
@endsection