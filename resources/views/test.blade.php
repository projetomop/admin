@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
    <div class="header mb-5">
        <h1 class="text-center">Dashboard MOP</h1>
    </div>    
    <div class="mx-auto">
        <div class="mt-2 md-col-10">
        {!! Form::open(['url' => '']) !!}
        
        <div class="form-group md-10">
            {{ Form::label('name', 'Nome:') }}
            {!! Form::text('name', 'Digite seu nome', ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {{ Form::label('email', 'E-Mail:') }}
            {!! Form::text('email', 'Digite seu Email',['class' => 'form-control']) !!}
        </div>
        {!! Form::close() !!}
        </div>
    </div>
@endsection

