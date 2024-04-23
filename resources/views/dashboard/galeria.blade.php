@extends('adminlte::page')

@section('title', 'portafolio')


@section('content')
    @vite(['resources/css/style-foto.css'])
    <div class="main p-3 ">
        <div class="text-center">

            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <h1 class="text-white">Subir imagen</h1>
                        <form action="/dashboard/galeria" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <input class="form-control" type="file" id="formFile" name="imagen" accept="image/*"
                                    required>
                            </div>
                            @error('imagen')
                                <div class="alert alert-dismissible fade show" role="alert">
                                    <strong>{{ $message }}</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @enderror

                            <input type="submit" value="Guardar" class="btn btn-light btn-outline-success" name="Guardar">
                        </form>
                    </div>

                    <div class="col-lg-6">
                        <h1 class="text-white text-center">Galeria de Imagenes</h1>
                        <hr>

                        <div class="row">
                            @foreach ($galeria as $foto)
                                <div class="col-md-4 mb-2 mr-5">
                                    <div class="card bg-dark" style="width: 14rem;">
                                        <img src="{{ asset($foto->nombre) }}" class="card-img-top img-card" alt="...">
                                        <div class="card-body d-flex justify-content-between align-items-center px-3">
                                            <div class="d-inline-flex">
                                                <button type="button" class="btn btn-light btn-outline-success"
                                                    data-bs-toggle="modal" data-bs-target="#exampleModal{{ $foto->id }}">
                                                    Actualizar
                                                </button>
                                                <form action="{{ route('galeria.destroy', $foto) }}" method="post"
                                                    class="ml-2 formulario-eliminar">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="btn btn-light btn-outline-danger">Eliminar</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <!-- Modal -->
                        <div class="modal fade" id="exampleModal{{ $foto->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel{{ $foto->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content bg-secondary">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5 text-black" id="exampleModalLabel{{ $foto->id }}">
                                            Actualizar Imagen
                                        </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="col-lg-12">

                                            <form action="{{ route('galeria.update', $foto->id) }}" method="post"
                                                enctype="multipart/form-data">


                                                @csrf
                                                @method('PUT')
                                                <div class="mb-3">
                                                    <input class="form-control" type="file" id="formFile" name="imagen"
                                                        required>
                                                </div>
                                                <input type="submit" value="actualizar"
                                                    class="btn btn-light btn-outline-success" name="actualizar">
                                            </form>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @endforeach
                            
                        </div>


                    </div>
                </div>
            </div>

        </div>
    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css"
        integrity="sha512-jU/7UFiaW5UBGODEopEqnbIAHOI8fO6T99m7Tsmqs2gkdujByJfkCbbfPSN4Wlqlb9TGnsuC0YgUgWkRBK7B9A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="../js/app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    @if (Session::has('success'))
        <script>
            Swal.fire({
                title: "Subido Correctamente!",
                icon: "success"
            });
        </script>
    @endif

    @if (Session::has('danger'))
        <script>
            Swal.fire({
                title: "Ya has ocupado el espacio disponible para la galería!",
                icon: "error"
            });
        </script>
    @endif

    @if (Session::has('imagen'))
        <script>
            Swal.fire({
                title: "Solo puedes subir imagenes!",
                icon: "error"
            });
        </script>
    @endif

    @if (Session('eliminar') == 'Eliminado')
        <script>
            Swal.fire({
                title: "Eliminado!",
                text: "Su Imagen ha sido eliminada.",
                icon: "success"
            });
        </script>
    @endif

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

    @if (Session('Actualizado'))
    <script>
        Swal.fire({
            title: "Actualizado!",
            text: "Su Imagen ha sido Actualizada.",
            icon: "success"
        });
    </script>
        
    @endif

@stop
