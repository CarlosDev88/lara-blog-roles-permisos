@extends('adminlte::page')

@section('title', 'Lara Blog')

@section('content_header')
<h1>Crear un nuevo post</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        {!! Form::open(['route'=>'admin.posts.store','autocomplete'=>'off', 'files'=>true]) !!}        

        @include('admin.posts.partials.form')

        {!! Form::submit('Crear post',['class'=>'btn btn-primary'])!!}
        {!! Form::close() !!}
    </div>
</div>
@stop

@section('css')
<style>
    .image-wrapper {
        position: relative;
        padding-bottom: 56.25%;
    }

    .image-wrapper img {
        position: absolute;
        object-fit: cover;
        width: 100%;
        height: 100%;
    }
</style>
@stop

@section('js')
<script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}">
</script>

<script>
    $(document).ready(function() {
        $("#name").stringToSlug({
            setEvents: 'keyup keydown blur',
            getPut: '#slug',
            space: '-'
        });
    });

    document.getElementById('file').addEventListener('change', cambiarImagen);

    function cambiarImagen(event) {
        let file = event.target.files[0];

        let reader = new FileReader();

        reader.onload = (event) => {
            document.getElementById('picture').setAttribute('src', event.target.result);
        }

        reader.readAsDataURL(file);
    }
</script>
@endsection