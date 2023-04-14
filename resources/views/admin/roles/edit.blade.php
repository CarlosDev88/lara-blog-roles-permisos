@extends('adminlte::page')

@section('title', 'Lara Blog')

@section('content_header')
    <h1>Editar role</h1>
@stop

@section('content')
@if(session('info'))
<div class="alert alert-success">
    <strong>{{session('info')}}</strong>
</div>
@endif

    <div class="card">
        <div class="card-body">
        {!! Form::model($role,['route'=>['admin.roles.update',$role],'method'=>'put']) !!}

        @include('admin.roles.partials.form')

        {!! Form::submit('Actualizar role',['class'=>'btn btn-primary'])!!}
        {!! Form::close() !!}
        </div>
    </div>
@stop

