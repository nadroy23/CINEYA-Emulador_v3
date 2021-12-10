@extends('layouts.app')

@section('template_title')
    Crear Landing
@endsection

@section('content')
    <section class="content container">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Crear Landing</span>
                        @if (Auth::check())
                        <a class="btn btn-outline-danger" href="{{ route('landings.index') }}"> Cerrar</a>
                        @endif
                    <div class="card-body">
                        <form method="POST" action="{{ route('landings.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('landing.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
