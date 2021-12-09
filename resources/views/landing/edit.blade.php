@extends('layouts.app')

@section('template_title')
    Actualizar Landing
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Actualizar Landing</span>
                        <a class="btn btn-outline-danger" href="{{ route('landings.index') }}"> Cerrar</a>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('landings.update', $landing->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('landing.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
