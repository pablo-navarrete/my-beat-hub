@extends('layouts.menu')

@section('css_before')
    <style>
        .altura {
            margin: 5%;
        }

        .card-header {
            background-color: rgb(197, 197, 197);
        }

        .category-link {
            text-decoration: none;
            display: block;
            /* Para asegurarse de que el hover se aplique correctamente */
            transition: background-color 0.3s ease;
            /* Para una transición suave del color de fondo */
        }

        .category-link:hover .card {
            filter: brightness(80%);
            /* Oscurece el color en un 20% */
        }
    </style>
@endsection

@section('content')
    <div class="container altura text-center">
        <h3 class="mb-5 mt-3" style="color: white;">Categorías</h3>
        <p style="color: white;">Encuentra usuarios o instrumentales por categoría con mayor precisión, sin perder tiempo en
            búsquedas generales.</p>
        <div class="row">
            @if ($categories)
                @php
                    // Array para almacenar los colores generados
                    $generatedColors = [];
                @endphp

                @foreach ($categories as $category)
                    @php
                        do {
                            // Generar componentes RGB oscuros
                            $r = mt_rand(0, 150);
                            $g = mt_rand(0, 150);
                            $b = mt_rand(0, 150);
                            // Convertir a formato hexadecimal
                            $randomColor = sprintf('#%02X%02X%02X', $r, $g, $b);
                        } while (in_array($randomColor, $generatedColors)); // Repetir hasta que el color sea único

                        // Almacenar el color generado en el array
                        $generatedColors[] = $randomColor;
                    @endphp



                    <div class="col-md-2 mt-4 text-center card-container">
                        <a href="{{ route('category.tipoCategory', ['id' => $category->id]) }}" class="category-link">
                            <div class="card" style="background-color: {{ $randomColor }};">
                                <h5 class="m-4" style="color: white;">{{ $category->name }}</h5>
                            </div>
                        </a>
                    </div>
                @endforeach
            @else
                <p style="color: white;">No hay categorías para mostrar</p>
            @endif
        </div>
    </div>
@endsection

@section('js_after')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endsection
