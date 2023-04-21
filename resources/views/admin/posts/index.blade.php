@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Listado de Posts</h1>
    <a href="{{ route('admin.posts.create') }}" class="btn btn-secondary">Nuevo Post</a>
@stop

@section('content')
    @if (session('info'))
        <div id="session-alert" class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif
    @livewire('admin.posts-index')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        setTimeout(function(){
            $('#session-alert').fadeOut('fast');
        }, 3000);
    </script>
@stop