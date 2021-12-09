@extends('layouts.app')

@section('template_title')
    {{ $landing->name ?? 'Show Landing' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Landing</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('landings.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $landing->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Correo:</strong>
                            {{ $landing->correo }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
