@extends('adminlte::page')

@section('title', 'Calendario')


@section('content')

    @vite(['resources/css/styles-home.css'])

    <div class="button">


        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5 text-dark" id="exampleModalLabel">Reservar Cita</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body bg-dark">
                        <div class="col-lg-12">
                            <form action="{{ route('guardar.cita') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="nameUser" class="form-label">Nombre</label>
                                        <input type="text" class="form-control  @error('nameUser') is-invalid @enderror"
                                            id="nameUser" name="nameUser" value="{{ old('nameUser') }}">
                                        @error('nameUser')
                                            <span class="invalid-feedback"></span>
                                            <strong>{{ $message }}</strong>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="lastName" class="form-label">Apellido</label>
                                        <input type="text" class="form-control @error('lastName') is-invalid @enderror"
                                            id="lastName" name="lastName" value="{{ old('lastName') }}">
                                        @error('lastName')
                                            <span class="invalid-feedback"></span>
                                            <strong>{{ $message }}</strong>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="correo" class="form-label mt-3 ">Correo</label>
                                        <input type="email" class="form-control @error('correo') is-invalid @enderror"
                                            id="correo" name="correo" value="{{ old('correo') }}">
                                        @error('correo')
                                            <span class="invalid-feedback"></span>
                                            <strong>{{ $message }}</strong>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label for="fecha" class="form-label mt-3">Fecha</label>
                                        <input type="date" class="form-control @error('fecha') is-invalid @enderror"
                                            id="fecha" name="fecha" min="{{ date('Y-m-d') }}"
                                            value="{{ old('fecha') }}">
                                        @error('fecha')
                                            <span class="invalid-feedback"></span>
                                            <strong>{{ $message }}</strong>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="hora" class="form-label mt-3">Hora Disponobles</label>
                                        <select id="hora" class="form-select @error('hora') is-invalid @enderror"
                                            name="hora">
                                            <option selected disabled>Selecciona una hora</option>
                                        </select>
                                        @error('hora')
                                            <span class="invalid-feedback"></span>
                                            <strong>{{ $message }}</strong>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="service" class="form-label mt-3">Servicio</label>
                                        <select id="service" class="form-select" name="servicio" required>
                                            <option disabled selected>Elija un servico</option>
                                            @foreach ($servicios as $servicio)
                                                <option value="{{ $servicio->id }}"> {{ $servicio->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-3 ">
                                        <input type="submit" value="Reservar"
                                            class="btn btn-light btn-outline-success mt-3" name="reservar">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @foreach ($citas as $cita)
            <div class="modal fade" id="exampleModal{{ $cita->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5 text-dark" id="exampleModalLabel">Cita</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body bg-dark">
                            <div class="col-lg-12">
                                <form action="{{ route('citas.update', $cita->id) }}" method="post">
                                    @csrf
                                    @method('PUT')

                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="nombre" class="form-label">Nombre</label>
                                            <input type="text" class="form-control @error('nombre') is-invalid @enderror"
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
                                                class="form-control @error('correo') is-invalid @enderror" id="correo"
                                                name="correo" value="{{ $cita->cliente->email }}" readonly>
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
                                                @if ($cita->estado == 'atendido' || $cita->estado == 'cancelado') disabled @endif>
                                                <option value="por atender"
                                                    @if ($cita->estado == 'por atender') selected @endif>por
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

                                    <input type="submit" value="Guardar" class="btn btn-light btn-outline-success mt-3"
                                        name="guardar" @if ($cita->estado == 'atendido' || $cita->estado == 'cancelado') disabled @endif>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <button type="button" class="btn btn-light btn-outline-success mt-3 btn-sm" data-bs-toggle="modal"
        data-bs-target="#exampleModal">
        Reservar Cita
    </button>
    <div class='row justify-content-center'>
        <div class='col-md-12'>
            <div class=”card”>

                <div class='card-header'>

                </div>
                <div class='card-body mb-4'>
                    <div id='calendar'></div>
                </div>

            </div>
        </div>
    </div>



@stop


@section('css')

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


@stop

@section('js')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js"></script>
    <script src='fullcalendar/core/locales/es.global.js'></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                editable: false,
                locale: 'es',
                eventDisplay: 'block',
                events: [
                    @foreach ($citas as $cita)
                        @foreach ($clientes as $cliente)
                            @if ($cita->id_cliente == $cliente->id)
                                {
                                    title: '{{ $cliente->nombre }} {{ $cliente->apellido }} ',
                                    start: '{{ $cita->fecha_cita }} {{ $cita->hora_cita }}',
                                    cita_id: '{{ $cita->id }}',
                                    backgroundColor: @if ($cita->estado == 'por atender')
                                        'orange'
                                    @elseif ($cita->estado == 'atendido')
                                        'green'
                                    @elseif ($cita->estado == 'cancelado')
                                        'red'
                                    @endif ,
                                    estado: '{{ $cita->estado }}' // Agrega el estado de la cita
                                },
                            @endif
                        @endforeach
                    @endforeach
                ],
                eventTimeFormat: {
                    hour: '2-digit',
                    minute: '2-digit',
                },
                eventClick: function(info) {
                    var cita_id = info.event.extendedProps.cita_id;
                    // Aquí puedes usar AJAX para obtener los detalles de la cita del servidor
                    // y luego llenar los campos del modal con esos detalles
                    // Por ahora, simplemente mostramos el ID de la cita en la consola
                    console.log("ID de la cita:", cita_id);

                    // Si necesitas redirigir a una página con los detalles de la cita,
                    // puedes hacerlo así:
                    // window.location.href = "/ruta/a/la/pagina/" + cita_id;

                    // Abre el modal
                    $('#exampleModal' + cita_id).modal('show');
                }
            });
            calendar.render();
        });
    </script>









    <script>
        $(document).ready(function() {
            $('#fecha').change(function() {
                var selectedDate = $(this).val();
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
                            $('#hora').empty().append($('<option>', {
                                value: '',
                                text: 'Selecciona una hora'
                            }));
                        } else {
                            // Si showAlert es false, llenar el select de horas con las horas disponibles
                            var horasDisponibles = response.horas;
                            var selectHora = $('#hora');
                            selectHora.empty().append($('<option>', {
                                value: '',
                                text: 'Selecciona una hora'
                            }));
                            $.each(horasDisponibles, function(index, hora) {
                                selectHora.append($('<option>', {
                                    value: hora,
                                    text: hora
                                }));
                            });
                        }
                    }
                });
            });
        });
    </script>

    @if (Session::has('sections'))
        <script>
            Swal.fire({
                title: "La cita no se ha generado mirar el formulario para mas detalles!",
                icon: "error"
            });
        </script>
    @endif

    @if (Session::has('success'))
        <script>
            Swal.fire({
                title: "Su cita ha sido programada con éxito! Por favor, revise su correo electrónico para ver los detalles.!",
                icon: "success"
            });
        </script>
    @endif


    @if (Session::has('sin_cita'))
        <script>
            Swal.fire({
                title: "No tienes ninguna cita para cancelar!",
                icon: "warning"
            });
        </script>
    @endif
@stop
