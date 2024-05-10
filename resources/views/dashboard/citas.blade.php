@extends('adminlte::page')

@section('title', 'citas')


@section('content')
    <div class="main p-3 ">
        <div class="">
            <div class="row">
                <div class="col text-left">
                    <h2>Historial de citas</h2>
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
                        <th scope="col">Correo</th>
                        <th class="text-center" scope="col">Fecha</th>
                        <th scope="col">Hora</th>
                        <th scope="col">Hora fin Cita</th>
                        <th scope="col">Servicio</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($citas as $cita)
                        <tr>
                            <td>{{ $cita->cliente->nombre }} {{ $cita->cliente->apellido }}</td>
                            <td>{{ $cita->cliente->email }}</td>
                            <td class="text-center">{{ $cita->fecha_cita }}</td>
                            <td>
                                @if ($cita->hora_cita < 12)
                                    {{ $cita->hora_cita }} AM
                                @else
                                    {{ $cita->hora_cita }} PM
                                @endif
                            </td>
                            <td>
                                @if ($cita->hora_fin_cita < 12)
                                    {{ $cita->hora_fin_cita }} AM
                                @else
                                    {{ $cita->hora_fin_cita }} PM
                                @endif
                            </td>
                            <td>{{ $cita->servicio->nombre }}</td>
                            <td><span
                                    class="badge 
                                @if ($cita->estado == 'por atender') bg-warning text-dark
                                @elseif($cita->estado == 'atendido')
                                    bg-success
                                @elseif($cita->estado == 'cancelado')
                                    bg-danger @endif  p-2">
                                    {{ $cita->estado }}
                                </span></td>
                            <td>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <button type="button" class="btn btn-light btn-outline-success btn-sm"
                                            data-bs-toggle="modal" data-bs-target="#exampleModal{{ $cita->id }}"
                                            @if ($cita->estado == 'atendido' || $cita->estado == 'cancelado') disabled @endif>
                                            Actualizar
                                        </button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <div class="modal fade" id="exampleModal{{ $cita->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5 text-dark" id="exampleModalLabel">Citas</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body bg-dark">
                                        <div class="col-lg-12">
                                            <form action="{{ route('citas.update', $cita->id) }}" method="post">
                                                @csrf
                                                @method('PUT')

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label for="nombre" class="form-label">Nombre</label>
                                                        <input type="text"
                                                            class="form-control @error('nombre') is-invalid @enderror"
                                                            value="{{ $cita->cliente->nombre }} {{ $cita->cliente->apellido }}"
                                                            id="nombre" name="nombre" readonly>
                                                        @error('nombre')
                                                            <span class="invalid-feedback"></span>
                                                            <strong>{{ $message }}</strong>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="correo" class="form-label">Correo</label>
                                                        <input type="email"
                                                            class="form-control @error('correo') is-invalid @enderror"
                                                            id="correo" name="correo"
                                                            value="{{ $cita->cliente->email }}" readonly>
                                                        @error('correo')
                                                            <span class="invalid-feedback"></span>
                                                            <strong>{{ $message }}</strong>
                                                        @enderror
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label for="fecha" class="form-label mt-3">Fecha</label>
                                                        <input type="date"
                                                            class="form-control fecha-cita @error('fecha') is-invalid @enderror"
                                                            id="fecha" name="fecha" min="{{ date('Y-m-d') }}"
                                                            value="{{ $cita->fecha_cita }}" readonly>
                                                        @error('fecha')
                                                            <span class="invalid-feedback"></span>
                                                            <strong>{{ $message }}</strong>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="hora" class="form-label mt-3">Hora
                                                            Disponobles</label>
                                                        <select id="hora"
                                                            class="form-select hora-select @error('hora') is-invalid @enderror"
                                                            name="hora" disabled>

                                                            <option>{{ $cita->hora_cita }}</option>
                                                        </select>
                                                        @error('hora')
                                                            <span class="invalid-feedback"></span>
                                                            <strong>{{ $message }}</strong>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="service" class="form-label mt-3">Servicio</label>
                                                        <select id="service" class="form-select" name="servicio" disabled>
                                                            <option value="{{ $cita->id_servicio }}">
                                                                {{ $cita->servicio->nombre }}</option>
                                                            @foreach ($servicios as $servicio)
                                                                <option value="{{ $servicio->id }}">
                                                                    {{ $servicio->nombre }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="estado" class="form-label mt-3">Estado</label>
                                                        <select id="estado" class="form-select" name="estado"
                                                            @if ($cita->estado == 'atendido') disabled @endif>
                                                            <option value="por atender"
                                                                @if ($cita->estado == 'por atender') selected disabled @endif>
                                                                por
                                                                atender</option>
                                                            <option value="atendido"
                                                                @if ($cita->estado == 'atendido') selected @endif>atendido
                                                            </option>
                                                            <option value="cancelado"
                                                                @if ($cita->estado == 'cancelado') selected @endif>cancelado
                                                            </option>
                                                        </select>
                                                    </div>



                                                </div>

                                                <input type="submit" value="Guardar"
                                                    class="btn btn-light btn-outline-success mt-3" name="guardar">
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
                    'searchPlaceholder': 'Correo o Estado'
                },
                'lengthMenu': [
                    [5, 10, 50, -1],
                    [5, 10, 50, 'All']
                ],
                "ordering": false,
                'columnDefs': [{
                    'searchable': false,
                    'targets': [0, 2, 3, 4, 5]

                }]

            });
        });
    </script>

     <script>
        $('.fecha-cita').change(function() {
            var selectedDate = $(this).val();
            var modal = $(this).closest('.modal'); // Obtener el modal padre del input de fecha
            var horaSelect = modal.find('.hora-select'); // Encontrar el select de hora dentro del modal
            $.ajax({
                url: "{{ route('obtener.horas.disponibles') }}",
                method: 'POST',
                data: {
                    '_token': '{{ csrf_token() }}',
                    'dia': selectedDate
                },
                success: function(response) {
                    console.log(response);
                    if (response.showAlert) {
                        // Mostrar SweetAlert si showAlert es true
                        Swal.fire({
                            icon: 'warning',
                            title: '¡Atención!',
                            text: response.message
                        });
                        // Limpiar el select de horas
                        horaSelect.empty().append($('<option>', {
                            value: '',
                            text: 'Selecciona una hora'
                        }));
                    } else {
                        // Si showAlert es false, llenar el select de horas con las horas disponibles
                        var horasDisponibles = response.horas;
                        horaSelect.empty().append($('<option>', {
                            value: '',
                            text: 'Selecciona una hora'
                        }));
                        $.each(horasDisponibles, function(index, hora) {
                            horaSelect.append($('<option>', {
                                value: hora,
                                text: hora
                            }));
                        });
                    }
                }
            });
        });
    </script>


    @if (Session::has('update'))
        <script>
            Swal.fire({
                title: "La cita ha sido actualizada!",
                icon: "success"
            });
        </script>
    @endif



@stop
