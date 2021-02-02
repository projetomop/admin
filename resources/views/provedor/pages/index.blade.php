@extends('adminlte::page')

@section('title', 'MOP | Todos os Clientes')

@section('content')

<h1 class="text-center text-bold">Prestadores</h1>
<hr>
<div class="cadastro">
    <a href="{{ route('provider.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Novo</a>
</div>
<div class="table-responsive mt-1">
    <table class="table table-bordered">
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
                <td class="text-center"><a href="{{ route('provider.show', ['provider' => $provider->id]) }}" class="btn btn-success">Ver</a>
                </td>
            </tr>
        </tbody>
        @endforeach
    </table>
</div>
@stop