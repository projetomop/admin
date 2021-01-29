@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
    <div class="header mb-2">
        <h1 class="text-center">Dashboard MOP</h1>
    </div>    
    <div class="mx-auto">
        <div class="mt-2 mb-2">
        {!! Form::open(['url' => '', 'class' => 'form']) !!}
        
        <div class="form-group">
            {{ Form::label('name', 'Nome:') }}
            {!! Form::text('name', 'Digite seu nome', ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {{ Form::label('cpf', 'CPF:') }}
            {!! Form::text('cpf', 'Digite seu CPF',['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {{ Form::label('email', 'E-Mail:') }}
            {!! Form::text('email', 'Digite seu Email',['class' => 'form-control']) !!}
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                {!! Form::label('street', 'Rua') !!}
                {!! Form::text('street', 'Nome da Rua', ['class' => ['form-control']]) !!}
            </div>
            <div class="fomr-group col-md-6">
                {!! Form::label('bairro', 'Bairro') !!}
                {!! Form::text('bairro', 'Nome do Bairro', ['class' => ['form-control']]) !!}
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                {!! Form::label('city', 'Cidade') !!}
                {!! Form::text('city', 'Nome da Cidade', ['class' => ['form-control']]) !!}
            </div>
            <div class="fomr-group col-md-6">
                {!! Form::label('state', 'Estado') !!}
                {!! Form::text('state', 'Nome do Estado', ['class' => ['form-control']]) !!}
            </div>
        </div>
        {!! Form::submit('Enviar',['class' => 'btn btn-success'])!!}  
        {!! Form::close() !!}
        </div>
    </div>
@endsection

