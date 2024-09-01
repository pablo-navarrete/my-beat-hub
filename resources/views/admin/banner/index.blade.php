@extends('layouts.app')
@section('css_before')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <style>
        .altura {
            margin: 5%;
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
        <h3 class="mb-5 mt-3" style="color: white;">Banners</h3>
        <div class="col-md-12 mt-4">
            <div class="card">
                <div class="card-header row">
                    <div class="col-md-10">
                        <h5 class="mt-3">{{ __('Listado de Banners') }}</h5>
                    </div>
                    <div class="col-md-2 text-end">
                        <a href="{{ route('banner.create') }}" class="btn btn-primary mt-2" >
                            <i class="fa-solid fa-plus"></i>
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    <table id="banner-table" class="table table-striped table-bordered table-hover table-rounded ">
                        <thead class="table-dark text-center">
                            <tr>
                                <th>ID</th>
                                <th>Portada</th>
                                <th>Titulo</th>
                                <th>Descripción</th>
                                <th>Botón</th>
                                <th>url</th>
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

    <!-- Modal para Confirmar Eliminación -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirmar Eliminación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ¿Está seguro de que desea eliminar este registro?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-danger" id="confirm-delete">Eliminar</button>
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

    var table = $('#banner-table').DataTable({
        processing: false,
        serverSide: true,
        ajax: {
            url: '{{ route('banner.data') }}',
            type: 'GET'
        },
        columns: [
            { data: 'id', name: 'id' },
            {
                data: 'image_url',
                name: 'image_url',
                render: function(data) {
                    return `<img src="/storage/${data}" alt="banner Image" style="width:80px; height:80px; object-fit:cover;">`;
                },
                searchable: false
            },
           
            { data: 'title', name: 'title' },
            { data: 'description', name: 'description' },
            { data: 'name_button', name: 'name_button' },
            { data: 'url', name: 'url' },
           
            {
                data: 'status',
                name: 'status',
                render: function(data, type, row) {
                    var buttonClass = data == 1 ? 'btn-success' : 'btn-danger';
                    var buttonText = data == 1 ? 'Activo' : 'Inactivo';
                    var action = data == 1 ? 'desactivar' : 'activar';
                    return `<div class="d-flex justify-content-center">
                        <button class="btn ${buttonClass} btn-sm change-status" data-id="${row.id}" data-status="${data}">${buttonText}</button>
                    </div>`;
                }
            },
            {
                data: null,
                name: 'action',
                orderable: false,
                searchable: false,
                render: function(data, type, row) {
                   
                    
                    return `
                        <div class="dropdown text-center">
                            <button class="btn btn-secondary dropdown-toggle btn-sm" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                Opciones
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <li><a class="dropdown-item btn-primary " href="#" data-id="${row.id}" data-name="${row.title}" data-description="${row.description}" data-status="${row.status}"><i class="fa-solid fa-pen-to-square"></i> Editar</a></li>
                                <li><a class="dropdown-item btn-danger delete-btn" href="#" data-id="${row.id}"><i class="fa-solid fa-trash-can"></i> Eliminar</a></li>
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

      // Manejar el clic en el botón de cambio de estado
      $('#banner-table').on('click', '.change-status', function() {
                var id = $(this).data('id');
                var currentStatus = $(this).data('status');
                var newStatus = currentStatus == 1 ? 0 : 1;
                var newButtonClass = newStatus == 1 ? 'btn-success' : 'btn-danger';
                var newButtonText = newStatus == 1 ? 'Activo' : 'Inactivo';

                $.ajax({
                    url: '{{ route('banner.updateStatus', ':id') }}'.replace(':id', id),
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        status: newStatus
                    },
                    success: function(response) {
                        table.ajax.reload(); // Recargar el DataTable
                        Swal.fire({
                            title: '¡Éxito!',
                            text: 'Estado actualizado exitosamente.',
                            icon: 'success',
                            confirmButtonText: 'Aceptar'
                        });
                    },
                    error: function(error) {
                        Swal.fire({
                            title: 'Error',
                            text: 'Hubo un error al actualizar el estado.',
                            icon: 'error',
                            confirmButtonText: 'Aceptar'
                        });
                    }
                });
            });

   // Manejar el clic en el botón de eliminar
   $('#banner-table').on('click', '.delete-btn', function() {
                var id = $(this).data('id');

                // Establecer el ID del registro a eliminar
                $('#confirm-delete').data('id', id);

                // Mostrar el modal de confirmación de eliminación
                $('#deleteModal').modal('show');
            });


            // Manejar la confirmación de eliminación
            $('#confirm-delete').on('click', function() {
                var id = $(this).data('id');

                $.ajax({
                    url: '{{ route('banner.destroy', ':id') }}'.replace(':id', id),
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}' // Asegúrate de incluir el token CSRF
                    },
                    success: function(response) {
                        $('#deleteModal').modal('hide');
                        table.ajax.reload(); // Recargar el DataTable
                        Swal.fire({
                            title: '¡Éxito!',
                            text: 'Registro eliminado exitosamente.',
                            icon: 'success',
                            confirmButtonText: 'Aceptar'
                        });
                    },
                    error: function(error) {
                        Swal.fire({
                            title: 'Error',
                            text: 'Hubo un error al eliminar el registro.',
                            icon: 'error',
                            confirmButtonText: 'Aceptar'
                        });
                    }
                });
            });

});

</script>
@endsection
