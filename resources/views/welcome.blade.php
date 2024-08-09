@extends('layouts.menu')


@section('title')
    - Inicio
@endsection

@section('css_before')
    <style>
        .carousel-item img {
            width: 100%;
            height: 600px;
            /* Altura fija */
            object-fit: cover;
            /* Ajusta la imagen para cubrir el contenedor sin deformarse */
        }

        .card-img-top {
            width: 100%;
            height: 200px;
            /* Mantiene la proporción de la imagen */
            object-fit: cover;
            /* Cubre el área del contenedor sin deformar la imagen */
        }

        .custom-card-bg {
            background-color: #e4e3e3 !important;
            /* Color gris personalizado */
            box-shadow: 0 2px 6px 0 rgb(218 218 253 / 65%), 0 2px 6px 0 rgb(206 206 238 / 54%);
        }

        .titulosh3 {
            color: #eaeaea;
        }

        .play-button {
            position: absolute;
            top: 20%;
            /* Ajustado a 20% */
            left: 50%;
            transform: translate(-50%, -50%);
            opacity: 0.7;
            color: rgb(62, 62, 62);
            transition: opacity 0.3s ease;
            border: 4px solid #11c511;
            /* Borde verde del icono */
            border-radius: 50%;
            /* Hacer que el borde sea circular */
            padding: 4px;
            /* Espacio entre el borde y el icono */
            background-color: rgba(0, 0, 0, 0.3);
            /* Fondo transparente para el borde */
        }

        .play-button:hover {
            color: rgb(255, 255, 255);
            /* Cambia el color al pasar el cursor */
            opacity: 1;
        }


        .card-body a {
            text-decoration: none;
            color: black;
        }

        .card-body a:hover {
            text-decoration: none;
            color: #11c511;
        }

        .card-body i {
            font-size: 1.5rem;
            /* Tamaño ajustable */
            color: #11c511;
            /* Color verde */
            transition: color 0.3s ease;
            margin: 0.5rem !important;
        }

        .card-body i:hover {
            color: rgb(4, 137, 4);
            /* Color verde más oscuro al pasar el cursor */
        }

        .card-body .btn {
            margin-bottom: 1rem;
            /* Separación entre el precio y los íconos */
        }

        .precio {
            color: white !important;
        }

        .nombre-usuario {
            color: rgb(203, 203, 203) !important;
        }

        .user-destacado {
            text-decoration: none;
            position: relative;
            display: inline-block;

        }

        .user-destacado img {
            transition: opacity 0.3s ease;
            box-shadow: 0 2px 6px 0 rgb(218 218 253 / 65%), 0 2px 6px 0 rgb(206 206 238 / 54%);
        }

        .user-destacado:hover img {
            opacity: 0.5;
            /* Ajusta el valor para oscurecer más o menos */
        }

        .user-destacado p {
            transition: color 0.3s ease;
        }

        .no-margin-row {
            margin-left: 0;
            margin-right: 0;
        }

        .no-margin-row>.col-md-3 {
            padding-left: 0;
            padding-right: 0;
        }
    </style>
@endsection
@section('content')
    <!--banner carrousel-->
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('img/studio1.jpg') }}" class="d-block w-100" alt="Slide 1">
                <div class="carousel-caption d-none d-md-block">
                    <h5>First Slide Label</h5>
                    <p>Some representative placeholder content for the first slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('img/studio2.jpg') }}" class="d-block w-100" alt="Slide 2">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Second Slide Label</h5>
                    <p>Some representative placeholder content for the second slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('img/imagen3.jpeg') }}" class="d-block w-100" alt="Slide 3">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Third Slide Label</h5>
                    <p>Some representative placeholder content for the third slide.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <br>
    <div class="container">
        <h3 class="titulosh3 m-5 text-center">Usuarios Destacados</h3>
        <div id="carouselExampleControls" class="carousel slide">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="row flex-wrap justify-content-around">
                        <div class="text-center mb-3 col-md-2">
                            <a href="{{ route('perfil.perfil') }}" class="user-destacado">
                                <img src="{{ asset('img/mjimg.jpg') }}" class="img-fluid rounded-circle" alt="Imagen 1"
                                    style="width: 100px; height: 100px; object-fit: cover;">
                                <p class="mt-2 nombre-usuario">easdas sad asd asd as das d asd a</p>
                            </a>

                        </div>
                        <div class="text-center mb-3 col-md-2">
                            <a href="http://" class="user-destacado">
                                <img src="{{ asset('img/mjimg.jpg') }}" class="img-fluid rounded-circle" alt="Imagen 1"
                                    style="width: 100px; height: 100px; object-fit: cover;">
                                <p class="mt-2 nombre-usuario">Imagen asd asd as d asdasdasdasdasdasdasd d as d asdadasdasd
                                </p>
                            </a>

                        </div>
                        <div class="text-center mb-3 col-md-2">
                            <a href="http://" class="user-destacado">
                                <img src="{{ asset('img/mjimg.jpg') }}" class="img-fluid rounded-circle" alt="Imagen 1"
                                    style="width: 100px; height: 100px; object-fit: cover;">
                                <p class="mt-2 nombre-usuario">Imagen 1</p>
                            </a>

                        </div>
                        <div class="text-center mb-3 col-md-2">
                            <a href="http://" class="user-destacado">
                                <img src="{{ asset('img/mjimg.jpg') }}" class="img-fluid rounded-circle" alt="Imagen 1"
                                    style="width: 100px; height: 100px; object-fit: cover;">
                                <p class="mt-2 nombre-usuario">Imagen 1</p>
                            </a>

                        </div>
                        <div class="text-center mb-3 col-md-2">
                            <a href="http://" class="user-destacado">
                                <img src="{{ asset('img/mjimg.jpg') }}" class="img-fluid rounded-circle" alt="Imagen 1"
                                    style="width: 100px; height: 100px; object-fit: cover;">
                                <p class="mt-2 nombre-usuario">Imagen 1</p>
                            </a>

                        </div>
                        <div class="text-center mb-3 col-md-2">
                            <a href="http://" class="user-destacado">
                                <img src="{{ asset('img/mjimg.jpg') }}" class="img-fluid rounded-circle" alt="Imagen 1"
                                    style="width: 100px; height: 100px; object-fit: cover;">
                                <p class="mt-2 nombre-usuario">Imagen 1</p>
                            </a>

                        </div>

                        <!-- Agrega más imágenes según sea necesario -->
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row flex-wrap justify-content-around">
                        <div class="text-center mb-3 col-md-2">
                            <a href="http://" class="user-destacado">
                                <img src="{{ asset('img/mjimg.jpg') }}" class="img-fluid rounded-circle" alt="Imagen 1"
                                    style="width: 100px; height: 100px; object-fit: cover;">
                                <p class="mt-2 nombre-usuario">easdas sad asd asd as das d asd a</p>
                            </a>

                        </div>
                        <div class="text-center mb-3 col-md-2">
                            <a href="http://" class="user-destacado">
                                <img src="{{ asset('img/mjimg.jpg') }}" class="img-fluid rounded-circle" alt="Imagen 1"
                                    style="width: 100px; height: 100px; object-fit: cover;">
                                <p class="mt-2 nombre-usuario">Imagen asd asd as d asdasdasdasdasdasdasd d as d asdadasdasd
                                </p>
                            </a>

                        </div>
                        <div class="text-center mb-3 col-md-2">
                            <a href="http://" class="user-destacado">
                                <img src="{{ asset('img/mjimg.jpg') }}" class="img-fluid rounded-circle" alt="Imagen 1"
                                    style="width: 100px; height: 100px; object-fit: cover;">
                                <p class="mt-2 nombre-usuario">Imagen 1</p>
                            </a>

                        </div>
                        <div class="text-center mb-3 col-md-2">
                            <a href="http://" class="user-destacado">
                                <img src="{{ asset('img/mjimg.jpg') }}" class="img-fluid rounded-circle" alt="Imagen 1"
                                    style="width: 100px; height: 100px; object-fit: cover;">
                                <p class="mt-2 nombre-usuario">Imagen 1</p>
                            </a>

                        </div>
                        <div class="text-center mb-3 col-md-2">
                            <a href="http://" class="user-destacado">
                                <img src="{{ asset('img/mjimg.jpg') }}" class="img-fluid rounded-circle" alt="Imagen 1"
                                    style="width: 100px; height: 100px; object-fit: cover;">
                                <p class="mt-2 nombre-usuario">Imagen 1</p>
                            </a>

                        </div>
                        <div class="text-center mb-3 col-md-2">
                            <a href="http://" class="user-destacado">
                                <img src="{{ asset('img/mjimg.jpg') }}" class="img-fluid rounded-circle" alt="Imagen 1"
                                    style="width: 100px; height: 100px; object-fit: cover;">
                                <p class="mt-2 nombre-usuario">Imagen 1</p>
                            </a>

                        </div>

                        <!-- Agrega más imágenes según sea necesario -->
                    </div>
                </div>

            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="prev"
                style="width: 2%; left: 0; position: absolute; top: 50%; transform: translateY(-50%);">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="next"
                style="width: 2%; right: 0; position: absolute; top: 50%; transform: translateY(-50%);">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>


        <div class="row no-margin-row justify-content-center">
            <h3 class="titulosh3 m-5 text-center">Más recientes</h3>
            <div class="card col-md-3 m-3 custom-card-bg" style="width: 18rem;">
                <img src="{{ asset('img/mjimg.jpg') }}" class="card-img-top" alt="...">
                <a href="#" class="play-button"> <i class="fas fa-play-circle fa-5x"></i>
                </a>
                <div class="card-body">
                    <a href="#" class="">
                        <h4 class="card-title"><strong>Asesina</strong></h4>
                    </a>
                    <a href="#" class="card-title"><strong>la 256 studio</strong></a>
                    <br>
                    <span class="card-text">type polima westcost perreo regaetoon.</span>
                    <br>
                    <span class="card-text"><strong>bpm:</strong> 120</span>
                    <br>
                    <span class="card-text"><strong>key:</strong> Cb mayor</span>
                    <br>
                    <span class="card-text"><strong>Licencia:</strong> Exclusiva</span>
                    <hr class="my-3">
                    <a href="#" class="btn btn-primary btn-sm precio"><strong>$
                            225.000</strong></a>&nbsp;&nbsp;&nbsp;
                    <a href="#"><i class="fa-solid fa-bag-shopping"></i></a>
                    <a href="#"><i class="fa-solid fa-heart"></i></a>
                    <a href="#"><i class="fa-solid fa-circle-play"></i></a>
                </div>
            </div>
            <div class="card col-md-3 m-3 custom-card-bg" style="width: 18rem;">
                <img src="{{ asset('img/marcianeke1.jpg') }}" class="card-img-top" alt="...">
                <a href="#" class="play-button"> <i class="fas fa-play-circle fa-5x"></i>
                </a>
                <div class="card-body">
                    <a href="#" class="">
                        <h4 class="card-title"><strong>dimelo mamacita</strong></h4>
                    </a>
                    <a href="#" class="card-title"><strong>la 256 studio</strong></a>
                    <br>
                    <span class="card-text">type polima westcost perreo regaetoon.</span>
                    <br>
                    <span class="card-text"><strong>bpm:</strong> 120</span>
                    <br>
                    <span class="card-text"><strong>key:</strong> Cb mayor</span>
                    <br>
                    <span class="card-text"><strong>Licencia:</strong> Exclusiva</span>
                    <hr class="my-3">
                    <a href="#" class="btn btn-primary btn-sm precio"><strong>$
                            225.000</strong></a>&nbsp;&nbsp;&nbsp;
                    <a href="#"><i class="fa-solid fa-bag-shopping"></i></a>
                    <a href="#"><i class="fa-solid fa-heart"></i></a>
                    <a href="#"><i class="fa-solid fa-circle-play"></i></a>
                </div>
            </div>
            <div class="card col-md-3 m-3 custom-card-bg" style="width: 18rem;">
                <img src="{{ asset('img/polima1.jpg') }}" class="card-img-top" alt="...">
                <a href="#" class="play-button"> <i class="fas fa-play-circle fa-5x"></i>
                </a>
                <div class="card-body">
                    <a href="#" class="">
                        <h4 class="card-title"><strong>sutra ireal</strong></h4>
                    </a>
                    <a href="#" class="card-title"><strong>saturno studio</strong></a>
                    <br>
                    <span class="card-text">type polima westcost perreo regaetoon.</span>
                    <br>
                    <span class="card-text"><strong>bpm:</strong> 120</span>
                    <br>
                    <span class="card-text"><strong>key:</strong> Cb mayor</span>
                    <br>
                    <span class="card-text"><strong>Licencia:</strong> Exclusiva</span>
                    <hr class="my-3">
                    <a href="#" class="btn btn-primary btn-sm precio"><strong>$
                            225.000</strong></a>&nbsp;&nbsp;&nbsp;
                    <a href="#"><i class="fa-solid fa-bag-shopping"></i></a>
                    <a href="#"><i class="fa-solid fa-heart"></i></a>
                    <a href="#"><i class="fa-solid fa-circle-play"></i></a>
                </div>
            </div>
            <div class="card col-md-3 m-3 custom-card-bg" style="width: 18rem;">
                <img src="{{ asset('img/mj2.jpg') }}" class="card-img-top" alt="...">
                <a href="#" class="play-button"> <i class="fas fa-play-circle fa-5x"></i>
                </a>
                <div class="card-body">
                    <a href="#" class="">
                        <h4 class="card-title"><strong>hora del party</strong></h4>
                    </a>
                    <a href="#" class="card-title"><strong>la 256 studio</strong></a>
                    <br>
                    <span class="card-text">type polima westcost perreo regaetoon.</span>
                    <br>
                    <span class="card-text"><strong>bpm:</strong> 120</span>
                    <br>
                    <span class="card-text"><strong>key:</strong> Cb mayor</span>
                    <br>
                    <span class="card-text"><strong>Licencia:</strong> Exclusiva</span>
                    <hr class="my-3">
                    <a href="#" class="btn btn-primary btn-sm precio"><strong>$
                            225.000</strong></a>&nbsp;&nbsp;&nbsp;
                    <a href="#"><i class="fa-solid fa-bag-shopping"></i></a>
                    <a href="#"><i class="fa-solid fa-heart"></i></a>
                    <a href="#"><i class="fa-solid fa-circle-play"></i></a>
                </div>
            </div>
            <div class="card col-md-3 m-3 custom-card-bg" style="width: 18rem;">
                <img src="{{ asset('img/mj2.jpg') }}" class="card-img-top" alt="...">
                <a href="#" class="play-button"> <i class="fas fa-play-circle fa-5x"></i>
                </a>
                <div class="card-body">
                    <a href="#" class="">
                        <h4 class="card-title"><strong>hora del party</strong></h4>
                    </a>
                    <a href="#" class="card-title"><strong>la 256 studio</strong></a>
                    <br>
                    <span class="card-text">type polima westcost perreo regaetoon.</span>
                    <br>
                    <span class="card-text"><strong>bpm:</strong> 120</span>
                    <br>
                    <span class="card-text"><strong>key:</strong> Cb mayor</span>
                    <br>
                    <span class="card-text"><strong>Licencia:</strong> Exclusiva</span>
                    <hr class="my-3">
                    <a href="#" class="btn btn-primary btn-sm precio"><strong>$
                            225.000</strong></a>&nbsp;&nbsp;&nbsp;
                    <a href="#"><i class="fa-solid fa-bag-shopping"></i></a>
                    <a href="#"><i class="fa-solid fa-heart"></i></a>
                    <a href="#"><i class="fa-solid fa-circle-play"></i></a>
                </div>
            </div>
            <div class="card col-md-3 m-3 custom-card-bg" style="width: 18rem;">
                <img src="{{ asset('img/marcianeke1.jpg') }}" class="card-img-top" alt="...">
                <a href="#" class="play-button"> <i class="fas fa-play-circle fa-5x"></i>
                </a>
                <div class="card-body">
                    <a href="#" class="">
                        <h4 class="card-title"><strong>dimelo mamacita</strong></h4>
                    </a>
                    <a href="#" class="card-title"><strong>la 256 studio</strong></a>
                    <br>
                    <span class="card-text">type polima westcost perreo regaetoon.</span>
                    <br>
                    <span class="card-text"><strong>bpm:</strong> 120</span>
                    <br>
                    <span class="card-text"><strong>key:</strong> Cb mayor</span>
                    <br>
                    <span class="card-text"><strong>Licencia:</strong> Exclusiva</span>
                    <hr class="my-3">
                    <a href="#" class="btn btn-primary btn-sm precio"><strong>$
                            225.000</strong></a>&nbsp;&nbsp;&nbsp;
                    <a href="#"><i class="fa-solid fa-bag-shopping"></i></a>
                    <a href="#"><i class="fa-solid fa-heart"></i></a>
                    <a href="#"><i class="fa-solid fa-circle-play"></i></a>
                </div>
            </div>
            <div class="card col-md-3 m-3 custom-card-bg" style="width: 18rem;">
                <img src="{{ asset('img/polima1.jpg') }}" class="card-img-top" alt="...">
                <a href="#" class="play-button"> <i class="fas fa-play-circle fa-5x"></i>
                </a>
                <div class="card-body">
                    <a href="#" class="">
                        <h4 class="card-title"><strong>sutra ireal</strong></h4>
                    </a>
                    <a href="#" class="card-title"><strong>saturno studio</strong></a>
                    <br>
                    <span class="card-text">type polima westcost perreo regaetoon.</span>
                    <br>
                    <span class="card-text"><strong>bpm:</strong> 120</span>
                    <br>
                    <span class="card-text"><strong>key:</strong> Cb mayor</span>
                    <br>
                    <span class="card-text"><strong>Licencia:</strong> Exclusiva</span>
                    <hr class="my-3">
                    <a href="#" class="btn btn-primary btn-sm precio"><strong>$
                            225.000</strong></a>&nbsp;&nbsp;&nbsp;
                    <a href="#"><i class="fa-solid fa-bag-shopping"></i></a>
                    <a href="#"><i class="fa-solid fa-heart"></i></a>
                    <a href="#"><i class="fa-solid fa-circle-play"></i></a>
                </div>
            </div>
            <div class="card col-md-3 m-3 custom-card-bg" style="width: 18rem;">
                <img src="{{ asset('img/gabo1.jpg') }}" class="card-img-top" alt="...">
                <a href="#" class="play-button"> <i class="fas fa-play-circle fa-5x"></i>
                </a>
                <div class="card-body">
                    <a href="#" class="">
                        <h4 class="card-title"><strong>cosa linda</strong></h4>
                    </a>
                    <a href="#" class="card-title"><strong>saturno studio</strong></a>
                    <br>
                    <span class="card-text">type polima westcost perreo regaetoon.</span>
                    <br>
                    <span class="card-text"><strong>bpm:</strong> 120</span>
                    <br>
                    <span class="card-text"><strong>key:</strong> Cb mayor</span>
                    <br>
                    <span class="card-text"><strong>Licencia:</strong> Exclusiva</span>
                    <hr class="my-3">
                    <a href="#" class="btn btn-primary btn-sm precio"><strong>$
                            225.000</strong></a>&nbsp;&nbsp;&nbsp;
                    <a href="#"><i class="fa-solid fa-bag-shopping"></i></a>
                    <a href="#"><i class="fa-solid fa-heart"></i></a>
                    <a href="#"><i class="fa-solid fa-circle-play"></i></a>
                </div>
            </div>
            <div class="col-md-12 text-center">
                <button class="btn btn-outline-success m-5">Ver más recientes</button>
            </div>

            <h3 class="titulosh3 m-5 text-center">Más populares</h3>

            <div class="card col-md-3 m-3 custom-card-bg" style="width: 18rem;">
                <img src="{{ asset('img/mjimg.jpg') }}" class="card-img-top" alt="...">
                <a href="#" class="play-button"> <i class="fas fa-play-circle fa-5x"></i>
                </a>
                <div class="card-body">
                    <a href="#" class="">
                        <h4 class="card-title"><strong>Asesina</strong></h4>
                    </a>
                    <a href="#" class="card-title"><strong>la 256 studio</strong></a>
                    <br>
                    <span class="card-text">type polima westcost perreo regaetoon.</span>
                    <br>
                    <span class="card-text"><strong>bpm:</strong> 120</span>
                    <br>
                    <span class="card-text"><strong>key:</strong> Cb mayor</span>
                    <br>
                    <span class="card-text"><strong>Licencia:</strong> Exclusiva</span>
                    <hr class="my-3">
                    <a href="#" class="btn btn-primary btn-sm precio"><strong>$
                            225.000</strong></a>&nbsp;&nbsp;&nbsp;
                    <a href="#"><i class="fa-solid fa-bag-shopping"></i></a>
                    <a href="#"><i class="fa-solid fa-heart"></i></a>
                    <a href="#"><i class="fa-solid fa-circle-play"></i></a>
                </div>
            </div>
            <div class="card col-md-3 m-3 custom-card-bg" style="width: 18rem;">
                <img src="{{ asset('img/gabo1.jpg') }}" class="card-img-top" alt="...">
                <a href="#" class="play-button"> <i class="fas fa-play-circle fa-5x"></i>
                </a>
                <div class="card-body">
                    <a href="#" class="">
                        <h4 class="card-title"><strong>cosa linda</strong></h4>
                    </a>
                    <a href="#" class="card-title"><strong>saturno studio</strong></a>
                    <br>
                    <span class="card-text">type polima westcost perreo regaetoon.</span>
                    <br>
                    <span class="card-text"><strong>bpm:</strong> 120</span>
                    <br>
                    <span class="card-text"><strong>key:</strong> Cb mayor</span>
                    <br>
                    <span class="card-text"><strong>Licencia:</strong> Exclusiva</span>
                    <hr class="my-3">
                    <a href="#" class="btn btn-primary btn-sm precio"><strong>$
                            225.000</strong></a>&nbsp;&nbsp;&nbsp;
                    <a href="#"><i class="fa-solid fa-bag-shopping"></i></a>
                    <a href="#"><i class="fa-solid fa-heart"></i></a>
                    <a href="#"><i class="fa-solid fa-circle-play"></i></a>
                </div>
            </div>
            <div class="card col-md-3 m-3 custom-card-bg" style="width: 18rem;">
                <img src="{{ asset('img/mj2.jpg') }}" class="card-img-top" alt="...">
                <a href="#" class="play-button"> <i class="fas fa-play-circle fa-5x"></i>
                </a>
                <div class="card-body">
                    <a href="#" class="">
                        <h4 class="card-title"><strong>hora del party</strong></h4>
                    </a>
                    <a href="#" class="card-title"><strong>la 256 studio</strong></a>
                    <br>
                    <span class="card-text">type polima westcost perreo regaetoon.</span>
                    <br>
                    <span class="card-text"><strong>bpm:</strong> 120</span>
                    <br>
                    <span class="card-text"><strong>key:</strong> Cb mayor</span>
                    <br>
                    <span class="card-text"><strong>Licencia:</strong> Exclusiva</span>
                    <hr class="my-3">
                    <a href="#" class="btn btn-primary btn-sm precio"><strong>$
                            225.000</strong></a>&nbsp;&nbsp;&nbsp;
                    <a href="#"><i class="fa-solid fa-bag-shopping"></i></a>
                    <a href="#"><i class="fa-solid fa-heart"></i></a>
                    <a href="#"><i class="fa-solid fa-circle-play"></i></a>
                </div>
            </div>
            <div class="card col-md-3 m-3 custom-card-bg" style="width: 18rem;">
                <img src="{{ asset('img/polima1.jpg') }}" class="card-img-top" alt="...">
                <a href="#" class="play-button"> <i class="fas fa-play-circle fa-5x"></i>
                </a>
                <div class="card-body">
                    <a href="#" class="">
                        <h4 class="card-title"><strong>sutra ireal</strong></h4>
                    </a>
                    <a href="#" class="card-title"><strong>saturno studio</strong></a>
                    <br>
                    <span class="card-text">type polima westcost perreo regaetoon.</span>
                    <br>
                    <span class="card-text"><strong>bpm:</strong> 120</span>
                    <br>
                    <span class="card-text"><strong>key:</strong> Cb mayor</span>
                    <br>
                    <span class="card-text"><strong>Licencia:</strong> Exclusiva</span>
                    <hr class="my-3">
                    <a href="#" class="btn btn-primary btn-sm precio"><strong>$
                            225.000</strong></a>&nbsp;&nbsp;&nbsp;
                    <a href="#"><i class="fa-solid fa-bag-shopping"></i></a>
                    <a href="#"><i class="fa-solid fa-heart"></i></a>
                    <a href="#"><i class="fa-solid fa-circle-play"></i></a>
                </div>
            </div>
            <div class="card col-md-3 m-3 custom-card-bg" style="width: 18rem;">
                <img src="{{ asset('img/gabo1.jpg') }}" class="card-img-top" alt="...">
                <a href="#" class="play-button"> <i class="fas fa-play-circle fa-5x"></i>
                </a>
                <div class="card-body">
                    <a href="#" class="">
                        <h4 class="card-title"><strong>cosa linda</strong></h4>
                    </a>
                    <a href="#" class="card-title"><strong>saturno studio</strong></a>
                    <br>
                    <span class="card-text">type polima westcost perreo regaetoon.</span>
                    <br>
                    <span class="card-text"><strong>bpm:</strong> 120</span>
                    <br>
                    <span class="card-text"><strong>key:</strong> Cb mayor</span>
                    <br>
                    <span class="card-text"><strong>Licencia:</strong> Exclusiva</span>
                    <hr class="my-3">
                    <a href="#" class="btn btn-primary btn-sm precio"><strong>$
                            225.000</strong></a>&nbsp;&nbsp;&nbsp;
                    <a href="#"><i class="fa-solid fa-bag-shopping"></i></a>
                    <a href="#"><i class="fa-solid fa-heart"></i></a>
                    <a href="#"><i class="fa-solid fa-circle-play"></i></a>
                </div>
            </div>
            <div class="card col-md-3 m-3 custom-card-bg" style="width: 18rem;">
                <img src="{{ asset('img/marcianeke1.jpg') }}" class="card-img-top" alt="...">
                <a href="#" class="play-button"> <i class="fas fa-play-circle fa-5x"></i>
                </a>
                <div class="card-body">
                    <a href="#" class="">
                        <h4 class="card-title"><strong>dimelo mamacita</strong></h4>
                    </a>
                    <a href="#" class="card-title"><strong>la 256 studio</strong></a>
                    <br>
                    <span class="card-text">type polima westcost perreo regaetoon.</span>
                    <br>
                    <span class="card-text"><strong>bpm:</strong> 120</span>
                    <br>
                    <span class="card-text"><strong>key:</strong> Cb mayor</span>
                    <br>
                    <span class="card-text"><strong>Licencia:</strong> Exclusiva</span>
                    <hr class="my-3">
                    <a href="#" class="btn btn-primary btn-sm precio"><strong>$
                            225.000</strong></a>&nbsp;&nbsp;&nbsp;
                    <a href="#"><i class="fa-solid fa-bag-shopping"></i></a>
                    <a href="#"><i class="fa-solid fa-heart"></i></a>
                    <a href="#"><i class="fa-solid fa-circle-play"></i></a>
                </div>
            </div>
            <div class="card col-md-3 m-3 custom-card-bg" style="width: 18rem;">
                <img src="{{ asset('img/mj2.jpg') }}" class="card-img-top" alt="...">
                <a href="#" class="play-button"> <i class="fas fa-play-circle fa-5x"></i>
                </a>
                <div class="card-body">
                    <a href="#" class="">
                        <h4 class="card-title"><strong>hora del party</strong></h4>
                    </a>
                    <a href="#" class="card-title"><strong>la 256 studio</strong></a>
                    <br>
                    <span class="card-text">type polima westcost perreo regaetoon.</span>
                    <br>
                    <span class="card-text"><strong>bpm:</strong> 120</span>
                    <br>
                    <span class="card-text"><strong>key:</strong> Cb mayor</span>
                    <br>
                    <span class="card-text"><strong>Licencia:</strong> Exclusiva</span>
                    <hr class="my-3">
                    <a href="#" class="btn btn-primary btn-sm precio"><strong>$
                            225.000</strong></a>&nbsp;&nbsp;&nbsp;
                    <a href="#"><i class="fa-solid fa-bag-shopping"></i></a>
                    <a href="#"><i class="fa-solid fa-heart"></i></a>
                    <a href="#"><i class="fa-solid fa-circle-play"></i></a>
                </div>
            </div>
            <div class="card col-md-3 m-3 custom-card-bg" style="width: 18rem;">
                <img src="{{ asset('img/mjimg.jpg') }}" class="card-img-top" alt="...">
                <a href="#" class="play-button"> <i class="fas fa-play-circle fa-5x"></i>
                </a>
                <div class="card-body">
                    <a href="#" class="">
                        <h4 class="card-title"><strong>hora del party</strong></h4>
                    </a>
                    <a href="#" class="card-title"><strong>la 256 studio</strong></a>
                    <br>
                    <span class="card-text">type polima westcost perreo regaetoon.</span>
                    <br>
                    <span class="card-text"><strong>bpm:</strong> 120</span>
                    <br>
                    <span class="card-text"><strong>key:</strong> Cb mayor</span>
                    <br>
                    <span class="card-text"><strong>Licencia:</strong>No Exclusiva</span>
                    <hr class="my-3">
                    <a href="#" class="btn btn-primary btn-sm precio"><strong>$
                            225.000</strong></a>&nbsp;&nbsp;&nbsp;
                    <a href="#"><i class="fa-solid fa-bag-shopping"></i></a>
                    <a href="#"><i class="fa-solid fa-heart"></i></a>
                    <a href="#"><i class="fa-solid fa-circle-play"></i></a>
                </div>
            </div>
            <div class="col-md-12 text-center">
                <button class="btn btn-outline-success m-5">Ver más populares</button>
            </div>


        </div>
    </div>
@endsection
@section('js_after')
@endsection
