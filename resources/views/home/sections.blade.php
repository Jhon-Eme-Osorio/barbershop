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
                                        <label for="email" class="form-label">Correo</label>
                                        <input type="email" class="form-control" id="email">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="date" class="form-label mt-3">Fecha</label>
                                        <input type="date" class="form-control" id="date">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="available-time" class="form-label mt-3">Hora Disponobles</label>
                                        <select id="available-time" class="form-select">
                                            <option selected>Choose...</option>
                                            <option>...</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="service" class="form-label mt-3">Servicio</label>
                                        <select id="service" class="form-select">
                                            <option selected>Choose...</option>
                                            <option>...</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="comment" class="form-label mt-3">Nota (Opcional)</label>
                                        <textarea class="form-control" id="comment"></textarea>
                                    </div>
                                </div>

                                <input type="submit" value="Reservar" class="btn btn-light btn-outline-success"
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

<section id="example-2" class="ps-3 sect-2 bg-secondary sect">
    <div class="sv-title">
      <h2 class="fw-light text-center text-lg  mb-0">Nuestros Servicios</h2>
    </div>
    <div id="carouselExampleIndicators" class="carousel slide"  data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <div class="card-group">
            <div class="col-sm-4">           
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">CORTE DE PELO</h5>
                  <p class="card-text">Servicio exclusivo según tus necesidades y tu estilo personal.</p>
                  <p class="pricing">17€</p>
                 
                </div>
              </div>
            </div>

            <div class="col-sm-4">           
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">ARREGLO DE BARBA</h5>
                  <p class="card-text">Servicio tradicional de barbería para sacar el mayor partido a tu barba.</p>
                  <p class="pricing">17€</p>
                 
                </div>
              </div>
            </div>

            <div class="col-sm-4">           
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">AFEITADO CLÁSICO</h5>
                  <p class="card-text">Servicio auténtico de barbería. Experimenta la piel rasurada al completo y siéntete como nuevo.</p>
                  <p class="pricing">17€</p>
                 
                </div>
              </div>
            </div>


          </div>
          </div>              
        <div class="carousel-item">
          <div class="card-group">
            <div class="col-sm-4">           
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">ARREGLO DE BARBA Y RAPADO DE CABEZA</h5>
                  <p class="card-text">Complementa tu arreglo de barba con un rapado de cabeza.</p>
                  <p class="pricing">22€</p>
                 
                </div>
              </div>
            </div>

            <div class="col-sm-4">           
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">CONTORNOS DE BARBA</h5>
                  <p class="card-text">Complementa tu corte de pelo con un repaso de los contornos de la barba y el cuello.</p>
                  <p class="pricing">22€</p>
                 
                </div>
              </div>
            </div>

            <div class="col-sm-4">           
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">ARREGLO DE BARBA Y CONTORNOS DE PELO</h5>
                  <p class="card-text">Complementa tu arreglo de barba con un repaso de los contornos del pelo y el cuello.</p>
                  <p class="pricing">25€</p>
                 
                </div>
              </div>
            </div>


          </div>
        </div>
        <div class="carousel-item">
          <div class="card-group">
            <div class="col-sm-4">           
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">ARREGLO DE BARBA CON COLOR</h5>
                  <p class="card-text">Complementa tu arreglo de barba dándole un toque personal.</p>
                  <p class="pricing">27€</p>
                 
                </div>
              </div>
            </div>

            <div class="col-sm-4">           
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">TINTE DE PELO</h5>
                  <p class="card-text">Si quieres un cambio de look con un color nuevo de pelo en BARBERSHOP también podemos hacerlo posible.</p>
                  <p class="pricing">45€</p>
                 
                </div>
              </div>
            </div>

            <div class="col-sm-4">           
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">TINTE DE BARBA</h5>
                  <p class="card-text">Si lo que quieres es cubrir las canas de tu barba para rejuvenecer tu imagen en BARBERSHOP también podemos hacerlo posible.</p>
                  <p class="pricing">30€</p>
                 
                </div>
              </div>
            </div>


          </div>
        </div>
      </div>
      
    </div>
      
    
      
  </section>
@endsection

@section('contenido3')

    
<section id="example-3" class="text-white bg-secondary ps-3 sect">

        <div class="container">


            <h2 class="fw-light text-center text-lg  mb-0">Nuestros Trabajos</h2>

            <hr class="mt-2 mb-2">

            <div class="row text-center text-lg-start">

               
                @foreach ($galeria as $foto)

                <div class="col-lg-3 col-md-4 col-6">


                  <img class="img-size" src="{{ asset( $foto->nombre) }}" alt="">

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
                <div class="col-md-4 mt-3">
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

                <div class="col-md-4 mt-3">
                    <div class="container-fluid">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d194390.01103703328!2d-4.0170353054687515!3d40.4233828!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd42287ab3f77019%3A0x56c00bc05abaf59d!2sPlaza%20de%20Espa%C3%B1a!5e0!3m2!1ses!2ses!4v1712760962369!5m2!1ses!2ses"
                            width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>


                </div>

                <div class="col-md-4 aling-items-center mt-4 container-hours ">

                    <div class="container">
                        <div class="row border-hours">
                            <h2 class="fw-light text-center text-lg  ">Horario</h2>
                            <div class="col-md-6 col-6 mt-3">
                                <ul class="list-inline">
                                    <li>Lunes - Viernes</li>
                                    <li>Sabado</li>
                                </ul>
                            </div>
                            <div class="col-md-6 col-6 mt-3">
                                <ul class="list-inline">
                                    <li>9:00 - 14:00 / 16:00 - 20:00</li>
                                    <li>11:00 - 14:00 / 16:00 - 20:00</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
