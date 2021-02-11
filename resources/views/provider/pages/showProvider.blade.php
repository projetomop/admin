@extends('adminlte::page')

@section('content')

<div class="header">
    <h1 class="text-center text-bold">Prestador {{ $provider->name }}</h1>
</div>
<hr>
<div class="mb-2">
    <div class="form-row">
        <div class="form-group col-md-10">
            <label>Nome:</label>
            <input class="form-control" type="text" disabled value="{{ $provider->name }}">
            <label>E-mail:</label>
            <input class="form-control" type="text" disabled value="{{ $provider->email }}">
        </div>
        <div class="form-group col-md-2">
            <img src="{{asset('assets/'.$provider->image)}}" alt="PerfilPrestador" class="img-fluid">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>CPF:</label>
            <input class="form-control" type="text" disabled value="{{ $provider->cpf }}">
        </div>
        <div class="form-group col-md-6">
            <label>Telefone:</label>
            <input class="form-control" type="text" disabled value="{{ $provider->telephone }}">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Rua:</label>
            <input class="form-control" type="text" disabled value="{{ $provider->street }}">
        </div>
        <div class="form-group col-md-6">
            <label>Bairro:</label>
            <input class="form-control" type="text" disabled value="{{ $provider->district }}">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Cidade:</label>
            <input class="form-control" type="text" disabled value="{{ $provider->city }}">
        </div>
        <div class="form-group col-md-6">
            <label>Estado:</label>
            <input class="form-control" type="text" disabled value="{{ $provider->state }}">
        </div>
    </div>
    <div class="row">
        <div class="col">
    <div class="text-center">
        <a href="{{ route('provider.edit',['provider' => $provider->id]) }}" class="btn btn-success">Editar</a>

        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalExemplo">
            Excluir
        </button>
        
        <div class="modal fade" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirmação de Exclusão</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                Tem certeza que deseja excluir o Provedor {{ $provider->name }}?
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
                {{ Form::open(['method' => 'DELETE', 'route' => ['provider.destroy', $provider->id]] )}}
                {{ Form::hidden('method', 'DELETE') }}
                {{ Form::submit('Sim', ['class' => 'btn btn-danger'] )}}
                {{ Form::close() }}
                </div>
            </div>
            </div>
        </div>
    </div>
    </div>
    </div>
</div>

@stop