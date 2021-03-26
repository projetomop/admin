@extends('adminlte::page')

@section('title', 'MOP | Serviços')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Lista de Profissões</h3>
                <div class="card-tools float-left">
                    <div class="input-group input-group-sm ml-3">
                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                            data-target="#cadService-">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                </div>

                <div class="card-tools">
                    <div class="input-group input-group-sm">
                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>

                    </div>

                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body  p-0">
                <table class="table table-hover text-center">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Descrição</th>                            
                            <th scope="col">status</th>                           
                            <th scope="col">-------</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($profissions as $profission)
                        <tr>
                            <td>{{$profission->id}}</td>
                            <td>{{$profission->description}}</td>
                            <td>{{($profission->delete_at == null) ? 'ativo' : 'inativo' }}</td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-success btn-flat">Ações</button>
                                    <button type="button" class="btn btn-success btn-flat dropdown-toggle dropdown-icon"
                                        data-toggle="dropdown">
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <div class="dropdown-menu p-1" role="menu">
                                        <a class="dropdown-item bg-danger mb-1" data-toggle="modal"
                            data-target="#cadService-{{$profission->id}}">Editar</a>
                                        <a class="dropdown-item bg-gray-dark mb-1" href="#">Desativar</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>

<div class="modal fade" id="cadService-">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Adicionar Profissão</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @include('profission.forms.profission_form')
            </div>
            <div class="modal-footer justify-content-end">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

@foreach ($profissions as $profission)
<div class="modal fade" id="cadService-{{$profission->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Editar Profissão</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @include('profission.forms.profission_form_edit')
            </div>
            <div class="modal-footer justify-content-end">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>
@endforeach



@endsection