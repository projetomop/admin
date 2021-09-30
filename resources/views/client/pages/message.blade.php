@extends('adminlte::page')

@section('content')

<section class="content">
    <div class="row">
        <div class="col-md-12 ">
            <div class="card card-outline card-info ">
                <div class="card-header">
                    <h3 class="card-title">
                        Mensagens
                    </h3>
                   
                </div>
                <div class="card-body">
                    @foreach ($messages as $message)
                    @if($message->type_sender === "client")
                    <div class="bg-blue mb-3 p-2 w-75 float-left">
                    @else
                    <div class="bg-purple mb-3 p-2 w-75 float-right">
                    @endif
                       <p><strong>Mensagem:</strong> {{$message->message}}</p>
                       <p><strong>Remetente:</strong>{{$message->type_sender}}</p>
                       <p><strong>Hora:</strong>{{$message->created_at}}</p>
                   </div> 
                    @endforeach
                   
                </div>
            </div>
        </div>
    </div>
</section>

@stop