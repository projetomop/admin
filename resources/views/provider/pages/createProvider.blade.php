@extends('adminlte::page')

@section('css')
<link rel="stylesheet" href="/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
@stop

@section('title', 'MOP | Cadastro')

@section('header_client', 'Cadastro de Provedor')

@section('content')

@include('provider.forms.provedor_form')

@section('js')
<script src="/plugins/select2/js/select2.full.min.js"></script>
<script>
$(function () {
//Initialize Select2 Elements
$('.select2').select2()
});
</script>
@stop

@stop