@extends('layouts.app')

@section('template_title')
    Actualizar Pelicula
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Actualizar Pelicula</span>
                        <a class="btn btn-outline-danger" href="{{ route('peliculas.index') }}"> Cerrar</a>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('peliculas.update', $pelicula->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf
                            <div class="box box-info padding-1">
                                <div class="box-body">
                                    
                                    <div class="form-group">
                                        {{ Form::label('imagen') }}
                                        <img src="{{ asset('storage') . '/' . $pelicula->imagen }}" alt="" width="100">
                                        {{ Form::file('imagen', ['class' => 'form-control' . ($errors->has('imagen') ? ' is-invalid' : $pelicula->imagen)]) }}
                                        {!! $errors->first('imagen', '<div class="invalid-feedback">:message</p>') !!}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('categoria_id') }}
                                        {{ Form::select('categoria_id', $categoria, $pelicula->categoria_id, ['class' => 'form-control' . ($errors->has('categoria_id') ? ' is-invalid' : ''), 'placeholder' => '--> Selecionar <--']) }}
                                        {!! $errors->first('categoria_id', '<div class="invalid-feedback">Seleccione una categoria!</p>') !!}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('nombre') }}
                                        {{ Form::text('nombre', $pelicula->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
                                        {!! $errors->first('nombre', '<div class="invalid-feedback">Se requiere un nombre!</p>') !!}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('link') }}
                                        {{ Form::text('link', $pelicula->link, ['class' => 'form-control' . ($errors->has('link') ? ' is-invalid' : ''), 'placeholder' => 'Link']) }}
                                        {!! $errors->first('link', '<div class="invalid-feedback">Se requiere un link!</p>') !!}
                                    </div>
                            
                                </div>
                                <div class="box-footer mt20">
                                    <br>
                                    <button type="submit" class="btn btn-primary">Actualizar</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
