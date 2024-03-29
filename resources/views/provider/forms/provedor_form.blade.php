@inject('profissions', 'App\Models\Profission')
@php
$profission = $profissions->all();
$profissao = $profission->pluck('description', 'id');
@endphp
<section class="content">
    <div class="row">
        <div class="col-md-12 ">
            <div class="card card-outline card-info ">
                <div class="card-header">
                    
                    <h3 class="card-title">
                        @yield('header_provider')
                    </h3>
                    <div class="card-tools">
                        <div class="input-group input-group-sm ml-3">
                            @if (isset($provider))
                            <a type="button" class="btn btn-info btn-sm" href="{{route('provider.show',$provider->id)}}">
                                <i class="fas fa-arrow-left"></i>
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div>
                        @if ($errors->any())
                        {!! implode('', $errors->all('<div class="alert alert-danger">:message</div>')) !!}
                        @endif
                    </div>
                    @if (isset($provider))
                    {!! Form::model($provider, ['method' => 'PUT', 'route' => ['provider.update', $provider->id]]) !!}
                    @else
                    {!! Form::open(['route' => 'provider.store', 'class' => 'form']) !!}
                    {!! Form::token(); !!}
                    @endif


                    <div class="form-group">
                        {{ Form::label('name', 'Nome:') }}
                        {!! Form::text('name', $value = null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-row">
                    <div class="form-group col-md-6">
                        {{ Form::label('email', 'E-mail:') }}
                        {!! Form::text('email', $value = null,['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group col-md-6">
                        {{ Form::label('birthDate', 'Data da Nascimento:') }}
                        {!! Form::date('birthDate', $value = null,['class' => 'form-control']) !!}
                    </div>
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
                    <div class="form-row mb-3">
                        <div class="form-group col-md-6">
                            {!! Form::label('cep', 'CEP') !!}
                            {!! Form::text('cep', $value = null, ['class' => ['form-control'], 'id'=>'cep']) !!}
                        </div>
                        <div class="form-group col-md-6">
                            {!! Form::label('street', 'Rua') !!}
                            {!! Form::text('street', $value = null, ['class' => ['form-control'], 'id'=>'rua']) !!}
                        </div>
                        <div class="fomr-group col-md-6">
                            {!! Form::label('district', 'Bairro') !!}
                            {!! Form::text('district', $value = null, ['class' => ['form-control'], 'id'=>'bairro']) !!}
                        </div>
                        <div class="form-group col-md-6">
                            {!! Form::label('city', 'Cidade') !!}
                            {!! Form::text('city', $value = null, ['class' => ['form-control'], 'id'=>'cidade']) !!}
                        </div>
                        <div class="fomr-group col-md-6">
                            {!! Form::label('state', 'Estado') !!}
                            {!! Form::text('state', $value = null, ['class' => ['form-control'], 'id'=>'uf']) !!}
                        </div>
                        <div class="fomr-group col-md-6">
                            {!! Form::label('profission_id', 'Profissao') !!}
                            {!! Form::select('profission_id', $profissao->prepend('----',''), $value = null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="text-center">
                        @if (isset($provider))
                        {!! Form::submit('Editar',['class' => 'btn btn-info btn-block'])!!}
                        @else
                        {!! Form::submit('Cadastrar',['class' => 'btn btn-success btn-block'])!!}
                        @endif
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</section>
