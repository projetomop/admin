@inject('profissions', 'App\Models\Profission')
@php
$profission = $profissions->all();
@endphp
<section class="content">
    <div class="row">
        <div class="col-md-12 ">
            <div class="card card-outline card-info p-3 ">
                <div class="card-header">
                    <h3>
                        @yield('header_client')
                    </h3>
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
                <div class="form-group">
                    {{ Form::label('email', 'E-mail:') }}
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
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label>Profissão</label>
                        <div class="select2-success">
                            <select class="select2" multiple="multiple" data-placeholder="Selecione profissão"
                                data-dropdown-css-class="select2-success" style="width: 100%;">
                                @foreach ($profission as $item)
                                <option value="{{$item->id}}"> {{$item->description}}</option>

                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="text-center">
                    @if(isset($provider))
                    {!! Form::submit('Editar',['class' => 'btn btn-success'])!!}
                    @else
                    {!! Form::submit('Enviar',['class' => 'btn btn-success'])!!}
                    @endif
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</section>