@extends('adminlte::page')

@section('title', 'MOP | Todos os Clientes')

@section('content')

<h1 class="text-center text-bold">Usuários</h1>
<hr>
<div class="cadastro">
    <a href="{{ route('client.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Novo</a>
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
            @foreach ($clients as $client)
            
            <tr>
                <th scope="row">{{ $client->id }}</th>
                <td>{{ $client->name }}</td>
                <td>{{ $client->cpf }}</td>
                <td>{{ $client->email }}</td>
                <td>{{ $client->telephone }}</td>
                <!--<td>{{ $client->street }}</td>
                <td>{{ $client->district }}</td>
                <td>{{ $client->city }}</td>
                <td>{{ $client->state }}</td> -->
                <td class="text-center"><a href="{{ route('client.show', ['client' => $client->id]) }}" class="btn btn-success">Ver</a>
                </td>
            </tr>
        </tbody>
        @endforeach
    </table>
</div>
@stop