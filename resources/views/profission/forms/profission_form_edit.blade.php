{!! Form::model($profission, ['method' => 'PUT', 'route' => ['provider.update', $profission->id]]) !!}
<div class="form-group">
    {!! Form::label('description', 'Profissão') !!}
    {!! Form::text('description', $value = null, ['class' => ['form-control']]) !!}
</div>

<div class="text-center">
    {!! Form::submit('Editar',['class' => 'btn btn-success btn-block'])!!}
</div>
{!! Form::close() !!}