@extends('adminlte::page')

@section('title', 'MOP | Cadastro')

@section('content')

<div class="header mb-2">
    <h1 class="text-center text-bold">Cadastro de Prestador</h1>
</div> 

<div class="mx-auto col-md-10">
    <div class="mt-2 mb-2">
        {!! Form::open(['route' => 'provider.store', 'class' => 'form']) !!}

        {!! Form::token(); !!}
    
        <div class="form-group">
            {{ Form::label('name', 'Nome:') }}
            {!! Form::text('name', '', ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {{ Form::label('email', 'E-Mail:') }}
            {!! Form::text('email', '',['class' => 'form-control']) !!}
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                {{ Form::label('cpf', 'CPF:') }}
                {!! Form::text('cpf', '',['class' => 'form-control']) !!} 
            </div>
            <div class="form-group col-md-6">
                {{ Form::label('telephone', 'Telefone:') }}
                {!! Form::text('telephone', '',['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                {!! Form::label('street', 'Rua') !!}
                {!! Form::text('street', '', ['class' => ['form-control']]) !!}
            </div>
            <div class="fomr-group col-md-6">
                {!! Form::label('district', 'Bairro') !!}
                {!! Form::text('district', '', ['class' => ['form-control']]) !!}
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                {!! Form::label('city', 'Cidade') !!}
                {!! Form::text('city', '', ['class' => ['form-control']]) !!}
            </div>
            <div class="fomr-group col-md-6">
                {!! Form::label('state', 'Estado') !!}
                {!! Form::text('state', '', ['class' => ['form-control']]) !!}
            </div>
        </div>
        <div class="text-center">
            {!! Form::submit('Enviar',['class' => 'btn btn-success'])!!}  
        </div>
    </div>
</div>

{!! Form::close() !!}

@stop 