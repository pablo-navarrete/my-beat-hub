@extends('layouts.app')

@section('css_before')
<link href="https://unpkg.com/filepond/dist/filepond.min.css" rel="stylesheet">
<link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<style>
    .altura {
        margin: 5%;
    }

   

    .card-header {
        background-color: rgb(197, 197, 197);
    }
    .filepond--credits {
    display: none;
    }

   p a {
        text-decoration: none;
    }
    

</style>
@endsection

@section('content')
<div class="container altura scroll-vertical">
    <div class="row">
        <div class="col-md-8">
            <h3 class="mb-3 mt-3" style="color: white;">Crear Productos</h3>
        </div>
        <div class="col-md-4 d-flex flex-column justify-content-end" style="color: white;">
            <p class="text-end mb-3 mt-3"><a href="{{ route('product.index') }}">Productos</a> / Crear Producto</p>
        </div>

    </div>
    
   
    <div class="col-md-12 mt-4">
        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
            <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
            </symbol>
        </svg>
        <div class="alert alert-primary d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
            <div>
                Ten en cuenta que después de crear el producto, debes asignarle una licencia de uso acorde a las normas que desees otorgar al instrumental, si no, el producto no sera visible en la tienda para su venta, una vez enlazado una licencia se podra cambiar su estado segun sea necesario para poder ser visible o no en la tienda. La licencia se puede crear en la sección de 
                <strong>Licencias de uso</strong>. 
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h5 class="mt-3">{{ __('Crear nuevo Producto') }}</h5>
            </div>
            <form id="productForm" method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
                @csrf
            <div class="card-body row">
               
                   
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="instrumentalName" class="form-label">Nombre del Instrumental</label>
                            <input type="text" class="form-control col-md-6" id="instrumentalName" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Descripción</label>
                            <input type="text" class="form-control col-md-6" id="description" name="description" required>
                        </div>
                     
                        <div class="mb-3">
                            <label for="tempo" class="form-label">Tempo</label>
                            <input type="number" class="form-control col-md-6" id="tempo" name="tempo" required>
                        </div>
                        <div class="mb-3">
                            <label for="key" class="form-label">Escala/Key</label>
                            <select class="form-control select2 col-md-12" id="key" name="key" required>
                                <option value="0" disabled>Escalas Mayores</option>
                                <option value="C Mayor">C Mayor</option>
                                <option value="C# Mayor">C# Mayor</option>
                                <option value="D Mayor">D Mayor</option>
                                <option value="D# Mayor">D# Mayor</option>
                                <option value="E Mayor">E Mayor</option>
                                <option value="F Mayor">F Mayor</option>
                                <option value="F# Mayor">F# Mayor</option>
                                <option value="G Mayor">G Mayor</option>
                                <option value="G# Mayor">G# Mayor</option>
                                <option value="A Mayor">A Mayor</option>
                                <option value="A# Mayor">A# Mayor</option>
                                <option value="B Mayor">B Mayor</option>
                                <option value="Ab Mayor">Ab Mayor</option>
                                <option value="Gb Mayor">Gb Mayor</option>
                                <option value="0" disabled>Escalas Menores Naturales</option>
                                <option value="A Menor Natural">A Menor Natural</option>
                                <option value="A# Menor Natural">A# Menor Natural</option>
                                <option value="B Menor Natural">B Menor Natural</option>
                                <option value="C Menor Natural">C Menor Natural</option>
                                <option value="C# Menor Natural">C# Menor Natural</option>
                                <option value="D Menor Natural">D Menor Natural</option>
                                <option value="D# Menor Natural">D# Menor Natural</option>
                                <option value="E Menor Natural">E Menor Natural</option>
                                <option value="F Menor Natural">F Menor Natural</option>
                                <option value="F# Menor Natural">F# Menor Natural</option>
                                <option value="G Menor Natural">G Menor Natural</option>
                                <option value="G# Menor Natural">G# Menor Natural</option>
                                <option value="Bb Menor Natural">Bb Menor Natural</option>
                                <option value="Ab Menor Natural">Ab Menor Natural</option>
                                <option value="Gb Menor Natural">Gb Menor Natural</option>
                                <option value="0" disabled>Escalas Menores Armónicas</option>
                                <option value="A Menor Armónica">A Menor Armónica</option>
                                <option value="A# Menor Armónica">A# Menor Armónica</option>
                                <option value="B Menor Armónica">B Menor Armónica</option>
                                <option value="C Menor Armónica">C Menor Armónica</option>
                                <option value="C# Menor Armónica">C# Menor Armónica</option>
                                <option value="D Menor Armónica">D Menor Armónica</option>
                                <option value="D# Menor Armónica">D# Menor Armónica</option>
                                <option value="E Menor Armónica">E Menor Armónica</option>
                                <option value="F Menor Armónica">F Menor Armónica</option>
                                <option value="F# Menor Armónica">F# Menor Armónica</option>
                                <option value="G Menor Armónica">G Menor Armónica</option>
                                <option value="G# Menor Armónica">G# Menor Armónica</option>
                                <option value="Bb Menor Armónica">Bb Menor Armónica</option>
                                <option value="Ab Menor Armónica">Ab Menor Armónica</option>
                                <option value="Gb Menor Armónica">Gb Menor Armónica</option>
                                <option value="0" disabled>Escalas Menores Melódicas</option>
                                <option value="A Menor Melódica">A Menor Melódica</option>
                                <option value="A# Menor Melódica">A# Menor Melódica</option>
                                <option value="B Menor Melódica">B Menor Melódica</option>
                                <option value="C Menor Melódica">C Menor Melódica</option>
                                <option value="C# Menor Melódica">C# Menor Melódica</option>
                                <option value="D Menor Melódica">D Menor Melódica</option>
                                <option value="D# Menor Melódica">D# Menor Melódica</option>
                                <option value="E Menor Melódica">E Menor Melódica</option>
                                <option value="F Menor Melódica">F Menor Melódica</option>
                                <option value="F# Menor Melódica">F# Menor Melódica</option>
                                <option value="G Menor Melódica">G Menor Melódica</option>
                                <option value="G# Menor Melódica">G# Menor Melódica</option>
                                <option value="Bb Menor Melódica">Bb Menor Melódica</option>
                                <option value="Ab Menor Melódica">Ab Menor Melódica</option>
                                <option value="Gb Menor Melódica">Gb Menor Melódica</option>
                                <option value="0" disabled>Escalas Pentatónicas</option>
                                <option value="Escala Pentatónica Mayor">Escala Pentatónica Mayor</option>
                                <option value="Escala Pentatónica Menor">Escala Pentatónica Menor</option>
                                <option value="0" disabled>Escalas de Blues</option>
                                <option value="Escala de Blues">Escala de Blues</option>
                                <option value="0" disabled>Modos</option>
                                <option value="Escala Jónica (Mayor)">Escala Jónica (Mayor)</option>
                                <option value="Escala Dórica">Escala Dórica</option>
                                <option value="Escala Frigia">Escala Frigia</option>
                                <option value="Escala Lidia">Escala Lidia</option>
                                <option value="Escala Mixolidia">Escala Mixolidia</option>
                                <option value="Escala Eólica (Menor Natural)">Escala Eólica (Menor Natural)</option>
                                <option value="Escala Locria">Escala Locria</option>
                                <option value="0" disabled>Escalas Exóticas</option>
                                <option value="Escala Húngara Menor">Escala Húngara Menor</option>
                                <option value="Escala Neopolitana">Escala Neopolitana</option>
                                <option value="Escala Enigmática">Escala Enigmática</option>
                                <option value="Escala Diminuta">Escala Diminuta</option>
                                <option value="Escala Locria Mayor">Escala Locria Mayor</option>
                                <option value="0" disabled>Escalas Microtonales</option>
                                <option value="Escala de 7 tonos">Escala de 7 tonos</option>
                                <option value="Escala de 9 tonos">Escala de 9 tonos</option>
                            </select>
                            
                            
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Categoría</label>
                            <select class="form-control select2 col-md-12" id="category" name="category" required>
                             @foreach ($categories as $category)

                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                 
                             @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Precio CLP</label>
                            <input type="number" class="form-control col-md-6" id="price" name="price" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="fileInput" class="form-label">Subir Imagen/Portada</label>
                            <input type="file" id="fileInput" name="filepond" accept="image/*">
                        </div>
                       
                        <div class="mb-3">
                            <label for="fileInputBeat" class="form-label">Subir Instrumental (wav/mp3)</label>
                            <input type="file" id="fileInputBeat" name="fileInputBeat" accept="audio/*">
                        </div>
                      
                    </div>
                    <hr class="my-3">
                    <div class="mb-3 text-end">
                        <button class="btn btn-primary"id="saveButton">Guardar</button>
                    </div>
              
            </div>
        </form>
        </div>
    </div>
</div>
@endsection

@section('js_after')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://unpkg.com/filepond/dist/filepond.min.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.js"></script>
<script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script src="https://unpkg.com/filepond/dist/filepond.js"></script>
<script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
<script>
    FilePond.registerPlugin(FilePondPluginImagePreview, FilePondPluginFileValidateType);

    $(document).ready(function() {
    
    // Inicializar Select2
    $('#category').select2({
        placeholder: '--selecciona una opción--',
        allowClear: true,
    });
    $('#key').select2({
        placeholder: '--selecciona una opción--',
        allowClear: true
    });
   
     // Inicializa FilePond para imagen
     const filePondImage = FilePond.create(document.querySelector('input[name="filepond"]'), {
        server: {
            revert: null, // No manejar la eliminación en el servidor
        },
        maxFiles: 1, // Solo permite una imagen
        acceptedFileTypes: ['image/*'],
        labelIdle: 'Arrastra y suelta una imagen o haz clic para seleccionar',
        onprocessfile: (error, file) => {
            if (error) {
                console.error('Error al procesar el archivo:', error);
            }
        }
    });

    // Inicializa FilePond para archivo de audio
    const filePondAudio =FilePond.create(document.querySelector('input[name="fileInputBeat"]'), {
        server: {
            revert: null, // No manejar la eliminación en el servidor
        },
        maxFiles: 1, // Solo permite un archivo
        acceptedFileTypes: ['audio/wav', 'audio/mpeg'], // 'audio/mpeg' para MP3
        labelIdle: 'Arrastra y suelta un archivo de audio o haz clic para seleccionar',
        onprocessfile: (error, file) => {
            if (error) {
                console.error('Error al procesar el archivo:', error);
            } else {
                console.log('Archivo procesado:', file);
            }
        }
    });

      // Enviar archivos cuando se presiona el botón Guardar
      $('#productForm').on('submit', function(event) {
            event.preventDefault(); // Evitar el envío automático del formulario
            const formData = new FormData();

            // Agregar datos del formulario
            $(this).find('input, select').each(function() {
                if (this.name && this.value) {
                    formData.append(this.name, this.value);
                }
            });

            // Agregar archivos a FormData
            filePondImage.getFiles().forEach(fileItem => {
                formData.append('filepond', fileItem.file);
            });

            filePondAudio.getFiles().forEach(fileItem => {
                formData.append('fileInputBeat', fileItem.file);
            });

            // Enviar datos con AJAX
            $.ajax({
                url: $(this).attr('action'),
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    // Mostrar el mensaje de éxito con SweetAlert
                    Swal.fire({
                        title: 'Éxito',
                        text: 'El producto se ha guardado correctamente. recuerda agregarle una licencia de uso.',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Redirigir a la ruta 'product.index'
                            window.location.href = '/productos'; // Cambia la URL según sea necesario
                        }
                    });
                },
                error: function(response) {
                    // Manejo de errores
                    console.error('Error al guardar el producto:', response);
                }
            });

        });
         
});
    
   

    

 
</script>
@endsection
