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
    <!-- Plyr CSS -->
    <link rel="stylesheet" href="https://cdn.plyr.io/3.7.6/plyr.css" />
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
            box-shadow: 0 2px 4px rgb(3, 40, 69);
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
            color: rgb(21, 146, 242);
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
            color: rgb(21, 146, 242);
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
            color: rgb(21, 146, 242) !important;
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
            color: rgb(21, 146, 242);
            /* Color amarillo en hover */
        }

        .search {
            background-color: rgb(21, 146, 242);
        }

        /* Estilo del botón de búsqueda */
        .input-group .search {
            border: 2px solid rgb(21, 146, 242);
            /* Borde verde */
            color: rgb(21, 146, 242);
            /* Color del texto verde */
            background-color: transparent;
            /* Fondo transparente */
            transition: background-color 0.3s, color 0.3s;
            /* Transiciones suaves */
        }

        /* Estilo del botón de búsqueda al pasar el ratón */
        .input-group .search:hover {
            background-color: rgb(21, 146, 242);
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
            color: rgb(21, 146, 242) !important;
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
            color: rgb(21, 146, 242);
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
            color: rgb(21, 146, 242);
            /* Color verde claro al pasar el ratón */
        }

        /* Estilo para los íconos de redes sociales */
        footer .fab {
            color: #fff;
            /* Color blanco para los íconos de redes sociales */
        }

        footer .fab:hover {
            color: rgb(21, 146, 242);
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


        /*reproductor*/
        .audio-player {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background: #333;
            color: #fff;
            padding: 10px;
            display: none;
            /* Oculto por defecto */
        }

        .audio-player .controls {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .audio-player button {
            background: #444;
            border: none;
            color: #fff;
            padding: 5px 10px;
            cursor: pointer;
            border-radius: 3px;
        }

        #progress {
            flex-grow: 1;
            background: #555;
            border-radius: 5px;
            height: 5px;
            position: relative;
            margin: 0 10px;
        }

        #progress-bar {
            background: linear-gradient(90deg, #3b6af6, #0040ff, #3b6af6);
            /* Degradado de color */
            height: 100%;
            width: 0;
            position: absolute;
            top: 0;
            left: 0;
            border-radius: 5px;
            box-shadow: 0 0 15px rgba(116, 176, 248, 0.8);
            /* Efecto de brillo */
        }

        #progress-bar:hover {
            background: linear-gradient(90deg, #3b6af6, #0040ff, #3b6af6);
            /* Degradado de color */
            height: 100%;
            width: 0;
            position: absolute;
            top: 0;
            left: 0;
            border-radius: 5px;
            box-shadow: 0 0 15px rgba(177, 207, 245, 0.8);
            /* Efecto de brillo */
        }


        #current-time,
        #duration {
            font-size: 0.9em;
        }


        .navbar .nav-link.dropdown-toggle.no-caret.heart:hover {
            color: red !important;
        }

        .navbar .nav-link.dropdown-toggle.no-caret.notification:hover {
            color: rgb(251, 255, 0) !important;
        }

        .navbar .nav-link.dropdown-toggle.no-caret.carrito-compras:hover {
            color: rgb(0, 255, 47) !important;
        }

        .card-title a {
            color: white;
            text-decoration: none;
        }

        .card-title .user {
            color: rgb(192, 188, 188);
            text-decoration: none;
        }

        .card-title a:hover {
            text-decoration: none;
            color: rgb(21, 146, 242);
        }

        a .card-title:hover {
            text-decoration: none;
            color: rgb(21, 146, 242);
        }

        /* Estilo para el corazón cuando está seleccionado */
        .corazon.liked {
            color: #ff0000 !important;
            /* Color rojo cuando el ícono está "liked" */
        }

        .dropdown-menu.custom-width {
        min-width: 625px; /* Ajusta el ancho mínimo */
        max-width: 800px; /* Ajusta el ancho máximo */
         }

         .card-user-like {
            color: rgb(134, 130, 130);
        }
        .card-user-like:hover{
            color: rgb(21, 146, 242);
        }
        .card-title-like:hover{
            color: rgb(21, 146, 242) !important;
        }
      
    </style>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body style="background-color: #18191c;">
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container-fluid ms-5 me-5 m-1">
            <a class="navbar-brand" href="/" style="color: rgb(21, 146, 242);">MYBEATHUB</a>
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
                        <a class="nav-link dropdown-toggle no-caret heart" href="#" id="navbarDropdown"
                            role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <i class="fa-solid fa-heart"></i>
                        </a>
                        @auth
                        <div class="dropdown-menu dropdown-menu-end custom-width" aria-labelledby="navbarDropdown" id="liked-products-menu">
                            <div id="liked-products-container" class="text-center m-5" >
                                <p style="color: #fff;">Cargando productos...</p>
                            </div>
                            <a href="#" id="view-all-container" class="text-center ver-todo-like" style="display: none; text-decoration: none; background-color: #0f0f13; color: white; padding: 10px 20px; display: block; width: 100%; text-align: center;">
                                Ver todos
                            </a>
                            
                        </div>
                        @else
                        <div class="dropdown-menu dropdown-menu-end custom-width" aria-labelledby="navbarDropdown" id="login-message">
                            <div class="text-center m-5">
                                <p style="color: white;">Para ver las instrumentales que te gustaron, debes <a href="{{ route('login') }}">iniciar sesión</a>.</p>
                                <p style="color: rgb(172, 169, 169);">si no estas registrado, <a href="{{ route('register') }}">Registrarte</a>.</p>
                            </div>
                        </div>
                        @endauth
                    </li>
                    

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle no-caret notification" href="" id="navbarDropdown"
                            role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <i class="fa-solid fa-bell"></i>
                            <span class="badge bg-danger">0</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <div class="text-center m-5">
                                <p style="color: #fff; ms-5 me-5">No hay notificaciones</p>
                            </div>

                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle no-caret carrito-compras" href="" id="navbarDropdown"
                            role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <i class="fa-solid fa-cart-shopping"></i>
                            <span class="badge bg-danger">0</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <div class="text-center m-5">
                                <p style="color: #fff; ms-5 me-5">No hay productos para comprar</p>
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
                                            <strong>{{ Auth::user()->username }}</strong>
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

    <!-- Reproductor de audio fijo en el pie de la pantalla -->
    <div id="audio-player"
        class="audio-player container-fluid p-3 bg-dark text-white position-fixed bottom-0 start-0 end-0">
        <!-- Contenedor de progreso -->
        <div id="progress-container" class="d-flex align-items-center mb-2">
            <span id="current-time" class="me-2">00:00</span>
            <div id="progress" class="flex-grow-1 position-relative">
                <div id="progress-bar" class="position-absolute top-0 start-0"></div>
            </div>
            <span id="duration" class="ms-2">00:00</span>
        </div>

        <!-- Controles del reproductor -->
        <div class="row align-items-center">
            <!-- Información de la pista y botones de acción -->
            <div class="col-md-3 d-flex align-items-center mb-3 mb-lg-0">
                <img id="track-art" src="" class="rounded" alt="Track Art"
                    style="height:80px; width:80px;">
                <div class="ms-3 flex-grow-1">
                    <a id="track-title" href="#" class="text-white text-decoration-none card-title">
                        <h4 class="mb-0 card-title"><strong id="track-title-text"></strong></h4>
                    </a>
                    <a id="track-username" href="#" class="text-white-50 text-decoration-none card-title">
                        <p class="mb-0 card-title"><strong id="track-username-text"></strong></p>
                    </a>
                </div>
            </div>

            <!-- Botones de acción -->
            <div class="col-md-4">
                <div class="row align-items-center">
                    <div class="col-12 col-md-auto  mb-md-0">
                        <a href="#" id="add-to-cart"
                            class="btn btn-secondary btn-sm d-flex align-items-center">
                            <span class="d-flex align-items-center bg-primary text-white px-2 py-1 rounded me-2">
                                <strong id="track-price"></strong>
                            </span>
                            <span class="d-flex align-items-center">
                                Agregar al carro
                                <i class="fa-solid fa-cart-shopping ms-2"></i>
                            </span>
                        </a>
                    </div>
                    <div class="col-4 col-md-auto  mb-md-0">
                        @auth

                            <button id="like-button" class="btn btn-outline-light" data-product-id="">
                                <i class="fa-solid fa-heart corazon"></i>
                            </button>
                        @else
                            <button class="btn btn-outline-light" data-bs-toggle="modal" data-bs-target="#likeModal">

                                <i class="fa-solid fa-heart"></i>
                            </button>
                        @endauth
                    </div>
                    <div class="col-4 col-md-auto  mb-md-0">

                        <button id="message-button" class="btn btn-outline-light" data-bs-toggle="modal"
                            data-bs-target="#commentsModal"><i class="fa-solid fa-message"></i>
                        </button>
                    </div>
                    <div class="col-4 col-md-auto">
                        <button id="share-button" class="btn btn-outline-light"><i
                                class="fa-solid fa-share"></i></button>
                    </div>
                </div>
            </div>

            <!-- Controles de reproducción y volumen -->
            <div class="col-md-5 d-flex align-items-center justify-content-end">
                <button id="rewind" class="btn btn-outline-light me-2"><i
                        class="fa-solid fa-backward-step"></i></button>
                <button id="play-pause"
                    class="play btn btn-primary rounded-circle d-flex align-items-center justify-content-center me-2"
                    style="width: 50px; height: 50px; padding: 0;">
                    <i class="fa-solid fa-play fa-2x"></i>
                </button>
                <button id="fast-forward" class="btn btn-outline-light me-2"><i
                        class="fa-solid fa-forward-step"></i></button>
                <button id="volume-control" class="btn btn-outline-light me-2"><i
                        class="fa-solid fa-volume-high"></i></button>
                <input type="range" id="volume-slider" class="form-range" min="0" max="1"
                    step="0.01" value="1" style="width: 100px;">
                <button id="close-player" class="btn btn-danger btn-sm ms-2">X</button>
            </div>
        </div>
    </div>



    <!-- Modal para Comentarios -->
    <div class="modal fade" id="commentsModal" tabindex="-1" aria-labelledby="commentsModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content custom-card-bg">
                <div class="modal-header " style="border-color: #363b3f;">
                    <h5 class="modal-title" id="commentsModalLabel" style="color: white;">Comentarios</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        style="filter: invert(100%) sepia(0%) saturate(100%) hue-rotate(0deg) brightness(90%) contrast(90%);"></button>
                </div>
                <div class="modal-body">

                    <!-- Sección para dejar un nuevo comentario -->
                    <div class="mb-4">
                        <form action="{{ route('comments.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" id="product_id" value="">
                            <input type="hidden" name="user_id" id="user_id" value="">
                            <!-- Agrega el campo user_id -->
                            @auth
                                <div class="form-group mb-3 mt-3">
                                    <textarea class="form-control mb-3" name="comment" id="newComment" rows="3"
                                        placeholder="Deja tu comentario aquí..." required></textarea>
                                    <div class="text-end me-3">
                                        <button type="submit" class="btn btn-outline-primary">Comentar</button>
                                    </div>
                                </div>
                                @elseguest
                                <p style="color: white;">Para agregar un comentario, debe <a
                                        href="{{ route('login') }}">iniciar sesión</a>.</p>
                                <p style="color: rgb(172, 169, 169);">si no esta registrado, <a
                                        href="{{ route('register') }}">Registrarse</a>.</p>
                            @endguest
                        </form>
                    </div>

                    <!-- Lista de comentarios existentes -->
                    <div class="existing-comments" style="max-height: 350px; overflow-y: auto;">

                        <div id="loading-spinner" class="spinner-border text-light" role="status" style="display: none;">
                            <span class="sr-only">Cargando...</span>
                        </div>
                        <!-- Comentarios se llenarán aquí mediante JavaScript -->
                    </div>
                </div>
                <div class="modal-footer " style="border-color: #363b3f;">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

     <!-- Modal para seguir no logueado -->
    <div class="modal fade" id="followModal" tabindex="-1" aria-labelledby="followModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content custom-card-bg">
                <div class="modal-header " style="border-color: #363b3f;">
                    <h5 class="modal-title" id="followModalLabel" style="color: white;">Seguir</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        style="filter: invert(100%) sepia(0%) saturate(100%) hue-rotate(0deg) brightness(90%) contrast(90%);"></button>
                </div>
                <div class="modal-body">

                    <!-- Sección para dejar un nuevo comentario -->
                    <div class="mb-4">

                        <p style="color: white;">Para seguir a un usuario, debe <a href="{{ route('login') }}">iniciar
                                sesión</a>.</p>
                        <p style="color: rgb(172, 169, 169);">si no esta registrado, <a
                                href="{{ route('register') }}">Registrarse</a>.</p>

                    </div>

                </div>
                <div class="modal-footer " style="border-color: #363b3f;">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

  <!-- Modal para like no logueado -->
  <div class="modal fade" id="likeModal" tabindex="-1" aria-labelledby="likeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content custom-card-bg">
            <div class="modal-header " style="border-color: #363b3f;">
                <h5 class="modal-title" id="likeModalLabel" style="color: white;">Me gusta</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    style="filter: invert(100%) sepia(0%) saturate(100%) hue-rotate(0deg) brightness(90%) contrast(90%);"></button>
            </div>
            <div class="modal-body">

                <!-- Sección para dejar un nuevo comentario -->
                <div class="mb-4">
                    
                            <p style="color: white;">Para indicar que te gusta una instrumental, debe <a
                                    href="{{ route('login') }}">iniciar sesión</a>.</p>
                            <p style="color: rgb(172, 169, 169);">si no esta registrado, <a
                                    href="{{ route('register') }}">Registrarse</a>.</p>
                    
                </div>

            </div>
            <div class="modal-footer " style="border-color: #363b3f;">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
  </div>

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
                        <h6 class="text-uppercase fw-bold mb-4" style="color: rgb(21, 146, 242);">
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
            <a class="text-reset fw-bold" href="https://mybeathub.com/"
                style="color: rgb(21, 146, 242) !important;">MYBEATHUB.COM</a>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Footer -->
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>

    @yield('js_after')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
        // Elementos del reproductor de audio y controles
            const audioPlayer = document.getElementById('audio-player');
            const audioElement = new Audio(); // Crea una nueva instancia de Audio
            const playPauseButton = document.getElementById('play-pause');
            const progressContainer = document.getElementById('progress');
            const progressBar = document.getElementById('progress-bar');
            const currentTimeDisplay = document.getElementById('current-time');
            const durationDisplay = document.getElementById('duration');
            const closePlayerButton = document.getElementById('close-player');
            const volumeControlButton = document.getElementById('volume-control');
            const volumeSlider = document.getElementById('volume-slider');
            const rewindButton = document.getElementById('rewind');
            const fastForwardButton = document.getElementById('fast-forward');
            const playButtons = document.querySelectorAll('.play-button');

            // Variables de estado
            let isPlaying = false;
            let isDragging = false;
            let wasPlayingBeforeDrag = false;
            let isVolumeHigh = true;
            let currentPlayingButton = null;

            // Función para alternar entre reproducir y pausar
            function togglePlayPause() {
                if (isPlaying) {
                    audioElement.pause();
                } else {
                    audioElement.play();
                }
                isPlaying = !isPlaying;
                updatePlayPauseButton();
                if (currentPlayingButton) {
                    updatePlayButtonIcon(currentPlayingButton, isPlaying);
                }
            }

            // Función para actualizar el botón de reproducción/pausa
            function updatePlayPauseButton() {
                playPauseButton.innerHTML = isPlaying ?
                    '<i class="fa-solid fa-pause fa-2x"></i>' :
                    '<i class="fa-solid fa-play fa-2x"></i>';
            }

            // Función para actualizar el icono del botón de reproducción de una pista específica
            function updatePlayButtonIcon(button, isPlaying) {
                const icon = button.querySelector('i');
                if (isPlaying) {
                    icon.classList.remove('fa-play-circle');
                    icon.classList.add('fa-pause-circle');
                } else {
                    icon.classList.remove('fa-pause-circle');
                    icon.classList.add('fa-play-circle');
                }
            }

            // Función para actualizar la barra de progreso del reproductor
            function updateProgressBar() {
                const progressPercentage = (audioElement.currentTime / audioElement.duration) * 100;
                progressBar.style.width = progressPercentage + '%';
            }

            // Función para actualizar la visualización del tiempo
            function updateTimeDisplay() {
                currentTimeDisplay.textContent = formatTime(audioElement.currentTime);
                durationDisplay.textContent = formatTime(audioElement.duration);
            }

            // Función para formatear el tiempo en minutos y segundos
            function formatTime(seconds) {
                const minutes = Math.floor(seconds / 60);
                const secs = Math.floor(seconds % 60);
                return `${String(minutes).padStart(2, '0')}:${String(secs).padStart(2, '0')}`;
            }

            // Función para manejar el arrastre del control de progreso
            function handleProgressDrag(e) {
                const width = progressContainer.clientWidth;
                const clickX = e.clientX - progressContainer.getBoundingClientRect().left;
                const progressPercentage = Math.max(0, Math.min(100, (clickX / width) * 100));
                progressBar.style.width = progressPercentage + '%';
                audioElement.currentTime = (progressPercentage / 100) * audioElement.duration;
            }

            // Función para inicializar el reproductor con una pista específica
            function initializePlayer(audioSrc, button) {
                // Pausa la pista actual si está reproduciéndose
                if (isPlaying) {
                    audioElement.pause();
                    if (currentPlayingButton) {
                        updatePlayButtonIcon(currentPlayingButton, false);
                       
                    }
                }
                // Extrae la información del botón (imagen, título, nombre de usuario, precio)
                const trackArtSrc = button.getAttribute('data-image-src');
                const trackTitle = button.getAttribute('data-title');
                const trackUsername = button.getAttribute('data-username');
                const trackPrice = button.getAttribute('data-price');
                const productId = button.getAttribute('data-product-id');

                // Actualiza la interfaz del reproductor con la información extraída
                document.getElementById('track-art').src = trackArtSrc;
                document.getElementById('track-title-text').textContent = trackTitle;
                document.getElementById('track-username-text').textContent = trackUsername;
                document.getElementById('track-price').textContent = `$ ${trackPrice}`;
                document.getElementById('message-button').setAttribute('data-product-id', productId);

                // Función para verificar si el corazón tiene la clase 'liked' y actualizar el estado
                function updateHeartIconState(productId) {
                    // Selecciona el botón de like usando el productId
                    const likeButton = document.querySelector(`.like-button[data-product-id="${productId}"]`);

                    if (likeButton) {
                        // Selecciona el icono del corazón en el botón de like
                        const heartIcon = likeButton.querySelector('.corazon');

                        if (heartIcon) {
                            // Verifica si el icono del corazón tiene la clase 'liked'
                            const isLiked = heartIcon.classList.contains('liked');

                            // Aquí puedes realizar la lógica para mostrar o esconder el corazón como 'liked'
                            if (isLiked) {
                                console.log('El corazón está marcado como "liked".');
                                // Puedes realizar acciones adicionales si es necesario
                            } else {
                                console.log('El corazón no está marcado como "liked".');
                                // Puedes realizar acciones adicionales si es necesario
                            }
                        } else {
                            console.log('No se encontró el icono del corazón.');
                        }
                    } else {
                        console.log('No se encontró el botón de like con el productId dado.');
                    }
                }

                // Configura el botón de like
                const likeButton = document.getElementById('like-button');

                if (likeButton) {
                    likeButton.setAttribute('data-product-id', productId); // Solo una vez
                    likeButton.classList.add('like-button'); // Asegúrate de que tenga la clase `like-button`

                    updateHeartIconState(productId);

                    // Elimina cualquier listener previo para evitar múltiples escuchas
                    likeButton.removeEventListener('click', handleLikeButtonClick);
                    likeButton.addEventListener('click', handleLikeButtonClick);

                    
                }

                // Muestra el reproductor y reproduce la canción
                audioElement.src = audioSrc;
                audioPlayer.style.display = 'block';
                audioElement.play();
                isPlaying = true;
                updatePlayPauseButton();

                // Actualiza el ícono del botón actual
                if (currentPlayingButton) {
                    updatePlayButtonIcon(currentPlayingButton, false);
                }
                currentPlayingButton = button;
                updatePlayButtonIcon(currentPlayingButton, true);
            }

            // Función para manejar el clic en el botón de like
            function handleLikeButtonClick(event) {
                event.preventDefault();

                // Selecciona el icono del corazón en el botón de like
                const likeButton = event.currentTarget;
                const heartIcon = likeButton.querySelector('.corazon');
                const productId = likeButton.getAttribute('data-product-id');

                // Alterna la clase 'liked' en el icono del corazón
                heartIcon.classList.toggle('liked');
                // Selecciona el otro botón de like con el mismo productId
                const otherLikeButton = document.querySelector(`.like-button[data-product-id="${productId}"]`);

                // Alterna la clase 'liked' solo en el otro botón de like si es diferente al actual
                if (otherLikeButton && otherLikeButton !== likeButton) {
                    const otherHeartIcon = otherLikeButton.querySelector('.corazon');
                    otherHeartIcon.classList.toggle('liked');
                }
                // Realiza la solicitud fetch para actualizar el like
                fetch(`/like/${productId}`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                                'content')
                        },
                        body: JSON.stringify({
                            _method: 'POST'
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            const likeCountElement = document.getElementById(`like-count-${productId}`);
                            likeCountElement.textContent = data.likes_count;
                        } else {
                            console.error('Error al actualizar el conteo de likes:', data.error);
                        }
                    })
                    .catch(error => {
                        console.error('Error en la solicitud fetch:', error);
                    });
            }

            // Maneja el clic en el botón de reproducción/pausa
            playPauseButton.addEventListener('click', togglePlayPause);

            // Maneja el clic en el botón de cerrar el reproductor
            closePlayerButton.addEventListener('click', function() {
                audioPlayer.style.display = 'none';
                audioElement.pause();
                isPlaying = false;
                updatePlayPauseButton();
                if (currentPlayingButton) {
                    updatePlayButtonIcon(currentPlayingButton, false);
                }
                currentPlayingButton = null;
            });

            // Actualiza la barra de progreso y el tiempo cuando cambia el tiempo de reproducción
            audioElement.addEventListener('timeupdate', function() {
                if (!isDragging) {
                    updateProgressBar();
                }
                updateTimeDisplay();
            });

            // Actualiza el tiempo total cuando se cargan los metadatos del audio
            audioElement.addEventListener('loadedmetadata', function() {
                updateTimeDisplay();
            });

            // Maneja el evento cuando la pista termina de reproducirse
            audioElement.addEventListener('ended', function() {
                isPlaying = false;
                updatePlayPauseButton();
                if (currentPlayingButton) {
                    updatePlayButtonIcon(currentPlayingButton, false);
                }
                currentPlayingButton = null;
            });

            // Maneja el inicio del arrastre en el control de progreso
            progressContainer.addEventListener('mousedown', function(e) {
                isDragging = true;
                wasPlayingBeforeDrag = !audioElement.paused;
                audioElement.pause();
                handleProgressDrag(e);
            });

            // Maneja el arrastre del control de progreso
            document.addEventListener('mousemove', function(e) {
                if (isDragging) {
                    handleProgressDrag(e);
                }
            });

            // Maneja el final del arrastre del control de progreso
            document.addEventListener('mouseup', function() {
                if (isDragging) {
                    isDragging = false;
                    if (wasPlayingBeforeDrag) {
                        audioElement.play();
                    }
                }
            });

            // Maneja el clic en el botón de control de volumen
            volumeControlButton.addEventListener('click', function() {
                isVolumeHigh = !isVolumeHigh;
                audioElement.volume = isVolumeHigh ? 1 : 0;
                volumeSlider.value = audioElement.volume;

                volumeControlButton.innerHTML = isVolumeHigh ?
                    '<i class="fa-solid fa-volume-high"></i>' :
                    '<i class="fa-solid fa-volume-mute"></i>';
            });

            // Maneja el cambio en el control deslizante de volumen
            volumeSlider.addEventListener('input', function() {
                audioElement.volume = volumeSlider.value;

                volumeControlButton.innerHTML = audioElement.volume === 0 ?
                    '<i class="fa-solid fa-volume-mute"></i>' :
                    '<i class="fa-solid fa-volume-high"></i>';
            });

            // Maneja el clic en los botones de reproducción de pistas
            playButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const audioSrc = button.getAttribute('data-audio-src');

                    // Si la pista actual ya está seleccionada
                    if (currentPlayingButton === button) {
                        togglePlayPause();
                    } else {
                        initializePlayer(audioSrc, button);
                    }
                });
            });

            // Maneja el clic en el botón de rebobinado
            rewindButton.addEventListener('click', function() {
                audioElement.currentTime = Math.max(0, audioElement.currentTime - 10);
            });

            // Maneja el clic en el botón de avance rápido
            fastForwardButton.addEventListener('click', function() {
                audioElement.currentTime = Math.min(audioElement.duration, audioElement.currentTime + 10);
            });

        //fin de funciones de reproductor

            //comentarios de productos
            var commentsModal = document.getElementById('commentsModal');
            var productIdInput = document.getElementById('product_id');
            var userIdInput = document.getElementById('user_id');

            var userId =
                '{{ Auth::id() }}'; // Asegúrate de pasar esto desde el servidor o desde una variable global

            commentsModal.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget;
                var productId = button.getAttribute('data-product-id');

                productIdInput.value = productId;
                userIdInput.value = userId;
                

          
               

                fetch(`/comments/${productId}`)
                    .then(response => response.json())
                    .then(data => {
                        var commentsContainer = commentsModal.querySelector('.existing-comments');
                        
                        commentsContainer.innerHTML = '';

                        // Actualizar el contador de comentarios en la tarjeta del producto
                        document.getElementById(`comment-count-${productId}`).textContent = data
                            .comments.length;

                        data.comments.forEach(comment => {
                            var commentElement = document.createElement('div');
                            commentElement.className = 'comment mb-3 p-3';
                            commentElement.style.backgroundColor = 'rgba(255, 255, 255, 0.05)';
                            commentElement.style.borderRadius = '5px';

                            var formattedDate = new Date(comment.created_at).toLocaleString(
                                'es-ES', {
                                    year: 'numeric',
                                    month: 'long',
                                    day: 'numeric',
                                    hour: '2-digit',
                                    minute: '2-digit'
                                });

                            var trashIcon = '';
                            if (comment.user_id === parseInt(userId)) {
                                trashIcon = `<a href="#" class="text-light delete-comment" data-comment-id="${comment.id}">
                                            <i class="fa-solid fa-trash-can trash"></i>
                                        </a>`;
                            }

                            commentElement.innerHTML = `
                            <div class="d-flex justify-content-between align-items-center">
                                <strong style="color: white;">${comment.user.username}:</strong>
                                ${trashIcon}
                            </div>
                            <p style="color: rgb(221, 219, 219);">${comment.comment}</p>
                            <small style="color: gray;">${formattedDate}</small>
                        `;

                            commentsContainer.appendChild(commentElement);
                        });

                        // Añadir eventos a los botones de eliminar
                        document.querySelectorAll('.delete-comment').forEach(function(deleteButton) {
                            deleteButton.addEventListener('click', function(event) {
                                event.preventDefault();

                                var commentId = this.getAttribute('data-comment-id');

                                Swal.fire({
                                    title: '¿Estás seguro?',
                                    text: "¡No podrás recuperar este comentario después de eliminarlo!",
                                    icon: 'warning',
                                    showCancelButton: true,
                                    confirmButtonColor: '#3085d6',
                                    cancelButtonColor: '#d33',
                                    confirmButtonText: 'Sí, eliminarlo',
                                    cancelButtonText: 'Cancelar'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        fetch(`/comments/${commentId}`, {
                                                method: 'DELETE',
                                                headers: {
                                                    'X-Requested-With': 'XMLHttpRequest',
                                                    'X-CSRF-TOKEN': document
                                                        .querySelector(
                                                            'meta[name="csrf-token"]'
                                                        ).getAttribute(
                                                            'content')
                                                }
                                            })
                                            .then(response => response.json())
                                            .then(data => {
                                                if (data.success) {
                                                    Swal.fire(
                                                        'Eliminado!',
                                                        data.message,
                                                        'success'
                                                    );
                                                    this.closest('.comment')
                                                        .remove();

                                                    // Actualizar el contador de comentarios después de eliminar
                                                    var currentCount =
                                                        parseInt(document
                                                            .getElementById(
                                                                `comment-count-${productId}`
                                                            )
                                                            .textContent);
                                                    document.getElementById(
                                                            `comment-count-${productId}`
                                                        ).textContent =
                                                        currentCount - 1;
                                                } else {
                                                    Swal.fire(
                                                        'Error!',
                                                        'Error: ' + data
                                                        .message,
                                                        'error'
                                                    );
                                                }
                                            })
                                            .catch(error => console.error(
                                                'Error deleting comment:',
                                                error));
                                    }
                                });
                            });
                        });
                    })
                    .catch(error => console.error('Error fetching comments:', error));
            });

            var commentForm = document.querySelector('#commentsModal form');
            if (commentForm) {
                commentForm.addEventListener('submit', function(event) {
                    event.preventDefault();

                    var formData = new FormData(commentForm);
                    var productId = productIdInput.value;

                    fetch(commentForm.action, {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                    .getAttribute('content')
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                commentForm.reset();
                                Swal.fire(
                                    'Comentario Agregado!',
                                    'Tu comentario ha sido agregado exitosamente.',
                                    'success'
                                );

                                // Actualizar el contador de comentarios después de agregar
                                var currentCount = parseInt(document.getElementById(
                                    `comment-count-${productId}`).textContent);
                                document.getElementById(`comment-count-${productId}`).textContent =
                                    currentCount + 1;

                                // Recargar comentarios
                                fetch(`/comments/${productId}`)
                                    .then(response => response.json())
                                    .then(data => {
                                        var commentsContainer = commentsModal.querySelector(
                                            '.existing-comments');
                                        commentsContainer.innerHTML = '';

                                        data.comments.forEach(comment => {
                                            var commentElement = document.createElement(
                                                'div');
                                            commentElement.className = 'comment mb-3 p-3';
                                            commentElement.style.backgroundColor =
                                                'rgba(255, 255, 255, 0.05)';
                                            commentElement.style.borderRadius = '5px';

                                            var formattedDate = new Date(comment.created_at)
                                                .toLocaleString('es-ES', {
                                                    year: 'numeric',
                                                    month: 'long',
                                                    day: 'numeric',
                                                    hour: '2-digit',
                                                    minute: '2-digit'
                                                });

                                            var trashIcon = '';
                                            if (comment.user_id === parseInt(userId)) {
                                                trashIcon = `<a href="#" class="text-light delete-comment" data-comment-id="${comment.id}">
                                                        <i class="fa-solid fa-trash-can trash"></i>
                                                    </a>`;
                                            }

                                            commentElement.innerHTML = `
                                        <div class="d-flex justify-content-between align-items-center">
                                            <strong style="color: white;">${comment.user.username}:</strong>
                                            ${trashIcon}
                                        </div>
                                        <p style="color: rgb(221, 219, 219);">${comment.comment}</p>
                                        <small style="color: gray;">${formattedDate}</small>
                                    `;

                                            commentsContainer.appendChild(commentElement);
                                        });

                                        // Añadir eventos a los botones de eliminar
                                        document.querySelectorAll('.delete-comment').forEach(
                                            function(deleteButton) {
                                                deleteButton.addEventListener('click', function(
                                                    event) {
                                                    event.preventDefault();

                                                    var commentId = this.getAttribute(
                                                        'data-comment-id');

                                                    Swal.fire({
                                                        title: '¿Estás seguro?',
                                                        text: "¡No podrás recuperar este comentario después de eliminarlo!",
                                                        icon: 'warning',
                                                        showCancelButton: true,
                                                        confirmButtonColor: '#3085d6',
                                                        cancelButtonColor: '#d33',
                                                        confirmButtonText: 'Sí, eliminarlo',
                                                        cancelButtonText: 'Cancelar'
                                                    }).then((result) => {
                                                        if (result
                                                            .isConfirmed) {
                                                            fetch(`/comments/${commentId}`, {
                                                                    method: 'DELETE',
                                                                    headers: {
                                                                        'X-Requested-With': 'XMLHttpRequest',
                                                                        'X-CSRF-TOKEN': document
                                                                            .querySelector(
                                                                                'meta[name="csrf-token"]'
                                                                            )
                                                                            .getAttribute(
                                                                                'content'
                                                                            )
                                                                    }
                                                                })
                                                                .then(
                                                                    response =>
                                                                    response
                                                                    .json())
                                                                .then(data => {
                                                                    if (data
                                                                        .success
                                                                    ) {
                                                                        Swal.fire(
                                                                            'Eliminado!',
                                                                            data
                                                                            .message,
                                                                            'success'
                                                                        );
                                                                        this.closest(
                                                                                '.comment'
                                                                            )
                                                                            .remove();

                                                                        // Actualizar el contador de comentarios después de eliminar
                                                                        var currentCount =
                                                                            parseInt(
                                                                                document
                                                                                .getElementById(
                                                                                    `comment-count-${productId}`
                                                                                )
                                                                                .textContent
                                                                            );
                                                                        document
                                                                            .getElementById(
                                                                                `comment-count-${productId}`
                                                                            )
                                                                            .textContent =
                                                                            currentCount -
                                                                            1;
                                                                    } else {
                                                                        Swal.fire(
                                                                            'Error!',
                                                                            'Error: ' +
                                                                            data
                                                                            .message,
                                                                            'error'
                                                                        );
                                                                    }
                                                                })
                                                                .catch(error =>
                                                                    console
                                                                    .error(
                                                                        'Error deleting comment:',
                                                                        error));
                                                        }
                                                    });
                                                });
                                            });
                                    })
                                    .catch(error => console.error('Error fetching comments:', error));
                            } else {
                                Swal.fire(
                                    'Error!',
                                    'Error: ' + data.message,
                                    'error'
                                );
                            }
                        })
                        .catch(error => console.error('Error adding comment:', error));
                });
            }

            //fin funciones de comentarios

            //like en productos

            document.querySelectorAll('.like-button').forEach(button => {
                button.addEventListener('click', function(event) {
                    event.preventDefault();
                    const productId = this.getAttribute('data-product-id');
                    const heartIcon = this.querySelector('.corazon');

                    // Toggle 'liked' class on heart icon
                    heartIcon.classList.toggle('liked');

                    fetch(`/like/${productId}`, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector(
                                    'meta[name="csrf-token"]').getAttribute('content')
                            },
                            body: JSON.stringify({
                                _method: 'POST'
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                const likeCountElement = document.getElementById(
                                    `like-count-${productId}`);
                                likeCountElement.textContent = data.likes_count;
                            } else {
                                console.error('Error al actualizar el conteo de likes:', data
                                    .error);
                            }
                        })
                        .catch(error => {
                            console.error('Error en la solicitud fetch:', error);
                        });
                });
            });
            //fin funciones de like

            
        });

        document.getElementById('navbarDropdown').addEventListener('click', function() {
    fetch('/liked-products')
        .then(response => response.json())
        .then(data => {
            console.log(data); // Verifica la estructura de los datos aquí
            
            let container = document.getElementById('liked-products-container');
            container.innerHTML = ''; // Limpiamos el contenido anterior
            
            let viewAllContainer = document.getElementById('view-all-container');
            viewAllContainer.style.display = 'none'; // Ocultar el botón "Ver todos" inicialmente

            if (data.products.length > 0) {
                data.products.forEach(item => {
                    let product = item.product;

                    // Formatear el precio eliminando los decimales
                    let formattedPrice = Math.floor(parseFloat(product.price));

                    let productElement = document.createElement('div');
                    productElement.innerHTML = `
                        <div class="row mb-2 no-margin-row" style="color: #fff; align-items: center; background-color:#252527; border-radius:5px;">
                            <div class="col-1">
                                <a href="${product.url}"> <img src="${product.image_url}" alt="${product.title}" style="width: 50px; height:50px;" class=""></a>
                            </div>
                            <div class="col-5 text-start">
                               <a href="${product.url}" class="card-title-like " style="text-decoration:none; color:white;"><h5 class="m-3"><strong>${product.title}</strong></h5></a>
                               <a href="${product.userUrl}" class=" card-user-like" style="text-decoration:none;"><h6 class="m-3"><strong>la256studio</strong></h6></a>
                       </div>
                            <div class="col-5 text-end">
                              
                               <a href="#"
                                    class="btn btn-secondary btn-sm d-flex align-items-center justify-content-between comprar">
                                    <span class="d-flex align-items-center bg-primary text-white px-2 py-1 rounded"
                                        style="margin-right: 8px;">
                                        <strong>$ ${formattedPrice}</strong>
                                    </span>
                                    <span class="d-flex align-items-center">
                                        Agregar al carro
                                        <i class="fa-solid fa-cart-shopping shopping" style="margin-left: 8px;"></i>
                                    </span>
                                </a>
                            </div>
                             <div class="col-1 ">
                               <a href="#" class="" onclick="removeLike(${product.id}); return false;"> <i class="fa-solid fa-heart corazon liked"></i></a>
                               
                            </div>
                        </div>
                    `;
                    container.appendChild(productElement);
                });

                // Mostrar el botón "Ver todos" si hay más de 5 productos en total
                if (data.total > 4) {
                    viewAllContainer.style.display = 'block';
                }
            } else {
                container.innerHTML = '<p style="color: #fff;">No hay instrumentales que te gusten</p>';
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
});


function removeLike(productId) {
    // Cambia esta URL a la ruta que maneja la eliminación de "me gusta"
    const url = `/api/likes/${productId}`; 

    fetch(url, {
        method: 'DELETE',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') // Si usas Laravel
        }
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok.');
        }
        return response.json();
    })
    .then(data => {
        // Actualiza la interfaz de usuario aquí
        console.log('Like removed:', data);
        const likeCountElement = document.getElementById(`like-count-${productId}`);
        if (likeCountElement) {
            likeCountElement.textContent = data.likes_count;
        }
         // Quitar la clase 'liked' del ícono de corazón
         const heartIcon = document.querySelector(`#heart-icon-${productId}`);
        if (heartIcon) {
            heartIcon.classList.remove('liked');
        }
    })
    .catch(error => console.error('Error removing like:', error));
}
    </script>

</body>

</html>
