@extends('layouts.vistaprincipal')

@section('contenido')
    <section id="example-1" class="text-white bg-primary ps-3 bg-1 sect">

        <script>
            var images = [
                "{{ asset('imagenes/barber1.jpg') }}",
                "{{ asset('imagenes/barber2.jpg') }}",
                "{{ asset('imagenes/barber3.jpg') }}"
            ]; // Rutas de las imágenes
        </script>

        <div class="img-welcome"><img src="{{ asset('imagenes/logo.svg') }}" alt="logo"></div>
        <div class="button">
            <button type="button" class="btn btn-light btn-outline-success" data-bs-toggle="modal"
                data-bs-target="#exampleModal">
                Reserva Tu Cita
            </button>

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
                                <form action="#" method="post">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="nameUser" class="form-label">Nombre</label>
                                            <input type="text" class="form-control" id="nameUser">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="lastName" class="form-label">Apellido</label>
                                            <input type="text" class="form-control" id="lastName">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="email" class="form-label mt-3">Correo</label>
                                            <input type="email" class="form-control" id="email">
                                        </div>

                                        <div class="col-md-6">
                                            <label for="date" class="form-label mt-3">Fecha</label>
                                            <input type="date" class="form-control" id="fecha" name="fecha" min="{{ date('Y-m-d') }}" >
                                        </div>
                                        <div class="col-md-6">
                                            <label for="available-time" class="form-label mt-3">Hora Disponobles</label>
                                            <select id="hora" class="form-select" name="hora">
                                                <option selected disabled>Selecciona una hora</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="service" class="form-label mt-3">Servicio</label>
                                            <select id="service" class="form-select" required>
                                                <option disabled selected>Elija un servico</option>
                                                @foreach ($servicios as $servicio)
                                                <option> {{ $servicio->nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="comment" class="form-label mt-3">Nota (Opcional)</label>
                                            <textarea class="form-control" id="comment"></textarea>
                                        </div>
                                    </div>

                                    <input type="submit" value="Reservar" class="btn btn-light btn-outline-success mt-3"
                                        name="reservar">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <div class="container-btn">
        <div class="btn-float">
            <button type="button" class="btn btn-light btn-outline-success" data-bs-toggle="modal"
                data-bs-target="#exampleModal">
                Reserva Tu Cita
            </button>

        </div>
    </div>
@endsection


@section('contenido2')
    <section id="example-2" class="ps-3 sect-2 bg-secondary ">
        <div class="sv-title">
            <h2 class="fw-light text-center text-lg  mb-0">Nuestros Servicios</h2>
        </div>


        <div class="container-lg">
            <div class="row gy-4 row-cols-1 row-cols-sm-2 row-cols-md-3 justify-content-center " style="gap: 20px;">
                @foreach ($servicios as $servicio)
                    <div class="card text-center mb-3" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $servicio->nombre }}</h5>
                            <p class="card-text"><strong>{{ $servicio->precio }}€</strong></p>
                            <button type="button" class="btn btn-light btn-outline-success" data-bs-toggle="modal"
                                data-bs-target="#exampleModal{{ $servicio->id }}">Ver mas
                            </button>
                        </div>
                    </div>


                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal{{ $servicio->id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-md">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="card mx-auto" style="max-width: 18rem;">
                                        <!-- Agregamos la clase 'mx-auto' para centrar la tarjeta y 'max-width' para limitar su ancho -->
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $servicio->nombre }}</h5>
                                            <p class="card-text">{{ $servicio->descripcion }}</p>
                                            <p class="card-text"><strong>{{ $servicio->precio }}€</strong></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>



    </section>
@endsection

@section('contenido3')
    <section id="example-3" class="text-white bg-secondary ps-3  gallery">

        <h2 class="fw-light text-center text-lg  mb-0">Nuestros Trabajos</h2>

        <hr class="mt-2 mb-2">

        <div class="container-lg">
            <div class="row gy-4 row-cols-1 row-cols-sm-2 row-cols-md-3">
                @foreach ($galeria as $foto)
                    <div class="col">
                        <button type="button" class="btn-lg" data-bs-toggle="modal"
                            data-bs-target="#exampleModal{{ $foto->id }}">
                            <img src="{{ asset($foto->nombre) }}" class="gallery-item img-gallery" alt="Gallery1">
                        </button>

                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal{{ $foto->id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-md">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <!-- <h5 class="modal-title" id="exampleModalLabel">Modal title</h5> -->
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <img src="{{ asset($foto->nombre) }}" class="modal-img" alt="Modal Image">
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </section>
@endsection

@section('contenido4')
    <section id="example-5" class="text-white bg-secondary ps-3 sect-5 sect">
        <div class="container-fluid">
            <h2 class="fw-light text-center text-lg">Contacto</h2>
            <div class="row contact">
                <div class="col-md-3 mt-3">
                    <div class="container-fluid">
                        <h3>Ven a conocernos</h3>
                        <p>Atrévete a venir a conocernos y disfrutar de una experiencia totalmente diferente, ¡te estamos
                            esperando!
                        </p>
                        <p><strong>BARBERSHOP</strong></br>
                            Plaza España</br></br>
                            <strong>Telefono</strong></br>
                            +34 91 361 23 45
                        </p>
                        <p><strong>Redes Sociales</strong></p>
                        <div class="wrapper">
                            <ul>
                                <li class="instagram"><a href=""><i class="fa fa-instagram fa fa-2x"
                                            aria-hidden="true"></i></a></li>
                                <li class="whatsapp"><a href=""><i class="fa fa-whatsapp fa fa-2x"
                                            aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>


                </div>

                <div class="col-md-3 mt-3">
                    <div class="container-fluid">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d194390.01103703328!2d-4.0170353054687515!3d40.4233828!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd42287ab3f77019%3A0x56c00bc05abaf59d!2sPlaza%20de%20Espa%C3%B1a!5e0!3m2!1ses!2ses!4v1712760962369!5m2!1ses!2ses"
                            width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>


                </div>

                <div class="col-md-6 aling-items-center mt-4 container-hours ">

                    <div class="container">
                        <div class="row border-hours">
                            <h2 class="fw-light text-center text-lg  ">Horario</h2>
                            <div class="col-md-4 col-12 mt-3">
                                <ul class="list-inline">
                                    <li><strong>Dia</strong></li>
                                    <li>&nbsp</li>
                                    @foreach ($horarios as $horario)
                                        <li>{{ $horario->dia }}</li>
                                    @endforeach

                                </ul>
                            </div>
                            <div class="col-md-4 col-12 mt-3">
                                <div><strong>Jornada Mañana</strong></div>
                                <ul class="list-inline">
                                    <li>&nbsp</li>
                                    @foreach ($horarios as $horario)
                                        @if ($horario->activo == 0)
                                            <li><strong>Cerrado</strong></li>
                                        @else
                                            <li>{{ $horario->apertura_mañana }} - {{ $horario->cierre_mañana }}</li>
                                        @endif
                                        
                                    @endforeach
                                </ul>
                            </div>
                            <div class="col-md-4 col-12 mt-3">
                                <div><strong>Jornada Tarde</strong></div>
                                <ul class="list-inline">
                                    <li>&nbsp</li>
                                    @foreach ($horarios as $horario)
                                        @if ($horario->activo == 0)
                                            <li><strong>Cerrado</strong></li>
                                        @else
                                            <li>{{ $horario->apertura_tarde }} - {{ $horario->cierre_tarde }}</li>
                                        @endif
                                        
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
