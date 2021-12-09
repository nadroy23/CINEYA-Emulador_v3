@extends('layouts.app')

@section('template_title')
    Pelicula
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Pelicula') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('peliculas.create') }}" class="btn btn-primary btn-sm float-right"
                                    data-placement="left">
                                    {{ __('Nueva pelicula') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>Imagen</th>
                                        <th>Categoria Id</th>
                                        <th>Nombre</th>
                                        <th>Link</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($peliculas as $pelicula)
                                        <tr>
                                            <td><img src="{{ asset('storage') . '/' . $pelicula->imagen }}" alt="" width="100" height="100"></td>
                                            <td>{{ $pelicula->categoria->nombre }}</td>
                                            <td>{{ $pelicula->nombre }}</td>
                                            <td><a href="{{ $pelicula->link }}">{{ $pelicula->link }}</a></td>      
                                            <td>
                                                <form action="{{ route('peliculas.destroy', $pelicula->id) }}"
                                                    method="POST">
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('peliculas.show', $pelicula->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i> Detalles</a>
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('peliculas.edit', $pelicula->id) }}"><i
                                                            class="fa fa-fw fa-edit"></i> Editar</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                                            class="fa fa-fw fa-trash"></i> Eliminar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $peliculas->links() !!}
            </div>
        </div>
    </div>
@endsection
