@extends('adminlte::page')

@section('title', 'MOP | Todos os Clientes')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Lista de Prestadores de Serviço</h3>
                <div class="card-tools float-left">
                    <div class="input-group input-group-sm ml-3">
                        <a class="btn btn-info btn-sm" href="{{route('provider.create')}}">
                            <i class="fas fa-plus"></i>
                        </a>
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
                    <th scope="col">Nome</th>
                    <th scope="col">CPF</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Telefone</th>
                    <!--<th scope="col">Rua</th>
                        <th scope="col">Bairro</th>
                        <th scope="col">Cidade</th>
                        <th scope="col">Cidade</th> -->
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($provider as $provider)
        
                <tr>
                    <th scope="row">{{ $provider->id }}</th>
                    <td>{{ $provider->name }}</td>
                    <td>{{ $provider->cpf }}</td>
                    <td>{{ $provider->email }}</td>
                    <td>{{ $provider->telephone }}</td>
                    <!--<td>{{ $provider->street }}</td>
                        <td>{{ $provider->district }}</td>
                        <td>{{ $provider->city }}</td>
                        <td>{{ $provider->state }}</td> -->
                    <td class="text-center"><a href="{{ route('provider.show', ['provider' => $provider->id]) }}"
                            class="btn btn-success">Ver</a>
                    </td>
                </tr>
            </tbody>
            @endforeach
        </table>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>

@stop