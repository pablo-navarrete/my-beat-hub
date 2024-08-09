<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>My Beat Hub</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    @yield('css_before')
    <!-- Custom CSS -->
    <style>
        /* Navbar Styling */
        .navbar {
            background-color: #000;
            /* Fondo negro */
            border-bottom: 2px solid rgb(39, 39, 39);
            /* Borde debajo del menú */
            padding: 0 20px;
            /* Padding alrededor del contenido del menú */
            box-shadow: 0 2px 4px rgba(0, 255, 38, 0.1);
            /* Opcional: Sombra para un efecto visual adicional */
            z-index: 1030;
            /* Asegura que el menú quede por encima de otros elementos */
        }

        .navbar .navbar-brand,
        .navbar .nav-link {
            color: #fff;
            /* Texto blanco */
        }

        .navbar .navbar-brand:hover {
            color: #11c511;
            /* Color del logo en hover (amarillo en este caso) */
        }

        .navbar .navbar-nav {
            margin-left: 20px;
            /* Espacio a la izquierda del menú */
        }

        .navbar .nav-item {
            margin-left: 20px;
            /* Espacio entre elementos del menú */
        }

        .navbar .nav-link {
            padding: 10px 15px;
            /* Padding alrededor de cada enlace */
            transition: color 0.3s, background-color 0.3s;
            /* Suaviza la transición del color y fondo */
        }

        .navbar .nav-link:hover {
            color: #11c511;
            /* Color de texto en hover (amarillo en este caso) */
            /*background-color: #333;*/
            /* Fondo oscuro en hover */
            border-radius: 4px;
            /* Bordes redondeados para el efecto de hover */
        }

        /* Añadir esta clase para evitar el oscurecimiento del menú seleccionado */
        .navbar .nav-link:focus,
        .navbar .nav-link:active {
            color: #fff !important;
            /* Mantener el texto blanco */
            background-color: transparent !important;
            /* Mantener el fondo transparente */
        }

        .nav-link.active {
            color: #28a745 !important;
        }

        .form {
            width: 33%;
        }

        .form-control.custom-bg {
            background-color: #c7c6c6;
            /* Tono gris claro personalizado */
        }

        .input-group {
            width: 100%;
            /* Ocupa todo el ancho del contenedor */
            max-width: 600px;
            /* Ancho máximo del input */
        }

        .input-group-text {
            background-color: #fff;
            /* Fondo blanco para el ícono */
            border: 1px solid #ced4da;
            /* Borde gris claro */
        }

        .input-group-text .fa-magnifying-glass {
            color: #000;
            /* Color negro para el ícono */
        }

        .navbar-toggler .fa-bars {
            font-size: 24px;
            /* Ajusta el tamaño del ícono */
            color: #fff;
            /* Color blanco para el ícono */
            transition: color 0.3s;
            /* Transición suave del color */
        }

        .navbar-toggler:hover .fa-bars {
            color: #11c511;
            /* Color amarillo en hover */
        }

        .search {
            background-color: #11c511;
        }

        /* Estilo del botón de búsqueda */
        .input-group .search {
            border: 2px solid #28a745;
            /* Borde verde */
            color: #28a745;
            /* Color del texto verde */
            background-color: transparent;
            /* Fondo transparente */
            transition: background-color 0.3s, color 0.3s;
            /* Transiciones suaves */
        }

        /* Estilo del botón de búsqueda al pasar el ratón */
        .input-group .search:hover {
            background-color: #28a745;
            /* Fondo verde al pasar el ratón */
            color: #fff;
            /* Texto blanco al pasar el ratón */
        }

        /* Ajustes para el ícono */
        .input-group .search i {
            color: inherit;
            /* El ícono hereda el color del botón */
        }

        /* Evitar que el texto del enlace del menú desplegable se oscurezca al seleccionarlo */
        .navbar .nav-link.dropdown-toggle {
            color: #fff !important;
            /* Color del texto */
        }

        .navbar .nav-link.dropdown-toggle:hover,
        .navbar .nav-link.dropdown-toggle:focus,
        .navbar .nav-link.dropdown-toggle:active {
            color: #28a745 !important;
            /* Color del texto al pasar el ratón, al enfocar y al seleccionar */
            background-color: transparent !important;
            /* Fondo transparente para evitar oscurecimiento */
        }

        /* Opcional: Ajustes para el menú desplegable */
        .navbar .dropdown-menu {
            background-color: #000;
            /* Fondo negro del menú desplegable */
        }

        .navbar .dropdown-item {
            color: #fff;
            /* Color del texto del ítem del menú desplegable */
        }

        .navbar .title-perfil {
            color: #fff;
            /* Color del texto del ítem del menú desplegable */
        }

        .navbar .perfil-title {
            background-color: #333;
        }

        .navbar .dropdown-item:hover,
        .navbar .dropdown-item:focus,
        .navbar .dropdown-item:active {
            color: #28a745;
            /* Color del texto del ítem al pasar el ratón, al enfocar y al seleccionar */
            background-color: #333;
            /* Fondo oscuro del ítem al pasar el ratón, al enfocar y al seleccionar */
        }

        .avatar-small {
            width: 30px;
            /* Ajusta este valor al tamaño deseado */
            height: 30px;
            /* Ajusta este valor al tamaño deseado */
            object-fit: cover;
            /* Opcional: asegura que la imagen se ajuste bien al contenedor */
        }

        /* Estilo general del pie de página */
        footer {
            background-color: #000;
            /* Fondo negro del pie de página */
            color: #fff;
            /* Color blanco para todo el texto */
        }

        /* Color de los enlaces dentro del pie de página */
        footer a {
            color: #fff;
            /* Color blanco para los enlaces */
            text-decoration: none;
            /* Sin subrayado */
        }

        footer a:hover {
            color: #11c511;
            /* Color verde claro al pasar el ratón */
        }

        /* Estilo para los íconos de redes sociales */
        footer .fab {
            color: #fff;
            /* Color blanco para los íconos de redes sociales */
        }

        footer .fab:hover {
            color: #11c511;
            /* Color verde claro al pasar el ratón */
        }

        /* Estilo para los íconos FontAwesome */
        footer .fas {
            color: #fff;
            /* Color blanco para los íconos FontAwesome */
        }

        /* Estilo para los encabezados dentro del pie de página */
        footer h6 {
            color: #fff;
            /* Color blanco para los encabezados */
        }

        /* Estilo para el contenido dentro de los párrafos */
        footer p {
            color: #fff;
            /* Color blanco para el texto en los párrafos */
        }

        /* Estilo para el fondo del área de copyright */
        footer .text-center.p-4 {
            background-color: rgba(0, 0, 0, 0.05);
            /* Fondo gris claro */
            color: #fff;
            /* Color blanco para el texto */
        }

        .navbar .nav-link.dropdown-toggle.no-caret::after {
            display: none;
            /* Oculta el caret */
        }
    </style>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body style="background-color: #222222;">
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container-fluid ms-5 me-5 m-1">
            <a class="navbar-brand" href="/">MYBEATHUB</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="">Somos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('informaciones') ? ' active' : '' }}"
                            href="{{ route('information.information') }}">Información</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('categorias/buscar') ? ' active' : '' }}"
                            href="{{ route('category.category') }}">Categorías</a>
                    </li>
                </ul>
                <form class="d-flex ms-auto form">
                    <div class="input-group">
                        <input class="form-control custom-bg" type="search"
                            placeholder="Busqueda general por instrumental o por usuario" aria-label="Search">
                        <button class="input-group-text search"><i class="fas fa-magnifying-glass"></i></button>
                    </div>
                </form>
                <ul class="navbar-nav ms-3">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle no-caret" href="" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <i class="fa-solid fa-circle-play"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <div class="text-center m-5">
                                <p style="color: #fff; ms-5 me-5">La lista de reproducción esta vacía</p>
                            </div>

                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle no-caret" href="" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <i class="fa-solid fa-heart"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <div class="text-center m-5">
                                <p style="color: #fff; ms-5 me-5">No hay Productos que me gusten</p>
                            </div>

                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle no-caret" href="" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <i class="fa-solid fa-bag-shopping"></i>
                            <span class="badge bg-danger">0</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <div class="text-center m-5">
                                <p style="color: #fff; ms-5 me-5">No hay productos para comprar</p>
                            </div>

                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle no-caret" href="" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <i class="fa-solid fa-bell"></i>
                            <span class="badge bg-danger">0</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <div class="text-center m-5">
                                <p style="color: #fff; ms-5 me-5">No hay notificaciones</p>
                            </div>

                        </div>
                    </li>

                </ul>
                <ul class="navbar-nav ms-3">
                    @if (Route::has('login'))
                        @auth
                            <li class="nav-item">
                                <a href="{{ url('/home') }}" class="nav-link">Dashboard</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <img class="rounded-circle avatar-small"
                                        src="https://mdbcdn.b-cdn.net/img/new/avatars/9.webp" />

                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <div class="perfil-title">
                                        <p class="title-perfil ms-3 me-3">
                                            <strong>{{ Auth::user()->name }}</strong>
                                            <br>
                                            <span class="small">{{ Auth::user()->email }}</span>

                                        </p>
                                    </div>

                                    <a class="dropdown-item" href="#">Mi Perfil</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar sesión') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @else
                            <li class="nav-item">
                                <a href="{{ route('login') }}"
                                    class="nav-link {{ request()->is('login') ? ' active' : '' }}">Iniciar sesión</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a href="{{ route('register') }}"
                                        class="nav-link {{ request()->is('register') ? ' active' : '' }}">Registrarse</a>
                                </li>
                            @endif
                        @endauth
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="text-center text-lg-start  text-muted" style="background-color: #000;">
        <!-- Section: Social media -->
        <section
            class="d-flex justify-content-center justify-content-lg-between p-4 "style="border-bottom: 2px solid #151515;">
            <!-- Left -->
            <div class="me-5 d-none d-lg-block">
                <span style="color: #ced4da;">Contactanos y conecta con nosotros en cualquier lugar...</span>
            </div>
            <!-- Left -->

            <!-- Right -->
            <div>
                @if ($rrssFooter->status_facebook == 1)
                    <a href="{{ $rrssFooter->facebook ?? '#' }}" target="_blank" class="me-4 text-reset">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                @endif
                @if ($rrssFooter->status_instagram == 1)
                    <a href="{{ $rrssFooter->instagram ?? '#' }}" target="_blank" class="me-4 text-reset">
                        <i class="fab fa-instagram"></i>
                    </a>
                @endif
                @if ($rrssFooter->status_youtube == 1)
                    <a href="{{ $rrssFooter->youtube ?? '#' }}" target="_blank" class="me-4 text-reset">
                        <i class="fab fa-youtube"></i>
                    </a>
                @endif
            </div>
            <!-- Right -->
        </section>
        <!-- Section: Social media -->

        <!-- Section: Links  -->
        <section class="">
            <div class="container text-center text-md-start mt-5">
                <!-- Grid row -->
                <div class="row mt-3">
                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                        <!-- Content -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            MYBEATHUB
                        </h6>
                        @if ($footer)
                            <p>
                                {{ $footer->description }}
                            </p>
                        @endif
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            Políticas y Derechos
                        </h6>
                        <p>
                            <a href="#" class="text-reset">Términos y condiciones</a>
                        </p>
                        <p>
                            <a href="#" class="text-reset">Políticas de cookies</a>
                        </p>
                        <p>
                            <a href="#" class="text-reset">Políticas de privacidad</a>
                        </p>
                        <p>
                            <a href="#" class="text-reset">quejas por derechos de autor</a>
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            Explorar más
                        </h6>
                        <p>
                            <a href="{{ route('information.information') }}" class="text-reset">Informaciones</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Somos</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Dar tu opinión</a>
                        </p>
                        <p>
                            <a href="{{ route('category.category') }}" class="text-reset">Categorías</a>
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">Contacto</h6>
                        <!--<p><i class="fas fa-home me-3"></i> New York, NY 10012, US</p>-->
                        @if ($contactFooter->status_correo == 1)
                            <p>
                                <i class="fas fa-envelope me-3"></i>
                                {{ $contactFooter->correo ?? '' }}
                            </p>
                        @endif

                        @if ($contactFooter->status_celular == 1)
                            <p><i class="fas fa-phone me-3"></i> {{ $contactFooter->celular ?? '' }}</p>
                        @endif

                        @if ($contactFooter->status_whatsapp == 1)
                            <p><i class="fa-brands fa-whatsapp me-3"></i> {{ $contactFooter->whatsapp ?? '' }}</p>
                        @endif

                    </div>
                    <!-- Grid column -->
                </div>
                <!-- Grid row -->
            </div>
        </section>
        <!-- Section: Links  -->

        <!-- Copyright -->
        <div class="text-center p-4" style="background-color: #151515;">
            © 2024 Copyright:
            <a class="text-reset fw-bold" href="https://mybeathub.com/">MYBEATHUB.COM</a>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Footer -->
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    @yield('js_after')
</body>

</html>
