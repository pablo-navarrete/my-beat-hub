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
<div class="container altura">
    <div class="d-flex flex-column flex-md-row">
        <!-- Primer Card -->
        <div class="card m-3 custom-card-bg flex-shrink-0" style="width: 18rem; width:300px; height:590px;">
            <img src="{{ Storage::url($product->image_url) }}" class="card-img-top" alt="{{ $product->title }}">
            <button class="play-button" data-audio-src="{{ Storage::url($product->audio_url) }}"
                data-image-src="{{ Storage::url($product->image_url) }}" 
                data-title="{{ $product->title }}"
                data-username="{{ $product->user_name }}" 
                data-product-id="{{ $product->id }}"
                data-price="{{ number_format($product->price, 0, '.', '.') }}">
                <i class="fas fa-play-circle fa-5x"></i>
            </button>

            <div class="card-body">
                <h4 class="card-title text-center"><strong>{{ $product->title }}</strong></h4>
                <a href="{{ route('perfil.perfil', ['id' => $product->user_id]) }}" class="card-user d-flex justify-content-center"><strong
                        class="text-center">{{ $product->user_name }}</strong></a>
                
                <hr class="my-4" style="color: rgb(98, 99, 103);">
                <span class="card-text text-start"><strong>bpm:</strong> {{ $product->tempo }}</span>
                <br>
                <span class="card-text"><strong>key:</strong> {{ $product->key }}</span>
                <br>
                <span class="card-text"><strong>Licencia:</strong> Exclusiva</span>
                <br>
                <span class="card-text"><strong>Categoría:</strong> {{ $product->category_name }}</span>
                <br><br>

                <div class="row">
                    <div class="col-md-12">
                        <a href="#" class="btn btn-secondary btn-sm d-flex align-items-center justify-content-between comprar">
                            <span class="d-flex align-items-center bg-primary text-white px-2 py-1 rounded"
                                style="margin-right: 8px;">
                                <strong>$ {{ number_format($product->price, 0, '.', '.') }}</strong>
                            </span>
                            <span class="d-flex align-items-center">
                                Agregar al carro
                                <i class="fa-solid fa-cart-shopping shopping" style="margin-left: 8px;"></i>
                            </span>
                        </a>
                    </div>
                    <div class="col-3 text-center">
                        @auth
                                <a href="#" class="like-button" data-product-id="{{ $product->id }}">
                                    <i class="fa-solid fa-heart corazon {{ $product->liked ? 'liked' : '' }}" id="heart-icon-{{ $product->id }}"></i>
                                    <span class="text-center" style="color: white; white-space: nowrap;" id="like-count-{{ $product->id }}">
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
                            <span class="text-center" style="color: white; white-space: nowrap;">14840</span>
                        </a>
                    </div>
                    <div class="col-3 text-center">
                        <a href="#" class="text-center" data-bs-toggle="modal"
                                    data-bs-target="#commentsModal" data-product-id="{{ $product->id }}">
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

        <!-- Contenedor de los dos siguientes cards -->
        <div class="d-flex flex-column flex-grow-1">
            <!-- Segundo Card -->
            <div class="card m-3 custom-card-bg flex-fill">
                <div class="card-body">
                    <h5 class="card-title">Descripción</h5>
                    <hr class="my-2" style="color: rgb(98, 99, 103);">
                    <p style="color: rgb(221, 219, 219);">{{ $product->description }}</p>
                </div>
            </div>

            <!-- Tercer Card -->
            <div class="card m-3 custom-card-bg flex-fill">
                <div class="card-body">
                    <h5 class="card-title">Licencia de uso</h5>
                    <hr class="my-2" style="color: rgb(98, 99, 103);">
                    <!-- Sección para dejar un nuevo comentario -->
                    <div class="mb-4 " style="color: #eaeaea;">
             sdhfkjsdhfd sdkjfhskjdhf sdjkfhsdjkf sdjk
             sdhfkjsdhfd sdkjfhskjdhf sdjkfhsdjkf sdjk
             sdhfkjsdhfd sdkjfhskjdhf sdjkfhsdjkf sdjk
             sdhfkjsdhfd sdkjfhskjdhf sdjkfhsdjkf sdjk
             sdhfkjsdhfd sdkjfhskjdhf sdjkfhsdjkf sdjk
             sdhfkjsdhfd sdkjfhskjdhf sdjkfhsdjkf sdjk
             sdhfkjsdhfd sdkjfhskjdhf sdjkfhsdjkf sdjk
             sdhfkjsdhfd sdkjfhskjdhf sdjkfhsdjkf sdjk
             sdhfkjsdhfd sdkjfhskjdhf sdjkfhsdjkf sdjk

             sdhfkjsdhfd sdkjfhskjdhf sdjkfhsdjkf sdjk
             sdhfkjsdhfd sdkjfhskjdhf sdjkfhsdjkf sdjk
             sdhfkjsdhfd sdkjfhskjdhf sdjkfhsdjkf sdjk
             sdhfkjsdhfd sdkjfhskjdhf sdjkfhsdjkf sdjk
             sdhfkjsdhfd sdkjfhskjdhf sdjkfhsdjkf sdjk

             sdhfkjsdhfd sdkjfhskjdhf sdjkfhsdjkf sdjk
             sdhfkjsdhfd sdkjfhskjdhf sdjkfhsdjkf sdjk
             sdhfkjsdhfd sdkjfhskjdhf sdjkfhsdjkf sdjk
             sdhfkjsdhfd sdkjfhskjdhf sdjkfhsdjkf sdjk
             sdhfkjsdhfd sdkjfhskjdhf sdjkfhsdjkf sdjk
             sdhfkjsdhfd sdkjfhskjdhf sdjkfhsdjkf sdjk
             sdhfkjsdhfd sdkjfhskjdhf sdjkfhsdjkf sdjk
             sdhfkjsdhfd sdkjfhskjdhf sdjkfhsdjkf sdjk
             sdhfkjsdhfd sdkjfhskjdhf sdjkfhsdjkf sdjk

             sdhfkjsdhfd sdkjfhskjdhf sdjkfhsdjkf sdjk
             sdhfkjsdhfd sdkjfhskjdhf sdjkfhsdjkf sdjk
             sdhfkjsdhfd sdkjfhskjdhf sdjkfhsdjkf sdjk
             sdhfkjsdhfd sdkjfhskjdhf sdjkfhsdjkf sdjk
             sdhfkjsdhfd sdkjfhskjdhf sdjkfhsdjkf sdjk


             sdhfkjsdhfd sdkjfhskjdhf sdjkfhsdjkf sdjk
             sdhfkjsdhfd sdkjfhskjdhf sdjkfhsdjkf sdjk      sdhfkjsdhfd sdkjfhskjdhf sdjkfhsdjkf sdjk
             sdhfkjsdhfd sdkjfhskjdhf sdjkfhsdjkf sdjk
             sdhfkjsdhfd sdkjfhskjdhf sdjkfhsdjkf sdjk
             sdhfkjsdhfd sdkjfhskjdhf sdjkfhsdjkf sdjk
             sdhfkjsdhfd sdkjfhskjdhf sdjkfhsdjkf sdjk
             sdhfkjsdhfd sdkjfhskjdhf sdjkfhsdjkf sdjk
             sdhfkjsdhfd sdkjfhskjdhf sdjkfhsdjkf sdjk
             sdhfkjsdhfd sdkjfhskjdhf sdjkfhsdjkf sdjk
             sdhfkjsdhfd sdkjfhskjdhf sdjkfhsdjkf sdjk

             sdhfkjsdhfd sdkjfhskjdhf sdjkfhsdjkf sdjk
             sdhfkjsdhfd sdkjfhskjdhf sdjkfhsdjkf sdjk
             sdhfkjsdhfd sdkjfhskjdhf sdjkfhsdjkf sdjk
             sdhfkjsdhfd sdkjfhskjdhf sdjkfhsdjkf sdjk
             sdhfkjsdhfd sdkjfhskjdhf sdjkfhsdjkf sdjk


             sdhfkjsdhfd sdkjfhskjdhf sdjkfhsdjkf sdjk
             sdhfkjsdhfd sdkjfhskjdhf sdjkfhsdjkf sdjk      sdhfkjsdhfd sdkjfhskjdhf sdjkfhsdjkf sdjk
             sdhfkjsdhfd sdkjfhskjdhf sdjkfhsdjkf sdjk
             sdhfkjsdhfd sdkjfhskjdhf sdjkfhsdjkf sdjk
             sdhfkjsdhfd sdkjfhskjdhf sdjkfhsdjkf sdjk
             sdhfkjsdhfd sdkjfhskjdhf sdjkfhsdjkf sdjk
             sdhfkjsdhfd sdkjfhskjdhf sdjkfhsdjkf sdjk
             sdhfkjsdhfd sdkjfhskjdhf sdjkfhsdjkf sdjk
             sdhfkjsdhfd sdkjfhskjdhf sdjkfhsdjkf sdjk
             sdhfkjsdhfd sdkjfhskjdhf sdjkfhsdjkf sdjk

             sdhfkjsdhfd sdkjfhskjdhf sdjkfhsdjkf sdjk
             sdhfkjsdhfd sdkjfhskjdhf sdjkfhsdjkf sdjk
             sdhfkjsdhfd sdkjfhskjdhf sdjkfhsdjkf sdjk
             sdhfkjsdhfd sdkjfhskjdhf sdjkfhsdjkf sdjk
             sdhfkjsdhfd sdkjfhskjdhf sdjkfhsdjkf sdjk


             sdhfkjsdhfd sdkjfhskjdhf sdjkfhsdjkf sdjk
             sdhfkjsdhfd sdkjfhskjdhf sdjkfhsdjkf sdjk      sdhfkjsdhfd sdkjfhskjdhf sdjkfhsdjkf sdjk
             sdhfkjsdhfd sdkjfhskjdhf sdjkfhsdjkf sdjk
             sdhfkjsdhfd sdkjfhskjdhf sdjkfhsdjkf sdjk
             sdhfkjsdhfd sdkjfhskjdhf sdjkfhsdjkf sdjk
             sdhfkjsdhfd sdkjfhskjdhf sdjkfhsdjkf sdjk
             sdhfkjsdhfd sdkjfhskjdhf sdjkfhsdjkf sdjk
             sdhfkjsdhfd sdkjfhskjdhf sdjkfhsdjkf sdjk
             sdhfkjsdhfd sdkjfhskjdhf sdjkfhsdjkf sdjk
             sdhfkjsdhfd sdkjfhskjdhf sdjkfhsdjkf sdjk

             sdhfkjsdhfd sdkjfhskjdhf sdjkfhsdjkf sdjk
             sdhfkjsdhfd sdkjfhskjdhf sdjkfhsdjkf sdjk
             sdhfkjsdhfd sdkjfhskjdhf sdjkfhsdjkf sdjk
             sdhfkjsdhfd sdkjfhskjdhf sdjkfhsdjkf sdjk
             sdhfkjsdhfd sdkjfhskjdhf sdjkfhsdjkf sdjk


             sdhfkjsdhfd sdkjfhskjdhf sdjkfhsdjkf sdjk
             sdhfkjsdhfd sdkjfhskjdhf sdjkfhsdjkf sdjk
             sdhfkjsdhfd sdkjfhskjdhf sdjkfhsdjkf sdjk
             sdhfkjsdhfd sdkjfhskjdhf sdjkfhsdjkf sdjk
             
                    </div>

                   
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
@section('js_after')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
@endsection
