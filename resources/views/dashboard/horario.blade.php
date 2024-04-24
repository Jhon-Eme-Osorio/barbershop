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
                            <button type="submit" class="btn btn-primary">Guardar Horario</button>
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
                            @foreach ($dias as $dia)
                                <tr>
                                    <th>{{ $dia }}</th>
                                    <td>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" name="checkbox">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="row">
                                            <div class="col-md-6 col-lg-4">
                                                <select class="form-select" name="apertura_mañana">
                                                    <option value='9:00'>9:00 AM
                                                    </option>
                                                    <option value='9:30'>9:30 AM
                                                    </option>
                                                    <option value='10:00'>10:00 AM
                                                    </option>
                                                    <option value='10:30'>10:30 AM
                                                    </option>
                                                    <option value='11:00'>11:00 AM
                                                    </option>
                                                    <option value='11:30'>11:30 AM
                                                    </option>
                                                    <option value='12:00'>12:00 PM
                                                    </option>
                                                    <option value='12:30'>12:30 PM
                                                    </option>
                                                    <option value='13:00'>13:00 PM
                                                    </option>
                                                    <option value='13:30'>13:30 PM
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="col-md-6 col-lg-4">
                                                <select class="form-select" name="cierre_mañana">
                                                    <option value='9:00'>9:00 AM
                                                    </option>
                                                    <option value='9:30'>9:30 AM
                                                    </option>
                                                    <option value='10:00'>10:00 AM
                                                    </option>
                                                    <option value='10:30'>10:30 AM
                                                    </option>
                                                    <option value='11:00'>11:00 AM
                                                    </option>
                                                    <option value='11:30'>11:30 AM
                                                    </option>
                                                    <option value='12:00'>12:00 PM
                                                    </option>
                                                    <option value='12:30'>12:30 PM
                                                    </option>
                                                    <option value='13:00'>13:00 PM
                                                    </option>
                                                    <option value='13:30'>13:30 PM
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="row">
                                            <div class="col-md-6 col-lg-4">
                                                <select class="form-select" name="apertura_tarde">
                                                    <option value='14:00'>14:00 PM
                                                    </option>
                                                    <option value='14:30'>14:30 PM
                                                    </option>
                                                    <option value='15:00'>15:00 PM
                                                    </option>
                                                    <option value='15:30'>15:30 PM
                                                    </option>
                                                    <option value='16:00'>16:00 PM
                                                    </option>
                                                    <option value='16:30'>16:30 PM
                                                    </option>
                                                    <option value='17:00'>17:00 PM
                                                    </option>
                                                    <option value='17:30'>17:30 PM
                                                    </option>
                                                    <option value='18:00'>18:00 PM
                                                    </option>
                                                    <option value='18:30'>18:30 PM
                                                    </option>
                                                    <option value='19:00'>19:00 PM
                                                    </option>
                                                    <option value='19:30'>19:30 PM
                                                    </option>
                                                    <option value='20:00'>20:00 PM
                                                    </option>                                                    
                                                </select>
                                            </div>
                                            <div class="col-md-6 col-lg-4">
                                                <select class="form-select" name="cierre_tarde">
                                                    <option value='14:00'>14:00 PM
                                                    </option>
                                                    <option value='14:30'>14:30 PM
                                                    </option>
                                                    <option value='15:00'>15:00 PM
                                                    </option>
                                                    <option value='15:30'>15:30 PM
                                                    </option>
                                                    <option value='16:00'>16:00 PM
                                                    </option>
                                                    <option value='16:30'>16:30 PM
                                                    </option>
                                                    <option value='17:00'>17:00 PM
                                                    </option>
                                                    <option value='17:30'>17:30 PM
                                                    </option>
                                                    <option value='18:00'>18:00 PM
                                                    </option>
                                                    <option value='18:30'>18:30 PM
                                                    </option>
                                                    <option value='19:00'>19:00 PM
                                                    </option>
                                                    <option value='19:30'>19:30 PM
                                                    </option>
                                                    <option value='20:00'>20:00 PM
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
@stop
