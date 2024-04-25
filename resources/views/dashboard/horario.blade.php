@extends('adminlte::page')

@section('title', 'horario')


@section('content')



    <form action="/dashboard/horario" method="POST">
        @csrf
        <div class="main p-3 ">
            <div class="text-center">
                <div class="container">
                    <div class="row">
                        <div class="col text-left">
                            <h2>Horario</h2>
                        </div>
                        <div class="col text-right">
                            <button type="submit" class="btn btn-light btn-outline-success">Guardar Horario</button>
                        </div>
                    </div>
                    <table class="table table-dark table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Dia</th>
                                <th scope="col">Activo</th>
                                <th scope="col">Turno Mañana</th>
                                <th scope="col">Turno Tarde</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dias as $key => $dia)
                                <tr>
                                    <th>{{ $dia }}</th>
                                    <td>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox"
                                                name="dias[{{ $loop->index }}][activo]"
                                                {{ $estadoDias[$dia]->activo ? 'checked' : '' }}>
                                            <input type="hidden" name="dias[{{ $loop->index }}][dia]"
                                                value="{{ $dia }}">
                                        </div>
                                    </td>

                                    <td>
                                        <div class="row">
                                            <div class="col-md-6 col-lg-4">
                                                <select class="form-select"
                                                    name="dias[{{ $key }}][apertura_mañana]" id="apertura_mañana_{{ $dia }}" onchange="actualizarCierreManana('{{ $dia }}')">
                                                    @foreach ($horarios as $horario)
                                                        @if ($horario->dia == $dia)
                                                            <option value='{{ $horario->apertura_mañana }}'
                                                                {{ $horario->apertura_mañana == $estadoDias[$dia]->apertura_mañana ? 'selected' : '' }}>
                                                                {{ $horario->apertura_mañana }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                    <hr>
                                                    <option value='9:00 AM'>9:00 AM
                                                    </option>
                                                    <option value='9:30 AM'>9:30 AM
                                                    </option>
                                                    <option value='10:00 AM'>10:00 AM
                                                    </option>
                                                    <option value='10:30 AM'>10:30 AM
                                                    </option>
                                                    <option value='11:00 AM'>11:00 AM
                                                    </option>
                                                    <option value='11:30 AM'>11:30 AM
                                                    </option>
                                                    <option value='12:00 PM'>12:00 PM
                                                    </option>
                                                    <option value='12:30 PM'>12:30 PM
                                                    </option>
                                                    <option value='13:00 PM'>13:00 PM
                                                    </option>
                                                    <option value='13:30 PM'>13:30 PM
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="col-md-6 col-lg-4">
                                                <select class="form-select" name="dias[{{ $key }}][cierre_mañana]" id="cierre_mañana_{{ $dia }}" >
                                                    @foreach ($horarios as $horario)
                                                        @if ($horario->dia == $dia)
                                                            <option value='{{ $horario->cierre_mañana }}'
                                                                {{ $horario->cierre_mañana == $estadoDias[$dia]->cierre_mañana ? 'selected' : '' }}>
                                                                {{ $horario->cierre_mañana }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                    <hr>
                                                    <option value='9:00 AM'>9:00 AM
                                                    </option>
                                                    <option value='9:30 AM'>9:30 AM
                                                    </option>
                                                    <option value='10:00 AM'>10:00 AM
                                                    </option>
                                                    <option value='10:30 AM'>10:30 AM
                                                    </option>
                                                    <option value='11:00 AM'>11:00 AM
                                                    </option>
                                                    <option value='11:30 AM'>11:30 AM
                                                    </option>
                                                    <option value='12:00 PM'>12:00 PM
                                                    </option>
                                                    <option value='12:30 PM'>12:30 PM
                                                    </option>
                                                    <option value='13:00 PM'>13:00 PM
                                                    </option>
                                                    <option value='13:30 PM'>13:30 PM
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="row">
                                            <div class="col-md-6 col-lg-4">
                                                <select class="form-select"
                                                    name="dias[{{ $key }}][apertura_tarde]" id="apertura_tarde{{ $dia }}" onchange="actualizarCierreTarde('{{ $dia }}')">
                                                    @foreach ($horarios as $horario)
                                                        @if ($horario->dia == $dia)
                                                            <option value='{{ $horario->apertura_tarde }}'
                                                                {{ $horario->apertura_tarde == $estadoDias[$dia]->apertura_tarde ? 'selected' : '' }}>
                                                                {{ $horario->apertura_tarde }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                    <hr>
                                                    <option value='14:00 PM'>14:00 PM
                                                    </option>
                                                    <option value='14:30 PM'>14:30 PM
                                                    </option>
                                                    <option value='15:00 PM'>15:00 PM
                                                    </option>
                                                    <option value='15:30 PM'>15:30 PM
                                                    </option>
                                                    <option value='16:00 PM'>16:00 PM
                                                    </option>
                                                    <option value='16:30 PM'>16:30 PM
                                                    </option>
                                                    <option value='17:00 PM'>17:00 PM
                                                    </option>
                                                    <option value='17:30 PM'>17:30 PM
                                                    </option>
                                                    <option value='18:00 PM'>18:00 PM
                                                    </option>
                                                    <option value='18:30 PM'>18:30 PM
                                                    </option>
                                                    <option value='19:00 PM'>19:00 PM
                                                    </option>
                                                    <option value='19:30 PM'>19:30 PM
                                                    </option>
                                                    <option value='20:00 PM'>20:00 PM
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="col-md-6 col-lg-4">
                                                <select class="form-select" name="dias[{{ $key }}][cierre_tarde]" id="cierre_tarde{{ $dia }}">
                                                    @foreach ($horarios as $horario)
                                                        @if ($horario->dia == $dia)
                                                            <option value='{{ $horario->cierre_tarde }}'
                                                                {{ $horario->cierre_tarde == $estadoDias[$dia]->cierre_tarde ? 'selected' : '' }}>
                                                                {{ $horario->cierre_tarde }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                    <hr>
                                                    <option value='14:00 PM'>14:00 PM
                                                    </option>
                                                    <option value='14:30 PM'>14:30 PM
                                                    </option>
                                                    <option value='15:00 PM'>15:00 PM
                                                    </option>
                                                    <option value='15:30 PM'>15:30 PM
                                                    </option>
                                                    <option value='16:00 PM'>16:00 PM
                                                    </option>
                                                    <option value='16:30 PM'>16:30 PM
                                                    </option>
                                                    <option value='17:00 PM'>17:00 PM
                                                    </option>
                                                    <option value='17:30 PM'>17:30 PM
                                                    </option>
                                                    <option value='18:00 PM'>18:00 PM
                                                    </option>
                                                    <option value='18:30 PM'>18:30 PM
                                                    </option>
                                                    <option value='19:00 PM'>19:00 PM
                                                    </option>
                                                    <option value='19:30 PM'>19:30 PM
                                                    </option>
                                                    <option value='20:00 PM'>20:00 PM
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </form>



@stop


@section('css')

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

<script>
    function actualizarCierreManana(dia) {
        var aperturaManana = convertirHoraEntero(document.getElementById('apertura_mañana_' + dia).value);
        var cierreManana = document.getElementById('cierre_mañana_' + dia);

        // Habilitar todas las opciones en el select de cierre de mañana para este día
        for (var i = 0; i < cierreManana.options.length; i++) {
            cierreManana.options[i].disabled = false;
        }

        // Deshabilitar las opciones que sean iguales o anteriores a la hora de apertura seleccionada
        for (var i = 0; i < cierreManana.options.length; i++) {
            var horaCierre = convertirHoraEntero(cierreManana.options[i].value);
            if (horaCierre <= aperturaManana) {
                cierreManana.options[i].disabled = true;
            }
        }
    }

    function convertirHoraEntero(hora) {
        var partes = hora.split(':');
        var horaEntero = parseInt(partes[0]) * 60 + parseInt(partes[1]);
        return horaEntero;
    }
</script>

<script>
    function actualizarCierreTarde(dia) {
        var aperturaTarde = convertirHoraEntero(document.getElementById('apertura_tarde' + dia).value);
        var cierreTarde = document.getElementById('cierre_tarde' + dia);

        // Habilitar todas las opciones en el select de cierre de mañana para este día
        for (var i = 0; i < cierreTarde.options.length; i++) {
            cierreTarde.options[i].disabled = false;
        }

        // Deshabilitar las opciones que sean iguales o anteriores a la hora de apertura seleccionada
        for (var i = 0; i < cierreTarde.options.length; i++) {
            var horaCierre = convertirHoraEntero(cierreTarde.options[i].value);
            if (horaCierre <= aperturaTarde) {
                cierreTarde.options[i].disabled = true;
            }
        }
    }

    function convertirHoraEntero(hora) {
        var partes = hora.split(':');
        var horaEntero = parseInt(partes[0]) * 60 + parseInt(partes[1]);
        return horaEntero;
    }
</script>




@stop
