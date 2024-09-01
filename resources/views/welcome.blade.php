@extends('layouts.menu')


@section('title')
    - Inicio
@endsection

@section('css_before')
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

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
            background-color: #252527 !important;
            /* Color gris personalizado */
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.6);
            border-radius: 5px;
            /* Opcional: Suavizar los bordes */
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
            color: rgb(255, 255, 255);
            transition: opacity 0.3s ease;
            width: 70px;
            /* Ajusta el tamaño del círculo */
            height: 70px;
            background-color: rgba(63, 62, 62, 0.7);
            /* Color gris opaco */
            border-radius: 50%;
            /* Hacer que el contenedor sea un círculo */
            display: flex;
            justify-content: center;
            align-items: center;
            text-decoration: none;
        }

        .play-button:hover {
            color: rgb(255, 255, 255);
            /* Cambia el color al pasar el cursor */
            opacity: 1;
        }


        .card-body a {
            text-decoration: none;

        }

        .card-body .card-title {
            color: white;
        }

        .card-body a:hover {
            text-decoration: none;
            color: rgb(21, 146, 242);
        }

        .card-body a .card-title:hover {
            text-decoration: none;
            color: rgb(21, 146, 242);
        }

        .card-body i {
            font-size: 1.5rem;
            /* Tamaño ajustable */
            color: rgb(21, 146, 242);
            /* Color verde */
            transition: color 0.3s ease;
            margin: 0.5rem !important;
        }

        .card-body i:hover {
            color: rgb(19, 106, 172);
            /* Color verde más oscuro al pasar el cursor */
        }

        .card-body .btn {
            margin-bottom: 1rem;
            /* Separación entre el precio y los íconos */
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

        .corazon {
            color: rgb(158, 159, 161) !important;
        }

        .corazon:hover {
            color: rgb(221, 218, 218) !important;
        }

        .play {
            color: rgb(158, 159, 161) !important;
        }

        .play:hover {
            color: rgb(221, 218, 218) !important;
        }

        .shopping {
            color: rgb(169, 169, 171) !important;
        }

        .share {
            color: rgb(158, 159, 161) !important;
        }

        .share:hover {
            color: rgb(221, 218, 218) !important;
        }

        .msm {
            color: rgb(158, 159, 161) !important;
        }

        .msm:hover {
            color: rgb(221, 218, 218) !important;
        }

        .trash {
            color: rgb(158, 159, 161) !important;
        }

        .trash:hover {
            color: rgb(221, 218, 218) !important;
        }

        .comprar:hover {
            color: rgb(221, 218, 218) !important;
        }

        .card-text {
            color: rgb(196, 195, 195);
        }

        .card-user {
            color: rgb(134, 130, 130);
        }
      
    </style>
@endsection
@section('content')
    <!-- banner carrousel -->
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
        <div class="carousel-indicators">
            @foreach ($banners as $index => $banner)
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{ $index }}"
                    class="{{ $index == 0 ? 'active' : '' }}" aria-current="{{ $index == 0 ? 'true' : '' }}"
                    aria-label="Slide {{ $index + 1 }}"></button>
            @endforeach
        </div>
        <div class="carousel-inner">
            @foreach ($banners as $index => $banner)
                <div class="carousel-item {{ $index == 0 ? 'active' : '' }} position-relative">
                    <img src="{{ Storage::url($banner->image_url) }}" class="d-block w-100" alt="Slide {{ $index + 1 }}"
                        style="filter: brightness(50%);">
                    <div class="carousel-caption d-flex flex-column justify-content-center align-items-center h-100">
                        <h1>{{ $banner->title }}</h1>
                        <h5>{{ $banner->description }}</h5>
                        <a href="{{ $banner->url }}" class="btn btn-outline-primary">{{ $banner->name_button }}</a>
                    </div>
                </div>
            @endforeach
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
        @php
            $isActive = true;
        @endphp

        @foreach ($users->chunk(5) as $chunk)
            <div class="carousel-item {{ $isActive ? 'active' : '' }}">
                <div class="row no-margin-row justify-content-center">
                    @foreach ($chunk as $user)
                        <div class="card col-6 col-md-3 col-lg-2 m-3 custom-card-bg text-center" >
                            <a href="{{ route('perfil.perfil', ['id' => $user->id]) }}" class="card-title">
                            <img src="{{ asset('img/mjimg.jpg') }}" class="card-img-top" alt="{{ $user->name }}" style="height: 150px;">
                            </a>
                            <div class="card-body">
                                <a href="{{ route('perfil.perfil', ['id' => $user->id]) }}" class="card-title">
                                    <h4 class="card-title"><strong>{{ $user->username }}</strong></h4>
                                    <h6 class="card-user"><strong>{{ $user->name }} {{ $user->lastname }}</strong></h6>
                                </a>
                                <br>
                                   
                                @auth
                                @if (Auth::id() !== $user->id)
                                <div class="d-flex justify-content-center">
                                    <button class="btn btn-primary follow-btn d-flex justify-content-center w-100"
                                            data-followed-id="{{ $user->id }}">
                                        <span class="follow-btn-text">{{ $isFollowing[$user->id] ? 'Dejar de Seguir' : 'Seguir' }}</span>
                                    </button>
                                </div>
                            @endif
                            @else
                                <div class="d-flex justify-content-center">
                                    <button id="follow-btn" class="btn btn-primary d-flex justify-content-center w-100" data-bs-toggle="modal"
                                        data-bs-target="#followModal">
                                        <span id="follow-btn-text">Seguir</span>
                                    </button>
                                </div>
                            @endauth
                                    
                                
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            @php
                $isActive = false;
            @endphp
        @endforeach
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

            @foreach ($recentProducts as $recent)
                <!-- Card del producto -->
                <div class="card col-md-3 m-3 custom-card-bg text-center" style="width: 18rem;">
                    <img src="{{ Storage::url($recent->image_url) }}" class="card-img-top" alt="{{ $recent->title }}">
                    <button class="play-button" data-audio-src="{{ Storage::url($recent->audio_url) }}"
                        data-image-src="{{ Storage::url($recent->image_url) }}" 
                        data-title="{{ $recent->title }}"
                        data-username="{{ $recent->user_name }}" 
                        data-product-id="{{ $recent->id }}"
                        data-price="{{ number_format($recent->price, 0, '.', '.') }}"
                        data-liked="{{ $recent->liked ? 'true' : 'false' }}">
                        <i class="fas fa-play-circle fa-5x"></i>
                    </button>

                    <div class="card-body">
                        <a href="{{ route('product.verProducto', ['id' => $recent->id]) }}" class="card-title">
                            <h4 class="card-title"><strong>{{ $recent->title }}</strong></h4>
                        </a>
                        <a href="{{ route('perfil.perfil', ['id' => $recent->user_id]) }}" class="card-user"><strong>{{ $recent->user_name }}</strong></a>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <a href="#"
                                    class="btn btn-secondary btn-sm d-flex align-items-center justify-content-between comprar">
                                    <span class="d-flex align-items-center bg-primary text-white px-2 py-1 rounded"
                                        style="margin-right: 8px;">
                                        <strong>$ {{ number_format($recent->price, 0, '.', '.') }}</strong>
                                    </span>
                                    <span class="d-flex align-items-center">
                                        Agregar al carro
                                        <i class="fa-solid fa-cart-shopping shopping" style="margin-left: 8px;"></i>
                                    </span>
                                </a>
                            </div>
                            <div class="col-3 text-center">
                            @auth
                                <a href="#" class="like-button" data-product-id="{{ $recent->id }}">
                                    <i class="fa-solid fa-heart corazon {{ $recent->liked ? 'liked' : '' }}" id="heart-icon-{{ $recent->id }}"></i>
                                    <span class="text-center" style="color: white; white-space: nowrap;" id="like-count-{{ $recent->id }}">
                                        {{ $recent->likes_count }}
                                    </span>
                                </a>
                            @else
                                <a href="#" data-bs-toggle="modal" data-bs-target="#likeModal">
                                    <i class="fa-solid fa-heart corazon"></i>
                                    <span class="text-center" style="color: white; white-space: nowrap;">
                                        {{ $recent->likes_count }}
                                    </span>
                                </a>
                            @endauth
                               
                            </div>
                            <div class="col-3 text-center">
                                <a href="#" class="text-center">
                                    <i class="fa-solid fa-circle-play play text-center"></i>
                                    <span class="text-center" style="color: white; white-space: nowrap;">14840</span>
                                </a>
                            </div>
                            <div class="col-3 text-center">
                                <a href="#" class="text-center" data-bs-toggle="modal"
                                    data-bs-target="#commentsModal" data-product-id="{{ $recent->id }}">
                                    <i class="fa-solid fa-message msm text-center"></i>
                                    <span class="text-center" style="color: white;"
                                        id="comment-count-{{ $recent->id }}">{{ $recent->comments_count }}</span>

                                </a>

                            </div>
                            <div class="col-3 text-center">
                                <a href="#" class="text-center">
                                    <i class="fa-solid fa-share text-center share"></i>
                                    <span class="text-center" style="color: white;">3330</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="col-md-12 text-center">
                <button class="btn btn-outline-primary m-5">Ver más recientes</button>
            </div>

            <h3 class="titulosh3 m-5 text-center">Más populares</h3>

            <div class="col-md-12 text-center">
                <button class="btn btn-outline-primary m-5">Ver más populares</button>
            </div>
            <h3 class="titulosh3 m-5 text-center">Seguidos</h3>

            <div class="col-md-12 text-center">
                <button class="btn btn-outline-primary m-5">Ver más Seguidos</button>
            </div>

        </div>
    </div>



 
@endsection
@section('js_after')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <script>
  $(document).ready(function() {
    $('.follow-btn').click(function() {
        var followedId = $(this).data('followed-id');
        var button = $(this);
        var buttonText = button.find('.follow-btn-text');

        $.ajax({
            url: '{{ route('follow') }}', // Ruta al método del controlador
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                followed_id: followedId
            },
            success: function(response) {
                if (response.status === 'followed') {
                    buttonText.text('Dejar de Seguir');
                } else {
                    buttonText.text('Seguir');
                }
            }
        });
    });
});


    </script>
@endsection
