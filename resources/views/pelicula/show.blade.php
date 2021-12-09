@extends('layouts.app')

@section('template_title')
    {{ $pelicula->name ?? 'Detalles Pelicula' }}
@endsection

@section('content')
    <section class="content container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Detalles Pelicula</span>
                            <a class="btn btn-outline-danger" href="{{ route('peliculas.index') }}"> Cerrar</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Imagen:</strong>
                            {{ $pelicula->imagen }}
                        </div>
                        <div class="form-group">
                            <strong>Categoria Id:</strong>
                            {{ $pelicula->categoria_id }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $pelicula->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Link:</strong>
                            <td><a href="{{ $pelicula->link }}">{{ $pelicula->link }}</a> </td>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
