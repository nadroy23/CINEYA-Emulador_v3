@extends('layouts.app')

@section('template_title')
    Pelicula
@endsection

@section('content')
    <?php
    
    // Create connection
    $conexion = mysqli_connect('localhost', 'admin', '01011001', 'Cineya_v3');
    
    // Check connection
    if (!$conexion) {
        die('Connection failed: ' . mysqli_connect_error());
    }
    
    $sql = 'SELECT peliculas.id, peliculas.imagen, peliculas.nombre, peliculas.link FROM peliculas';
    $resultado = $conexion->query($sql);
    
    ?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="thead">
                                <tr>
                                    <th></th>
                                    <th>Nombre</th>
                                    <th>Link</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    while($row=mysqli_fetch_array($resultado)){
                                        ?>

                                <td><img src="{{ asset('storage') . '/' . $row['imagen'] }}" alt="" width="100"></td>
                                <td>{{ $row['nombre'] }}</td>
                                <td>
                                    <a class="btn btn-primary" href="{{ $row['link'] }}" role="button">Link</a>
                                </td>
                                </tr>
                                <?php
                                    }
                                    ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <section class="content container-fluid">
                <div class="row">

                        <div class="card card-default">
                            <div class="card-header">
                                <span class="card-title">Create Landing</span>
                            </div>
                            <div class="card-body">
                                <div class="card-body">
                                    <form method="POST" action="landing.php"  role="form" enctype="multipart/form-data">
                                        @csrf
                                
                                    <div class="box box-info padding-1">
                                        <div class="box-body">

                                            <div class="form-group">
                                                {{ Form::label('nombre') }}
                                                <input type="text " class="form-control" id="nombre" placeholder="Nombre"">
                                            </div>
                                            <div class="form-group">
                                                {{ Form::label('correo') }}
                                                <input type="email" class="form-control" {{$ncorreo = ("correo")}} id="correo" placeholder="name@example.com">
                                                {!! $errors->first('correo', '<div class="invalid-feedback">:message</p>') !!}
                                            </div>

                                        </div>
                                        <div class="box-footer mt20">
                                            <button type="submit" name="enviar" class="btn btn-primary">Submit</button>
                                        </div>
                                        
                                    </div>
                                    <div>
                                        <?php
                                        if (isset($Post['enviar'])) {
                                            echo "hola";
                                            $nombre = mysqli_real_escape_string($conexion, 'nombre');
                                            $correo = mysqli_real_escape_string($conexion, 'correo');
                                            $sql1 = 'INSERT INTO landings(nombre, correo) VALUES ($nombre, $correo)';
                                            $conexion->query($sql1);
                                        }
                                        ?>
                                    </div>
                            </div>
                        </div>
                </div>
            </section>
        </div>


        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
        </script>

        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <!--
                <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
                                integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
                                crossorigin="anonymous">
                </script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
                                integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
                                crossorigin="anonymous">
                </script>
                -->
    @endsection
