@extends('layouts.menu')


@section('title')
    - Perfil Usuario
@endsection

@section('css_before')
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <style>
        .altura {
            margin: 5%;
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



        .card-body a {
            text-decoration: none;

        }

        .card-body .card-title {
            color: white;
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


        .card-text {
            color: rgb(196, 195, 195);
        }

        .card-user {
            color: rgb(134, 130, 130);
        }

        .play-button {
            position: absolute;
            top: 90px;
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

        .listado-instrumentales {
            width: 80%;
            /* Ajusta el tamaño del div */
            max-width: 1200px;
            /* Tamaño máximo */
            margin: 20px 0;
            /* Espaciado vertical */
            padding: 20px;
            /* Espaciado interno */
            background-color: #1c1c1d;
            border-radius: 8px;
            /* Bordes redondeados (opcional) */
        }
    </style>
@endsection
@section('content')
    <div class="container altura">
        <div class="d-flex flex-column flex-md-row">
            <!-- Primer Card -->
            <div class="card m-3 custom-card-bg flex-shrink-0" style="width: 18rem;">
                <img src="{{ asset('img/mjimg.jpg') }}" class="card-img-top">

                <div class="card-body">
                    <h4 class="card-title text-center"><strong>{{ $user->username }}</strong></h4>
                    <h6 class="card-user d-flex justify-content-center">
                        <strong class="text-center">{{ $user->name }} {{ $user->lastname }}</strong>


                    </h6>
                    <h6 class="card-user d-flex justify-content-center">


                        <strong class="text-center">{{ $user->description }}</strong>
                    </h6>

                    <hr class="my-4" style="color: rgb(98, 99, 103);">
                    @auth
                        @if (Auth::id() !== $user->id)
                            <div class="d-flex justify-content-center">
                                <button id="follow-btn" class="btn btn-primary d-flex justify-content-center followed-id"
                                    data-followed-id="{{ $user->id }}">
                                    <span id="follow-btn-text">{{ $isFollowing ? 'Dejar de Seguir' : 'Seguir' }}</span>
                                </button>
                            </div>
                        @endif
                    @else
                        <div class="d-flex justify-content-center">
                            <button id="follow-btn" class="btn btn-primary d-flex justify-content-center" data-bs-toggle="modal"
                                data-bs-target="#followModal">
                                <span id="follow-btn-text">Seguir</span>
                            </button>
                        </div>
                    @endauth

                    <div class="row mb-3">
                        <div class="col-md-6 text-center">
                            <a href="#" data-bs-toggle="modal"
                                data-bs-target="#followedModal"
                                class="btn btn-secondary d-flex flex-column align-items-center btn-sm comprar">
                                <strong id="seguidores-count">{{ $seguidores }}</strong>
                                <span>Seguidores</span>
                            </a>
                        </div>
                        <div class="col-md-6 text-center">
                            <a href="#" data-bs-toggle="modal"
                                data-bs-target="#followerModal"
                                class="btn btn-secondary d-flex flex-column align-items-center btn-sm comprar">
                                <strong id="seguidos-count">{{ $seguidos }}</strong>
                                <span>Seguidos</span>
                            </a>
                        </div>
                    </div>
                    <div class=" mb-1">
                        <span class="card-text text-start "><strong>Instrumentales: </strong> {{ $countProducts }}</span>
                    </div>
                    <div class=" mb-1">
                        <span class="card-text md-3"><strong>Dirección:</strong> los olivos , 234, santiago</span>
                    </div>

                    <div class=" mb-1">

                        @php
                            $months = [
                                'Enero',
                                'Febrero',
                                'Marzo',
                                'Abril',
                                'Mayo',
                                'Junio',
                                'Julio',
                                'Agosto',
                                'Septiembre',
                                'Octubre',
                                'Noviembre',
                                'Diciembre',
                            ];
                            $date = $user->created_at;
                        @endphp

                        <span class="card-text">
                            Se unió el {{ $date->format('d') }} de {{ $months[$date->format('n') - 1] }} de
                            {{ $date->format('Y') }}
                        </span>
                    </div>
                    <br>
                    <br>
                    <div class="row mb-3">
                        <div class="col-12 d-flex align-items-center mb-2">
                            <i class="fa-solid fa-phone" style="font-size: 20px; margin-right: 10px;"></i>
                            <p class="mb-0 card-text text-wrap" style="word-break: break-all;">+56 9 56231127</p>
                        </div>
                        <div class="col-12 d-flex align-items-center mb-2">
                            <i class="fa-regular fa-envelope" style="font-size: 20px; margin-right: 10px;"></i>
                            <p class="mb-0 card-text text-wrap" style="word-break: break-all;">{{ $user->email }}</p>
                        </div>
                    </div>



                    <div class="row justify-content-center">
                        <div class="col-3 ">
                            <a href="#" class="text-center">
                                <i class="fa-brands fa-whatsapp play"></i>
                            </a>
                        </div>
                        <div class="col-3 ">
                            <a href="#" class="text-center">
                                <i class="fa-brands fa-facebook play"></i>
                            </a>
                        </div>
                        <div class="col-3 ">
                            <a href="#" class="text-center">
                                <i class="fa-brands fa-instagram play"></i>
                            </a>
                        </div>
                        <div class="col-3 ">
                            <a href="#" class="text-center">
                                <i class="fa-brands fa-youtube play"></i>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
            <div class="listado-instrumentales mt-3">
                <h4 class="text-center m-3" style="color: #eaeaea;"><strong>Instrumentales</strong></h4>
                <br>
                <br>
                <div class="row">
                    <!-- Card del producto -->
                    @if ($products->isEmpty())
                        <p class="text-center" style="color: #eaeaea;">No tiene Instrumentales para mostrar</p>
                    @else
                        @foreach ($products as $product)
                            <div class="col-md-4 mb-5 ">
                                <div class="card custom-card-bg text-center card-producto" style="width: 18rem;">
                                    <img src="{{ Storage::url($product->image_url) }}" class="card-img-top"
                                        alt="{{ $product->title }}">
                                    <button class="play-button" data-audio-src="{{ Storage::url($product->audio_url) }}"
                                        data-image-src="{{ Storage::url($product->image_url) }}"
                                        data-title="{{ $product->title }}" data-username="{{ $product->user_name }}"
                                        data-product-id="{{ $product->id }}"
                                        data-price="{{ number_format($product->price, 0, '.', '.') }}"
                                        data-liked="{{ $product->liked ? 'true' : 'false' }}">
                                        <i class="fas fa-play-circle fa-5x"></i>
                                    </button>

                                    <div class="card-body">
                                        <a href="{{ route('product.verProducto', ['id' => $product->id]) }}"
                                            class="card-title">
                                            <h4 class="card-title"><strong>{{ $product->title }}</strong></h4>
                                        </a>
                                        <span class="card-user"><strong>{{ $product->user_name }}</strong></span>
                                        <br>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <a href="#"
                                                    class="btn btn-secondary btn-sm d-flex align-items-center justify-content-between comprar">
                                                    <span
                                                        class="d-flex align-items-center bg-primary text-white px-2 py-1 rounded"
                                                        style="margin-right: 8px;">
                                                        <strong>$
                                                            {{ number_format($product->price, 0, '.', '.') }}</strong>
                                                    </span>
                                                    <span class="d-flex align-items-center">
                                                        Agregar al carro
                                                        <i class="fa-solid fa-cart-shopping shopping"
                                                            style="margin-left: 8px;"></i>
                                                    </span>
                                                </a>
                                            </div>
                                            <div class="col-3 text-center">
                                                @auth
                                                    <a href="#" class="like-button"
                                                        data-product-id="{{ $product->id }}">
                                                        <i class="fa-solid fa-heart corazon {{ $product->liked ? 'liked' : '' }}" id="heart-icon-{{ $product->id }}"></i>
                                                        <span class="text-center" style="color: white; white-space: nowrap;"
                                                            id="like-count-{{ $product->id }}">
                                                            {{ $product->likes_count }}
                                                        </span>
                                                    </a>
                                                @else
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#likeModal">
                                                        <i class="fa-solid fa-heart corazon"></i>
                                                        <span class="text-center" style="color: white; white-space: nowrap;">
                                                            {{ $product->likes_count }}
                                                        </span>
                                                    </a>
                                                @endauth

                                            </div>
                                            <div class="col-3 text-center">
                                                <a href="#" class="text-center">
                                                    <i class="fa-solid fa-circle-play play text-center"></i>
                                                    <span class="text-center"
                                                        style="color: white; white-space: nowrap;">14840</span>
                                                </a>
                                            </div>
                                            <div class="col-3 text-center">
                                                <a href="#" class="text-center" data-bs-toggle="modal"
                                                    data-bs-target="#commentsModal"
                                                    data-product-id="{{ $product->id }}">
                                                    <i class="fa-solid fa-message msm text-center"></i>
                                                    <span class="text-center" style="color: white;"
                                                        id="comment-count-{{ $product->id }}">{{ $product->comments_count }}</span>

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
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>


   

     <!-- Modal para mostrar seguidores -->
     <div class="modal fade" id="followedModal" tabindex="-1" aria-labelledby="followedModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content custom-card-bg">
                <div class="modal-header " style="border-color: #363b3f;">
                    <h5 class="modal-title" id="followedModalLabel" style="color: white;">Seguidores</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        style="filter: invert(100%) sepia(0%) saturate(100%) hue-rotate(0deg) brightness(90%) contrast(90%);"></button>
                </div>
                <div class="modal-body">

                    
                    <div class="mb-4 " style="max-height: 350px; overflow-y: auto;">

                        @foreach($seguidoresName as $followed)
                        <div class="d-flex align-items-center mb-2 p-2" style="background-color: #4f5254; width: 100%; border-radius: 5px;">
                            <!-- Imagen del seguidor -->
                            <img src="{{ asset('img/mjimg.jpg') }}" class="rounded-circle" style="width: 40px; height: 40px; margin-right: 10px;">
                            
                            <!-- Nombre del seguidor -->
                            <h6 class="card-text text-start mb-0">{{ $followed->username }}</h6>
                        
                            <!-- Botón de seguir -->
                            @auth
                                @if (Auth::id() !== $followed->id)
                                    <div class="ms-auto">
                                        <button class="btn btn-primary btn-sm follow-btn followed-id" data-followed-id="{{ $followed->id }}">
                                            <span class="follow-btn-text">{{ $followed->isFollowing ? 'Dejar de Seguir' : 'Seguir' }}</span>
                                        </button>
                                    </div>
                                @endif
                            @else
                                <div class="ms-auto">
                                    <button id="follow-btn" class="btn btn-primary d-flex justify-content-center btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#followModal">
                                        <span id="follow-btn-text">Seguir</span>
                                    </button>
                                </div>
                            @endauth
                        </div>
                    @endforeach
                    

                    </div>

                </div>
                <div class="modal-footer " style="border-color: #363b3f;">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
      <!-- Modal para mostrar seguidos -->
      <div class="modal fade" id="followerModal" tabindex="-1" aria-labelledby="followerModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content custom-card-bg">
                <div class="modal-header " style="border-color: #363b3f;">
                    <h5 class="modal-title" id="followerModalLabel" style="color: white;">Seguidos</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        style="filter: invert(100%) sepia(0%) saturate(100%) hue-rotate(0deg) brightness(90%) contrast(90%);"></button>
                </div>
                <div class="modal-body">

                    
                    <div class="mb-4 " style="max-height: 350px; overflow-y: auto;">

                        @foreach($seguidosName as $follower)
                        <div class="d-flex align-items-center mb-2 p-2" style="background-color: #4f5254; width: 100%; border-radius: 5px;">
                            <!-- Imagen del seguidor -->
                            <img src="{{ asset('img/mjimg.jpg') }}" class="rounded-circle" style="width: 40px; height: 40px; margin-right: 10px;">
                            
                            <!-- Nombre del seguidor -->
                            <h6 class="card-text text-start mb-0">{{ $follower->username }}</h6>
                        
                            <!-- Botón de seguir -->
                            @auth
                                @if (Auth::id() !== $follower->id)
                                    <div class="ms-auto">
                                        <button class="btn btn-primary btn-sm follow-btn followed-id" data-followed-id="{{ $follower->id }}">
                                            <span class="follow-btn-text">{{ $follower->isFollowing ? 'Dejar de Seguir' : 'Seguir' }}</span>
                                        </button>
                                    </div>
                                @endif
                            @else
                            <div class="ms-auto">
                                <button id="follow-btn" class="btn btn-primary d-flex justify-content-center btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#followModal">
                                    <span id="follow-btn-text">Seguir</span>
                                </button>
                            </div>
                            @endauth
                        </div>
                    @endforeach
                    

                    </div>

                </div>
                <div class="modal-footer " style="border-color: #363b3f;">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
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
            const userId = {{ $user->id }};
            updateFollowStats();

            $('#follow-btn').click(function() {
                var followedId = $(this).data('followed-id');
                var button = $(this);
                var buttonText = button.find('#follow-btn-text');

                $.ajax({
                    url: '{{ route('follow') }}', // Ruta al método del controlador
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        followed_id: followedId
                    },
                    success: function(response) {
                        updateFollowStats();
                        if (response.status === 'followed') {
                            buttonText.text('Dejar de Seguir');
                           
                        } else {
                            buttonText.text('Seguir');
                            
                        }
                    }
                });
            });

            // Asume que tienes el ID del usuario disponible en la vista

            function updateFollowStats() {
                $.ajax({
                    url: `/user/follow-stats/${userId}`,
                    method: 'GET',
                    success: function(response) {
                        $('#seguidores-count').text(response.seguidores);
                        $('#seguidos-count').text(response.seguidos);
                    },
                    error: function() {
                        console.error('No se pudieron actualizar las estadísticas de seguimiento.');
                    }
                });
            }

 // Maneja clics en los botones de seguimiento en el modal
 $(document).on('click', '.follow-btn', function() {
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
                updateFollowStats();
                // Actualiza el texto del botón según la respuesta del servidor
                if (response.status === 'followed') {
                    buttonText.text('Dejar de Seguir');
                    
                } else {
                    buttonText.text('Seguir');
                    
                }
            },
            error: function() {
                console.error('Error al actualizar el estado de seguimiento.');
            }
        });
    });


        });
    </script>
@endsection
