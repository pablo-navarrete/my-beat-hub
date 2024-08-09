@extends('layouts.menu')

@section('css_before')
    <style>
        .altura {
            margin: 5%;
            height: 800px;
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
    <div class="container altura ">
        <h3 class="mb-5 mt-3 text-center" style="color: white;">Informaciones</h3>
        <div class="row" style="color: white;">
            {!! $description !!}

        </div>
    </div>
@endsection

@section('js_after')
@endsection
