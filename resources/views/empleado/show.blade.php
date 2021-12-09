@extends('layouts.app')

@section('template_title')
    {{ $empleado->name ?? 'Show Empleado' }}
@endsection

@section('content')
    <section class="content container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Detalles Empleado</span>
                            <a class="btn btn-outline-danger" href="{{ route('empleados.index') }}"> Cerrar</a>
                        </div>

                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $empleado->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Rol:</strong>
                            {{ $empleado->rol }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
