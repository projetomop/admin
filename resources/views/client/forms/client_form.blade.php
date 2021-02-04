<div class="header mb-2">
    <h1 class="text-center text-bold">@yield('header_client')</h1>
</div>
<div class="mx-auto col-md-10">
    <div class="mt-2 mb-2">
        @if (isset($client))
        {!! Form::model($client, ['method' => 'PUT', 'route' => ['client.update', $client->id]]) !!}
        @else
        {!! Form::open(['route' => 'client.store', 'class' => 'form']) !!}
        {!! Form::token(); !!}
        @endif


        <div class="form-group">
            {{ Form::label('name', 'Nome:') }}
            {!! Form::text('name', $value = null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {{ Form::label('email', 'E-Mail:') }}
            {!! Form::text('email', $value = null,['class' => 'form-control']) !!}
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                {{ Form::label('cpf', 'CPF:') }}
                {!! Form::text('cpf', $value = null,['class' => 'form-control']) !!}
            </div>
            <div class="form-group col-md-6">
                {{ Form::label('telephone', 'Telefone:') }}
                {!! Form::text('telephone', $value = null,['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                {!! Form::label('street', 'Rua') !!}
                {!! Form::text('street', $value = null, ['class' => ['form-control']]) !!}
            </div>
            <div class="fomr-group col-md-6">
                {!! Form::label('district', 'Bairro') !!}
                {!! Form::text('district', $value = null, ['class' => ['form-control']]) !!}
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                {!! Form::label('city', 'Cidade') !!}
                {!! Form::text('city', $value = null, ['class' => ['form-control']]) !!}
            </div>
            <div class="fomr-group col-md-6">
                {!! Form::label('state', 'Estado') !!}
                {!! Form::text('state', $value = null, ['class' => ['form-control']]) !!}
            </div>
        </div>
        <div class="text-center">
            @if (isset($client))
            {!! Form::submit('Editar',['class' => 'btn btn-success'])!!}
            @else
            {!! Form::submit('Cadastrar',['class' => 'btn btn-success'])!!}
            @endif
        </div>
        {!! Form::close() !!}
    </div>
</div>