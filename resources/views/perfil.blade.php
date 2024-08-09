@extends('layouts.menu')


@section('title')
    - Perfil Usuario
@endsection

@section('css_before')
    <style>
        .altura {
            margin: 5%;
            height: 800px;
        }

        /*perfil*/
        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-clip: border-box;
            border: 0 solid transparent;
            border-radius: .25rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 2px 6px 0 rgb(218 218 253 / 65%), 0 2px 6px 0 rgb(206 206 238 / 54%);
        }

        .me-2 {
            margin-right: .5rem !important;
        }
    </style>
@endsection
@section('content')
    <div class="container altura">




        <div class="row">
            <div class="col-md-3">
                <div class="card" style="background-color: rgb(215, 215, 215);">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="{{ asset('img/mjimg.jpg') }}" alt="Admin" class="rounded-circle p-1 bg-success"
                                width="110">
                            <div class="mt-3">
                                <h4>La 256 studio</h4>
                                <p class="text-secondary mb-1">Producción musical</p>
                                <p class="text-muted font-size-sm">limache, valparaiso, chile</p>
                                <button class="btn btn-primary">Seguir</button>
                            </div>
                        </div>
                        <hr class="my-4">
                        <div class="row">

                            <div class="col-md-6 text-center">
                                <a href="#" class="btn btn-outline-secondary">
                                    <strong>23423</strong>
                                    <span>Seguidores</span>
                                </a>
                            </div>
                            <div class="col-md-6 text-center">
                                <a href="#" class="btn btn-outline-secondary">
                                    <strong>23423</strong>
                                    <span>Seguidos</span>
                                </a>
                            </div>

                            <div class="col-md-12 d-flex align-items-center mb-2 mt-4">
                                <i class="fa-solid fa-phone" style="font-size: 25px; margin-right: 10px;"></i>
                                <p class="mb-0">+56 9 56231127</p>
                            </div>
                            <div class="col-md-12 d-flex align-items-center mb-2">
                                <i class="fa-regular fa-envelope" style="font-size: 25px; margin-right: 10px;"></i>
                                <p class="mb-0">la256studio@gmail.com</p>
                            </div>

                            <hr class="my-4">

                            <div class="col-md-3 text-center">
                                <a href="#" class="btn btn-outline-success btn-sm">
                                    <i class="fa-brands fa-whatsapp" style="font-size: 25px;"></i>
                                </a>
                            </div>
                            <div class="col-md-3 text-center">
                                <a href="#" class="btn btn-outline-primary btn-sm">
                                    <i class="fa-brands fa-facebook" style="font-size: 25px;"></i>
                                </a>
                            </div>
                            <div class="col-md-3 text-center">
                                <a href="#" class="btn btn-outline-danger btn-sm ">
                                    <i class="fa-brands fa-instagram" style="font-size: 25px;"></i>
                                </a>
                            </div>
                            <div class="col-md-3 text-center">
                                <a href="#" class="btn btn-outline-danger btn-sm">
                                    <i class="fa-brands fa-youtube" style="font-size: 25px;"></i>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>


    </div>
@endsection
@section('js_after')
@endsection
