@extends('layouts.app')

@section('css_before')
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <style>
        .altura {
            margin: 5%;
            height: 600px;
        }

        .scroll-vertical {

            height: 800px;
            overflow-y: auto;

        }

        .card-header {
            background-color: rgb(197, 197, 197);
        }

        .modal-body {
            padding: 1rem;
        }

        .ck-editor__editable {
            min-height: 500px;
            /* Ajusta aquí la altura mínima del editor */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            /* Evita bordes duplicados */
        }

        th,
        td {
            padding: 12px;
            /* Espaciado interno */
            border: 1px solid black;
            /* Color y grosor del borde negro */
        }

        th {
            background-color: #f4f4f4;
            /* Color de fondo para los encabezados */
            color: #333;
            /* Color del texto en los encabezados */
            text-align: left;
            /* Alineación del texto */
        }

        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
            /* Color de fondo alterno para filas */
        }

        tbody tr:hover {
            background-color: #f1f1f1;
            /* Color de fondo al pasar el cursor */
        }
    </style>
@endsection

@section('content')
    <div class="container altura scroll-vertical">
        <h3 class="mt-3" style="color: white;">Información</h3>
        <div style="display: flex;">
            <a href="#" class="btn btn-success" style="margin-left: auto; margin-right: 30px;" data-bs-toggle="modal"
                data-bs-target="#addInformationModal">
                <i class="fa-solid fa-pen-to-square"></i>
            </a>
        </div>

        <div class="col-md-12 mt-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="mt-3">{{ __('Descripción de Información') }}</h5>
                </div>
                <div class="card-body">
                    <!-- Aquí se mostrará la descripción -->
                </div>
            </div>
        </div>
    </div>

    <!-- Modal crear-->
    <div class="modal fade" id="addInformationModal" tabindex="-1" aria-labelledby="addInformationModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ingresar Información</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="addInformationForm">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="informationDescription" class="form-label">Descripción</label>
                            <textarea class="form-control" id="informationDescription" name="description" rows="10"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js_after')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/38.0.0/classic/ckeditor.js"></script>
    <script>
        $(document).ready(function() {
            let editorInstance;

            // Inicializar CKEditor en el textarea
            ClassicEditor
                .create(document.querySelector('#informationDescription'), {
                    height: '400px' // Ajusta aquí la altura del editor
                })
                .then(editor => {
                    editorInstance = editor;
                })
                .catch(error => {
                    console.error(error);
                });

            // Cargar datos existentes al abrir el modal
            $('#addInformationModal').on('show.bs.modal', function() {
                $.ajax({
                    url: '{{ route('information.show') }}',
                    type: 'GET',
                    success: function(response) {
                        // Cargar la descripción en el editor CKEditor
                        if (editorInstance) {
                            editorInstance.setData(response.description || '');
                        }
                    },
                    error: function(xhr) {
                        console.error('Error al cargar la descripción.');
                    }
                });
            });

            // Manejar el envío del formulario con AJAX
            $('#addInformationForm').on('submit', function(event) {
                event.preventDefault(); // Evitar el comportamiento por defecto del formulario

                $.ajax({
                    url: '{{ route('information.store') }}',
                    type: 'POST',
                    data: $(this).serialize(), // Serializar el formulario para enviarlo
                    success: function(response) {
                        // Actualizar el contenido del div en el card
                        $('.card-body').html('<p>' + response.description + '</p>');

                        // Cerrar el modal
                        $('#addInformationModal').modal('hide');

                        // Opcionalmente, puedes mostrar un mensaje de éxito
                        Swal.fire({
                            title: '¡Éxito!',
                            text: 'Descripción agregada exitosamente.',
                            icon: 'success',
                            confirmButtonText: 'Aceptar'
                        });

                    },
                    error: function(xhr) {
                        // Manejar errores si ocurren
                        Swal.fire({
                            title: 'Error',
                            text: 'Hubo un error al agregar la Descripción.',
                            icon: 'error',
                            confirmButtonText: 'Aceptar'
                        });
                    }
                });
            });

            // Cargar datos al cargar la página
            $.ajax({
                url: '{{ route('information.show') }}',
                type: 'GET',
                success: function(response) {
                    // Actualizar el contenido del div en el card con los datos existentes
                    $('.card-body').html('<p>' + response.description + '</p>');
                },
                error: function(xhr) {
                    console.error('Error al cargar la descripción.');
                }
            });
        });
    </script>
@endsection
