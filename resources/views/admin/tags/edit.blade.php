@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar Etiqueta</h1>
@stop

@section('content')

    @if (session('info'))
        <div id="session-alert" class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            {!! Form::model($tag, ['route' => ['admin.tags.update', $tag], 'method' => 'PUT']) !!}
                
                @include('admin.tags.partials.form')

                {!! Form::submit('Actualizar Etiqueta', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('js')
    <script src="{{ asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js') }}"></script>
    <script>
        $(document).ready( function() {
            $("#name").stringToSlug({
            setEvents: 'keyup keydown blur',
            getPut: '#slug',
            space: '-'
            });
        });

        setTimeout(function(){
            $('#session-alert').fadeOut('fast');
        }, 3000);
    </script>
@endsection