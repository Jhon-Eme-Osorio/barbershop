<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BARBERSHOP</title>
    @vite(['resources/css/styles.css', 'resources/css/style-foto.css',  'resources/js/script.js' ])
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

</head>

<body>
    <nav class="navbar  navbar-expand-lg  bg-dark border-bottom border-body" data-bs-theme="dark" id="navbar-example2">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="{{ asset('imagenes/logo.svg') }}" alt="logo" width="90px"
                    height="60px"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav  ms-auto mb-2 mb-lg-0">
                    <li class="nav-item text-center">
                        <a class="nav-link " href="#section1">Inicio</a>
                    </li>
                    <li class="nav-item text-center">
                        <a class="nav-link " href="#section2">Servicios</a>
                    </li>
                    <li class="nav-item text-center">
                        <a class="nav-link " href="#section3">Portafolio</a>
                    </li>
                    <li class="nav-item text-center">
                        <a class="nav-link " href="#section4">Contacto</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="content" data-bs-spy="scroll" data-bs-smooth-scroll="true">

        <div id="section1">
            @yield('contenido')
        </div>

        <div id="section2">
            @yield('contenido2')
        </div>

        <div id="section3">
            @yield('contenido3')
        </div>

        <div id="section4">
            @yield('contenido4')
        </div>
       

    </main>


    <footer class="footer text-center bg-dark text-white">
        <div class="container">
            <div class="row">
                <p>© 2024 BARBERSHOP. Reservados todos los derechos</p>
            </div>
        </div>
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="js/app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>
