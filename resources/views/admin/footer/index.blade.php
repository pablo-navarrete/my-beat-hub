@extends('layouts.app')

@section('css_before')
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <style>
        .altura {
            margin: 5%;
            height: 600px;
        }

        /*
            .scroll-vertical{
                    
                height: 800px;
                overflow-y: auto;
                
            } */
        .card-header {
            background-color: rgb(197, 197, 197);
        }

        .modal-body {
            padding: 1rem;
        }
    </style>
@endsection

@section('content')
    <div class="container altura scroll-vertical">
        <h3 class="mt-3" style="color: white;">Footer</h3>


        <div class="col-md-12 mt-4">
            <div class="card">
                <div class="card-header row">
                    <div class="col-md-10">
                        <h5 class="mt-3">{{ __('Descripción de Footer') }}</h5>
                    </div>
                    <div class="col-md-2 text-end">
                        <a href="#" class="btn btn-success mt-3" data-bs-toggle="modal"
                            data-bs-target="#addFooterModalDescription">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    {{ $footer->description ?? 'No hay descripción para mostrar' }}
                </div>
            </div>
        </div>

        <div class="col-md-12 mt-4">
            <div class="card">
                <div class="card-header row">

                    <h5 class="mt-3">{{ __('Redes sociales de Footer') }}</h5>


                </div>
                <div class="card-body row">
                    <div class="mb-3 row">
                        <label for="" class="form-label"><i class="fa-brands fa-facebook"></i> Facebook</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="facebook"
                                value=" {{ $rrssFooter->facebook ?? '' }}">
                        </div>
                        <div class="col-md-1">
                            <select id="status_facebook" class="form-control">
                                <option value="1"
                                    {{ isset($rrssFooter) && $rrssFooter->status_facebook == 1 ? 'selected' : '' }}>Activo
                                </option>
                                <option value="0"
                                    {{ isset($rrssFooter) && $rrssFooter->status_facebook == 0 ? 'selected' : '' }}>Inactivo
                                </option>
                            </select>
                        </div>
                        <div class="col-md-1">
                            <a href="{{ $rrssFooter->facebook ?? '#' }}" target="_blank" class="btn btn-outline-primary"><i
                                    class="fa-solid fa-eye"></i></a>
                        </div>

                    </div>

                    <div class="mb-3 row">
                        <label for="" class="form-label"><i class="fa-brands fa-instagram"></i> Instagram</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="instagram"
                                value="{{ $rrssFooter->instagram ?? '#' }}">
                        </div>
                        <div class="col-md-1">
                            <select id="status_instagram" class="form-control">
                                <option value="1"
                                    {{ isset($rrssFooter) && $rrssFooter->status_instagram == 1 ? 'selected' : '' }}>Activo
                                </option>
                                <option value="0"
                                    {{ isset($rrssFooter) && $rrssFooter->status_instagram == 0 ? 'selected' : '' }}>
                                    Inactivo</option>
                            </select>
                        </div>
                        <div class="col-md-1">
                            <a href="{{ $rrssFooter->instagram ?? '#' }}" target="_blank"
                                class="btn btn-outline-primary"><i class="fa-solid fa-eye"></i></a>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="" class="form-label"><i class="fab fa-youtube"></i> Youtube</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="youtube"
                                value="{{ $rrssFooter->youtube ?? '#' }}">
                        </div>
                        <div class="col-md-1">
                            <select id="status_youtube" class="form-control">
                                <option value="1"
                                    {{ isset($rrssFooter) && $rrssFooter->status_youtube == 1 ? 'selected' : '' }}>Activo
                                </option>
                                <option value="0"
                                    {{ isset($rrssFooter) && $rrssFooter->status_youtube == 0 ? 'selected' : '' }}>Inactivo
                                </option>
                            </select>
                        </div>
                        <div class="col-md-1">
                            <a href="{{ $rrssFooter->youtube ?? '#' }}" target="_blank" class="btn btn-outline-primary"><i
                                    class="fa-solid fa-eye"></i></a>
                        </div>
                    </div>
                    <hr class="my-3">
                    <div class="text-end">
                        <button type="button" id="saveRRSSInfo" class="btn btn-success">Guardar</button>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-md-12 mt-4">
            <div class="card">
                <div class="card-header row">

                    <h5 class="mt-3">{{ __('Contacto de Footer') }}</h5>

                </div>
                <div class="card-body">
                    <div class="mb-3 row">
                        <label for="correo" class="form-label"><i class="fas fa-envelope"></i> Correo Electrónico</label>
                        <div class="col-md-10">
                            <input type="text" id="correo" class="form-control"
                                value="{{ $contactFooter->correo ?? '' }}">
                        </div>
                        <div class="col-md-2">
                            <select id="status_correo" class="form-control">
                                <option value="1"
                                    {{ isset($contactFooter) && $contactFooter->status_correo == 1 ? 'selected' : '' }}>
                                    Activo</option>
                                <option value="0"
                                    {{ isset($contactFooter) && $contactFooter->status_correo == 0 ? 'selected' : '' }}>
                                    Inactivo</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="celular" class="form-label"><i class="fas fa-phone"></i> Celular</label>
                        <div class="col-md-10">
                            <input type="text" id="celular" class="form-control"
                                value="{{ $contactFooter->celular ?? '' }}">
                        </div>
                        <div class="col-md-2">
                            <select id="status_celular" class="form-control">
                                <option value="1"
                                    {{ isset($contactFooter) && $contactFooter->status_celular == 1 ? 'selected' : '' }}>
                                    Activo</option>
                                <option value="0"
                                    {{ isset($contactFooter) && $contactFooter->status_celular == 0 ? 'selected' : '' }}>
                                    Inactivo</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="whatsapp" class="form-label"><i class="fa-brands fa-whatsapp"></i> Whatsapp</label>
                        <div class="col-md-10">
                            <input type="text" id="whatsapp" class="form-control"
                                value="{{ $contactFooter->whatsapp ?? '' }}">
                        </div>
                        <div class="col-md-2">
                            <select id="status_whatsapp" class="form-control">
                                <option value="1"
                                    {{ isset($contactFooter) && $contactFooter->status_whatsapp == 1 ? 'selected' : '' }}>
                                    Activo</option>
                                <option value="0"
                                    {{ isset($contactFooter) && $contactFooter->status_whatsapp == 0 ? 'selected' : '' }}>
                                    Inactivo</option>
                            </select>
                        </div>
                    </div>
                    <hr class="my-3">
                    <div class="text-end">
                        <button type="button" id="saveContactInfo" class="btn btn-success">Guardar</button>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Modal descripcion-->
    <div class="modal fade" id="addFooterModalDescription" tabindex="-1" aria-labelledby="addFooterModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ingresar Descripción</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-3">
                        <label for="FooterDescription" class="form-label">Descripción</label>
                        <textarea class="form-control" id="description" name="description" rows="10">{{ $footer->description ?? '' }}</textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" id="saveDescriptionInfo" class="btn btn-success">Guardar</button>
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
            //GUARDAR CONTACTO
            $('#saveContactInfo').click(function() {
                // Recolectar los datos del formulario
                var correo = $('#correo').val();
                var status_correo = $('#status_correo').val();
                var celular = $('#celular').val();
                var status_celular = $('#status_celular').val();
                var whatsapp = $('#whatsapp').val();
                var status_whatsapp = $('#status_whatsapp').val();

                // Realizar la solicitud AJAX
                $.ajax({
                    url: '{{ route('footer.saveContact') }}', // Cambia esto a la ruta que usarás para guardar los datos
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        correo: correo,
                        status_correo: status_correo,
                        celular: celular,
                        status_celular: status_celular,
                        whatsapp: whatsapp,
                        status_whatsapp: status_whatsapp,
                    },
                    success: function(response) {
                        if (response.success) {
                            Swal.fire(
                                'Éxito',
                                'Información de contacto guardada correctamente.',
                                'success'
                            ).then(() => {
                                // Actualizar la página
                                location.reload();
                            });
                        } else {
                            Swal.fire(
                                'Error',
                                'Ocurrió un error al guardar la información.',
                                'error'
                            );
                        }
                    },
                    error: function() {
                        Swal.fire(
                            'Error',
                            'Ocurrió un error al guardar la información.',
                            'error'
                        );
                    }
                });
            });

            //guardar redes sociales
            $('#saveRRSSInfo').click(function() {
                // Recolectar los datos del formulario
                var facebook = $('#facebook').val();
                var status_facebook = $('#status_facebook').val();
                var instagram = $('#instagram').val();
                var status_instagram = $('#status_instagram').val();
                var youtube = $('#youtube').val();
                var status_youtube = $('#status_youtube').val();

                // Realizar la solicitud AJAX
                $.ajax({
                    url: '{{ route('footer.saveRRSS') }}', // Cambia esto a la ruta que usarás para guardar los datos
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        facebook: facebook,
                        status_facebook: status_facebook,
                        instagram: instagram,
                        status_instagram: status_instagram,
                        youtube: youtube,
                        status_youtube: status_youtube,
                    },
                    success: function(response) {
                        if (response.success) {
                            Swal.fire(
                                'Éxito',
                                'Información de redes sociales guardada correctamente.',
                                'success'
                            ).then(() => {
                                // Actualizar la página
                                location.reload();
                            });
                        } else {
                            Swal.fire(
                                'Error',
                                'Ocurrió un error al guardar la información.',
                                'error'
                            );
                        }
                    },
                    error: function() {
                        Swal.fire(
                            'Error',
                            'Ocurrió un error al guardar la información.',
                            'error'
                        );
                    }
                });
            });

            //guardar descripcion
            $('#saveDescriptionInfo').click(function() {
                // Recolectar los datos del formulario
                var description = $('#description').val();

                // Realizar la solicitud AJAX
                $.ajax({
                    url: '{{ route('footer.saveDescription') }}', // Cambia esto a la ruta que usarás para guardar los datos
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        description: description,

                    },
                    success: function(response) {
                        if (response.success) {
                            $('#addFooterModalDescription').modal('hide');
                            Swal.fire({
                                icon: 'success',
                                title: '¡Guardado!',
                                text: 'La descripción ha sido guardada exitosamente.',
                            }).then(() => {
                                // Actualizar la página
                                location.reload();
                            });
                        } else {
                            Swal.fire(
                                'Error',
                                'Ocurrió un error al guardar la información.',
                                'error'
                            );
                        }
                    },
                    error: function() {
                        Swal.fire(
                            'Error',
                            'Ocurrió un error al guardar la información.',
                            'error'
                        );
                    }
                });
            });
        });
    </script>
@endsection
