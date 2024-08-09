@extends('layouts.app')

@section('css_before')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
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

        .table-rounded {
            border-radius: .35rem;
            overflow: hidden;
        }
    </style>
@endsection

@section('content')
    <div class="container altura scroll-vertical">
        <h3 class="mt-3" style="color: white;">Categorías</h3>
        <div style="display: flex;">
            <a href="#" class="btn btn-success" style="margin-left: auto; margin-right: 30px;" data-bs-toggle="modal"
                data-bs-target="#addCategoryModal">
                <i class="fa-solid fa-plus"></i>
            </a>
        </div>

        <div class="col-md-12 mt-4">
            <div class="card">
                <div class="card-header ">
                    <h5 class="mt-3">{{ __('Listado de categorías') }}</h5>
                </div>
                <div class="card-body ">
                    <table id="category-table" class="table table-striped table-bordered table-hover table-rounded ">
                        <thead class="table-dark text-center">
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Descripción</th>
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

    <!-- Modal crear-->
    <div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Agregar Categoría</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="addCategoryForm">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="categoryName" class="form-label">Nombre de la Categoría</label>
                            <input type="text" class="form-control" id="categoryName" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="categoryDescription" class="form-label">Descripción</label>
                            <textarea class="form-control" id="categoryDescription" name="description" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="categoryStatus" class="form-label">Estado</label>
                            <select class="form-select" id="categoryStatus" name="status" required>
                                <option value="1">Activo</option>
                                <option value="0">Inactivo</option>
                            </select>
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

    <!-- Modal para Editar -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Editar Categoría</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="editForm">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <input type="hidden" id="edit-id" name="id">
                        <div class="mb-3">
                            <label for="edit-name" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="edit-name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit-description" class="form-label">Descripción</label>
                            <textarea class="form-control" id="edit-description" name="description" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="edit-status" class="form-label">Estado</label>
                            <select class="form-select" id="edit-status" name="status" required>
                                <option value="1">Activo</option>
                                <option value="0">Inactivo</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    </div>
                </form>
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

            var table = $('#category-table').DataTable({
                processing: false,
                serverSide: true,
                ajax: '{{ route('categories.data') }}',
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'description',
                        name: 'description'
                    },
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
                        <button class="btn btn-primary btn-sm  edit-btn" data-id="${row.id}" data-name="${row.name}" data-description="${row.description}" data-status="${row.status}">
                            <i class="fa-solid fa-pen-to-square"></i> 
                        </button>
                        <button class="btn btn-danger btn-sm   delete-btn" data-id="${row.id}">
                            <i class="fa-solid fa-trash-can"></i> 
                        </button>
                    `;
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
                    "sSearch": "Buscar:",
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

            $('#addCategoryForm').on('submit', function(e) {
                e.preventDefault();

                var formData = $(this).serialize();

                $.ajax({
                    url: '{{ route('categories.store') }}',
                    method: 'POST',
                    data: formData,
                    success: function(response) {
                        $('#addCategoryModal').modal('hide');
                        $('#addCategoryForm')[0].reset(); // Limpiar el formulario
                        table.ajax.reload(); // Recargar el DataTable
                        Swal.fire({
                            title: '¡Éxito!',
                            text: 'Categoría agregada exitosamente.',
                            icon: 'success',
                            confirmButtonText: 'Aceptar'
                        });
                    },
                    error: function(error) {
                        Swal.fire({
                            title: 'Error',
                            text: 'Hubo un error al agregar la categoría.',
                            icon: 'error',
                            confirmButtonText: 'Aceptar'
                        });
                    }
                });
            });
            // Manejar el clic en el botón de editar
            $('#category-table').on('click', '.edit-btn', function() {
                var id = $(this).data('id');
                var name = $(this).data('name');
                var description = $(this).data('description');
                var status = $(this).data('status');

                // Rellenar el formulario del modal con los datos del registro
                $('#edit-id').val(id);
                $('#edit-name').val(name);
                $('#edit-description').val(description);
                $('#edit-status').val(status);

                // Mostrar el modal de edición
                $('#editModal').modal('show');
            });

            // Manejar el envío del formulario de edición
            $('#editForm').on('submit', function(e) {
                e.preventDefault();

                var id = $('#edit-id').val();
                var formData = $(this).serialize();

                $.ajax({
                    url: '{{ route('categories.update', ':id') }}'.replace(':id', id),
                    method: 'PUT',
                    data: formData,
                    success: function(response) {
                        $('#editModal').modal('hide');
                        table.ajax.reload(); // Recargar el DataTable
                        Swal.fire({
                            title: '¡Éxito!',
                            text: 'Registro actualizado exitosamente.',
                            icon: 'success',
                            confirmButtonText: 'Aceptar'
                        });
                    },
                    error: function(error) {
                        Swal.fire({
                            title: 'Error',
                            text: 'Hubo un error al actualizar el registro.',
                            icon: 'error',
                            confirmButtonText: 'Aceptar'
                        });
                    }
                });
            });

            // Manejar el clic en el botón de eliminar
            $('#category-table').on('click', '.delete-btn', function() {
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
                    url: '{{ route('categories.destroy', ':id') }}'.replace(':id', id),
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

            // Manejar el clic en el botón de cambio de estado
            $('#category-table').on('click', '.change-status', function() {
                var id = $(this).data('id');
                var currentStatus = $(this).data('status');
                var newStatus = currentStatus == 1 ? 0 : 1;
                var newButtonClass = newStatus == 1 ? 'btn-success' : 'btn-danger';
                var newButtonText = newStatus == 1 ? 'Activo' : 'Inactivo';

                $.ajax({
                    url: '{{ route('categories.updateStatus', ':id') }}'.replace(':id', id),
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

        });
    </script>
@endsection
