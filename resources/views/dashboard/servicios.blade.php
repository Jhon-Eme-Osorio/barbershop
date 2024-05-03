@extends('adminlte::page')

@section('title', 'servicios')


@section('content')
    @vite(['resources/css/form-service.css'])
    <div class="main p-3 ">
        <div class="">
            <div class="row">
                <div class="col text-left">
                    <h2>Servicios</h2>
                </div>
                <div class="col text-right">
                    <button type="button" class="btn btn-light btn-outline-success" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                        Crear Servicio
                    </button>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5 text-dark" id="exampleModalLabel">Servicio</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body bg-dark">
                            <div class="col-lg-12">
                                <form action="/dashboard/servicios" method="post">
                                    @csrf

                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="nombre" class="form-label">Nombre</label>
                                            <input type="text" class="form-control @error('nombre') is-invalid @enderror"
                                                value="{{ old('nombre') }}" id="nombre" name="nombre" required>
                                            @error('nombre')
                                                <span class="invalid-feedback"></span>
                                                <strong>{{ $message }}</strong>
                                            @enderror
                                        </div>

                                        <div class="col-md-6">
                                            <label for="duracion" class="form-label">Duracion</label>
                                            <div class="input-with-unit">
                                                <input type="number"
                                                    class="form-control @error('duracion') is-invalid @enderror"
                                                    value="{{ old('duracion') }}" id="duracion" name="duracion" required>
                                                <span class="unit">min</span>
                                            </div>
                                            @error('duracion')
                                                <span class="invalid-feedback"></span>
                                                <strong>{{ $message }}</strong>
                                            @enderror
                                        </div>

                                        <div class="col-md-6">
                                            <label for="precio" class="form-label  mt-3">Precio</label>
                                            <input type="number" step="0.01"
                                                class="form-control @error('precio') is-invalid @enderror"
                                                value="{{ old('precio') }}" id="precio" name="precio">
                                            @error('precio')
                                                <span class="invalid-feedback"></span>
                                                <strong>{{ $message }}</strong>
                                            @enderror
                                        </div>

                                        <div class="col-md-6">
                                            <label for="descripcion" class="form-label mt-3">Descripcion</label>
                                            <textarea class="form-control @error('descripcion') is-invalid @enderror" id="descripcion" name="descripcion">{{ old('descripcion') }}</textarea>
                                            @error('descripcion')
                                                <span class="invalid-feedback"></span>
                                                <strong>{{ $message }}</strong>
                                            @enderror
                                        </div>



                                    </div>

                                    <input type="submit" value="Guardar" class="btn btn-light btn-outline-success"
                                        name="guardar">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <style>
                @media (min-width: 576px) {
                    .table-responsive {
                        overflow-x: hidden;
                    }
                }
            </style>

            <table class="table table-dark table-striped text-center" id="servicios">
                <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Duracion Min</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($servicios as $servicio)
                        <tr>
                            <td>{{ $servicio->nombre }}</td>
                            <td>{{ $servicio->descripcion }}</td>
                            <td>{{ $servicio->duracion }}</td>
                            <td>{{ $servicio->precio }}</td>
                            <td>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <button type="button" class="btn btn-light btn-outline-success btn-sm"
                                            data-bs-toggle="modal" data-bs-target="#exampleModal{{ $servicio->id }}">
                                            Actualizar
                                        </button>
                                    </div>
                                    <div class="col-lg-6">



                                        <form action="{{ route('servicios.destroy', $servicio->id) }}" method="post"
                                            class="ml-2 formulario-eliminar ">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="btn btn-light btn-outline-danger btn-sm mr-4">Eliminar</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <div class="modal fade" id="exampleModal{{ $servicio->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5 text-dark" id="exampleModalLabel">Servicio</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body bg-dark">
                                        <div class="col-lg-12">
                                            <form action="{{ route('servicios.update', $servicio->id) }}" method="post">
                                                @csrf
                                                @method('PUT')

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label for="nombre" class="form-label">Nombre</label>
                                                        <input type="text"
                                                            class="form-control @error('nombre') is-invalid @enderror"
                                                            value="{{ $servicio->nombre }}" id="nombre"
                                                            name="nombre" required>
                                                        @error('nombre')
                                                            <span class="invalid-feedback"></span>
                                                            <strong>{{ $message }}</strong>
                                                        @enderror
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label for="duracion" class="form-label">Duracion</label>
                                                        <div class="input-with-unit">
                                                            <input type="number"
                                                                class="form-control @error('duracion') is-invalid @enderror"
                                                                value="{{ $servicio->duracion }}" id="duracion"
                                                                name="duracion" required>
                                                            <span class="unit">min</span>
                                                        </div>
                                                        @error('duracion')
                                                            <span class="invalid-feedback"></span>
                                                            <strong>{{ $message }}</strong>
                                                        @enderror
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label for="precio" class="form-label  mt-3">Precio</label>
                                                        <input type="number" step="0.01"
                                                            class="form-control @error('precio') is-invalid @enderror"
                                                            value="{{ $servicio->precio }}" id="precio"
                                                            name="precio">
                                                        @error('precio')
                                                            <span class="invalid-feedback"></span>
                                                            <strong>{{ $message }}</strong>
                                                        @enderror
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label for="descripcion"
                                                            class="form-label mt-3">Descripcion</label>
                                                        <textarea class="form-control @error('descripcion') is-invalid @enderror" id="descripcion" name="descripcion">{{ $servicio->descripcion }}</textarea>
                                                        @error('descripcion')
                                                            <span class="invalid-feedback"></span>
                                                            <strong>{{ $message }}</strong>
                                                        @enderror
                                                    </div>



                                                </div>

                                                <input type="submit" value="Guardar"
                                                    class="btn btn-light btn-outline-success" name="guardar">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>


        </div>


    </div>


@stop


@section('css')

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.5/css/dataTables.bootstrap5.css">


@stop

@section('js')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.bootstrap5.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {
            $('#servicios').DataTable({
                'language': {
                    'url': 'https://cdn.datatables.net/plug-ins/2.0.5/i18n/es-ES.json',
                    'searchPlaceholder': 'Nombre o Precio'
                },
                'lengthMenu': [
                    [5, 10, 50, -1],
                    [5, 10, 50, 'All']
                ],
                "ordering": false,
                'columnDefs':[{
                    'searchable': false, 'targets': [1, 2]
                    
                }]
                
            });
        });
    </script>

    <script>
        $('.formulario-eliminar').submit(function(e) {
            e.preventDefault();
            Swal.fire({
                title: "Esta seguro?",
                text: "No podra revertir esto!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Si, Borralo!",
                cancelButtonText: "Cancelar "
            }).then((result) => {
                if (result.isConfirmed) {


                    this.submit();
                }
            });

        })
    </script>

    @if (Session('eliminar'))
        <script>
            Swal.fire({
                title: "Eliminado!",
                text: "El servicio se a eliminado.",
                icon: "success"
            });
        </script>
    @endif

    @if (Session::has('servicio'))
        <script>
            Swal.fire({
                title: "El servicio no se a creado mirar el formulario para mas detalles!",
                icon: "error"
            });
        </script>
    @endif

    @if (Session::has('success'))
        <script>
            Swal.fire({
                title: "El servicio se a creado!",
                icon: "success"
            });
        </script>
    @endif

    @if (Session::has('update'))
        <script>
            Swal.fire({
                title: "El servicio se a actualizado!",
                icon: "success"
            });
        </script>
    @endif

@stop
