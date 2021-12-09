@extends('layouts.app')

@section('template_title')
    Crear Pelicula
@endsection

@section('content')
    <section class="content container">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Crear Pelicula</span>
                        <a class="btn btn-outline-danger" href="{{ route('peliculas.index') }}"> Cerrar</a>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('peliculas.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('pelicula.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
