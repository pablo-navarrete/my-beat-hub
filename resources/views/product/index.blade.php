@extends('layouts.app')
@section('css_before')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <style>
        .altura {
            margin: 5%;
        }

        .scroll-vertical {

            height: 800px;
            overflow-y: auto;

        }

        .card-header {
            background-color: rgb(197, 197, 197);
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button {
            padding: 0.5em 1em;
        }
    </style>
@endsection
@section('content')
    <div class="container altura scroll-vertical">
        <h3 class="mb-5 mt-3" style="color: white;">Productos</h3>
        <div class="col-md-12 mt-4">
            <div class="card">
                <div class="card-header row">
                    <div class="col-md-10">
                        <h5 class="mt-3">{{ __('Listado de Productos') }}</h5>
                    </div>
                    <div class="col-md-2 text-end">
                        <a href="{{ route('product.create') }}" class="btn btn-primary mt-2" >
                            <i class="fa-solid fa-plus"></i>
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    <table id="product-table" class="table table-striped table-bordered table-hover table-rounded ">
                        <thead class="table-dark text-center">
                            <tr>
                                <th>ID</th>
                                <th>Portada</th>
                                <th>Audio</th>
                                <th>Titulo</th>
                                <th>Descripción</th>
                                <th>Tempo</th>
                                <th>Escala/Key</th>
                                <th>Precio</th>
                                <th>Licencia</th>
                                <th>Categoría</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>


@endsection
@section('js_after')
   
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>


    <script>
       $(document).ready(function() {
    // Configurar el token CSRF globalmente para todas las solicitudes AJAX
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var table = $('#product-table').DataTable({
        processing: false,
        serverSide: true,
        ajax: {
            url: '{{ route('product.data') }}',
            type: 'GET'
        },
        columns: [
            { data: 'id', name: 'id' },
            {
                data: 'image_url',
                name: 'image_url',
                render: function(data) {
                    return `<img src="/storage/${data}" alt="Product Image" style="width:80px; height:80px; object-fit:cover;">`;
                },
                searchable: false
            },
            {
                        data: 'audio_url',
                        name: 'audio_url',
                        render: function(data) {
                          
                            return `<a href="#" class="btn btn-primary btn-sm play-button" data-audio-src="/storage/${data}">
                                        <i class="fa-regular fa-circle-play"></i>
                                    </a>`;
                        },
                        searchable: false
            },
            { data: 'title', name: 'title' },
            { data: 'description', name: 'description' },
            { data: 'tempo', name: 'tempo' },
            { data: 'key', name: 'key' },
            { data: 'price', name: 'price' },
            {
                data: 'license_id',
                name: 'license_id',
                render: function(data) {
                    var buttonClass = data != 0 ? 'btn-success' : 'btn-secondary';
                    var buttonText = data != 0 ? 'Sí' : 'No';
                    return `<div class="d-flex justify-content-center">
                        <span class="btn ${buttonClass} btn-sm">${buttonText}</span>
                    </div>`;
                }
            },
            { data: 'category_name', name: 'category_name' },
            {
                data: 'status',
                name: 'status',
                render: function(data) {
                    var buttonClass = data == 1 ? 'btn-success' : 'btn-danger';
                    var buttonText = data == 1 ? 'Activo' : 'Inactivo';
                    return `<div class="d-flex justify-content-center">
                        <button class="btn ${buttonClass} btn-sm">${buttonText}</button>
                    </div>`;
                }
            },
            {
                data: null,
                name: 'action',
                orderable: false,
                searchable: false,
                render: function(data) {
                    const editLicenseText = data.license_id === 0 ? 'Asignar Licencia' : 'Editar Licencia';
                    const editLicenseAction = data.license_id === 0 ? 'assign-license' : 'edit-license';
                    
                    return `
                        <div class="dropdown text-center">
                            <button class="btn btn-secondary dropdown-toggle btn-sm" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                Opciones
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <li><a class="dropdown-item btn-success" href="#" data-id="${data.id}" data-action="view"><i class="fa-solid fa-eye"></i> Ver</a></li>
                                <li><a class="dropdown-item btn-secondary" href="#" data-id="${data.id}" data-action="${editLicenseAction}"><i class="fa-solid fa-file"></i> ${editLicenseText}</a></li>
                                <li><a class="dropdown-item btn-primary" href="#" data-id="${data.id}" data-action="edit"><i class="fa-solid fa-pen-to-square"></i> Editar</a></li>
                                <li><a class="dropdown-item btn-danger" href="#" data-id="${data.id}" data-action="delete"><i class="fa-solid fa-trash-can"></i> Eliminar</a></li>
                            </ul>
                        </div>`;
                }
            }
        ],
        language: {
            "sProcessing": "Procesando...",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "No se encontraron resultados",
            "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sSearch": "Buscador",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending": ": activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": activar para ordenar la columna de manera descendente"
            }
        }
    });

   
});

    </script>
@endsection
