{!! Form::open(['route' => 'profission.store', 'class' => 'form']) !!}

        <div class="form-group">
        {!! Form::label('description', 'Profissão') !!}
        {!! Form::text('description', $value = null, ['class' => ['form-control']]) !!}
        </div>

<div class="text-center">
    {!! Form::submit('Enviar',['class' => 'btn btn-success btn-block'])!!}   
</div>
{!! Form::close() !!}