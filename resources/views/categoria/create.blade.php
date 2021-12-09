@extends('layouts.app')

@section('template_title')
    Crear Categoria
@endsection

@section('content')
    <section class="content container">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <div class="float-right">
                            <span class="card-title">Crear Categoria</span>
                            <a class="btn btn-outline-danger" href="{{ route('categorias.index') }}"> Cerrar</a>
                        </div>
                    </div>
                    <div class="container">


                        <div class="card-body">
                            <form method="POST" action="{{ route('categorias.store') }}" role="form"
                                enctype="multipart/form-data">
                                @csrf

                                @include('categoria.form')

                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection
