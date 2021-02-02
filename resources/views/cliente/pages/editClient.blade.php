@extends('adminlte::page')

@section ('title', 'MOP | Cadastro')

@section('content')

<div class="header mb-2">
    <h1 class="text-center text-bold">Edição do Cliente {{$client->name}}</h1>
</div>    
<div class="mx-auto col-md-10">
    <div class="mt-2 mb-2">
            {!! Form::model($client, ['method' => 'PUT', 'route' => ['client.update', $client->id]]) !!}

        
        <div class="form-group">
            {{ Form::label('name', 'Nome:') }}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {{ Form::label('email', 'E-Mail:') }}
            {!! Form::text('email', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                {{ Form::label('cpf', 'CPF:') }}
                {!! Form::text('cpf', null, ['class' => 'form-control'])!!} 
            </div>
            <div class="form-group col-md-6">
                {{ Form::label('telephone', 'Telefone:') }}
                {!! Form::text('telephone', null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                {{ Form::label('street', 'Rua') }}
                {!! Form::text('street', null, ['class' => 'form-control']) !!}
            </div>
            <div class="fomr-group col-md-6">
                {!! Form::label('district', 'Bairro') !!}
                {!! Form::text('district', null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                {!! Form::label('city', 'Cidade') !!}
                {!! Form::text('city', null, ['class' => 'form-control']) !!}
            </div>
            <div class="fomr-group col-md-6">
                {!! Form::label('state', 'Estado') !!}
                {!! Form::text('state', null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="text-center">
            {!! Form::submit('Salvar',['class' => 'btn btn-success'])!!}  
        </div>
            
    </div>
</div>

{!! Form::close() !!}

@stop