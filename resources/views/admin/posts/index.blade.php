@extends('adminlte::page')

@section('title', 'Lara Blog')

@section('content_header')
<a class="btn btn-secondary float-right" href="{{route('admin.posts.create')}}">Crear post</a>
    <h1>Listado de posts existentes</h1>
   
@stop

@section('content')
    @if(session('info'))
    <div class="alert alert-success">
        <strong>{{session('info')}}</strong>
    </div>
    @endif
    @livewire('admin.posts-index')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop