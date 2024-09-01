@extends('layouts.app')
@section('css_before')
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
    </style>
@endsection
@section('content')
    <div class="container altura scroll-vertical">
        <h3 class="mb-5 mt-3" style="color: white;">Compras</h3>
        <div class="col-md-12 mt-4">
            <div class="card">
                <div class="card-header">{{ __('Listado de compras') }}</div>

                <div class="card-body">

                </div>
            </div>
        </div>
    </div>
@endsection
@section('js_after')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endsection
