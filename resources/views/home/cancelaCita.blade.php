<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BARBERSHOP</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


</head>

<body class="container-fluid vh-100 d-flex justify-content-center align-items-center">



        <div class="card text-center h-100 ">
            <div class="card-header navbar  navbar-expand-lg  bg-dark border-bottom border-body" data-bs-theme="dark"
                id="navbar-example2">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#"><img src="{{ asset('imagenes/logo.svg') }}" alt="logo"
                            width="90px" height="60px"></a>
                </div>
            </div>
            <div class="card-body d-flex flex-column justify-content-center align-items-center">
                <h5 class="card-title">BARBERSHOP</h5>
                <p class="card-text">
                <div class="container-fluid">
                    ¡Oops! Parece que has cancelado tu cita.
                    <p>¿Por qué no programar una nueva cita y
                        permitirnos cuidar de ti?</p>
                    <p>En Barbershop, estamos listos para brindarte el mejor servicio de cuidado
                        personal. ¡Te esperamos!</p>
                </div>
                </p>
                <a class="btn btn-light btn-outline-success" href="{{ route('home.sections') }}">
                    BARBERSHOPP
                </a>
            </div>
            <div class="card-footer text-center bg-dark text-white">
                <div class="row">
                    <p>© 2024 BARBERSHOP. Reservados todos los derechos</p>
                </div>
            </div>
        </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="js/app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="{{ asset('resources/js/script.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if (Session::has('cita_cancelada_error'))
        <script>
            Swal.fire({
                title: "No se a podido cancelar su cita.!",
                icon: "warning"
            });
        </script>
    @endif



</body>

</html>
