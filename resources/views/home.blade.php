@extends('layouts.app')
@section('css_before')
    <style>
        .altura {
            margin: 5%;
        }

        .scroll-vertical {

            height: 800px;
            overflow-y: auto;

        }

        .count {
            text-decoration: none;
            color: rgb(255, 255, 255);
        }

        .count:hover {
            color: #11c511;
        }

        .card-header {
            background-color: rgb(197, 197, 197);
        }
    </style>
@endsection
@section('content')
    <div class="container altura scroll-vertical">
        <h3 class="mb-5 mt-3" style="color: white;">Estadisticas</h3>
        <div class="row justify-content-center">

            <div class="col-md-2 text-center mb-4">
                <div class="card">
                    <div class="card-header" style="background-color: blueviolet !important;">
                        <a href="" class="count">{{ __('Productos totales') }}</a>
                    </div>

                    <div class="card-body">
                        <strong>0</strong>
                    </div>
                </div>
            </div>
            <div class="col-md-2 text-center mb-4">
                <div class="card">
                    <div class="card-header" style="background-color: rgb(221, 128, 61) !important;">
                        <a href="" class="count">{{ __('Productos en venta') }}</a>
                    </div>

                    <div class="card-body">
                        <strong>56345</strong>
                    </div>
                </div>
            </div>
            <div class="col-md-2 text-center mb-4">
                <div class="card">
                    <div class="card-header" style="background-color: rgb(113, 149, 226) !important;">
                        <a href="" class="count">{{ __('Productos vendidos') }}</a>
                    </div>

                    <div class="card-body">
                        <strong>3356</strong>
                    </div>
                </div>
            </div>
            <div class="col-md-2 text-center mb-4">
                <div class="card">
                    <div class="card-header" style="background-color: rgb(50, 119, 60) !important;">
                        <a href="" class="count">{{ __('Productos Publicitados') }}</a>
                    </div>

                    <div class="card-body">
                        <strong>3356</strong>
                    </div>
                </div>
            </div>


            <div class="col-md-2  text-center mb-4">
                <div class="card">
                    <div class="card-header" style="background-color: rgb(119, 94, 143) !important;">
                        <a href="" class="count">{{ __('Me gusta recibidos') }}</a>
                    </div>

                    <div class="card-body">
                        <strong>56</strong>
                    </div>
                </div>
            </div>
            <div class="col-md-2  text-center mb-4">
                <div class="card">
                    <div class="card-header" style="background-color: rgb(39, 117, 163) !important;">
                        <a href="" class="count">{{ __('Compras totales') }}</a>
                    </div>

                    <div class="card-body">
                        <strong>56</strong>
                    </div>
                </div>
            </div>
            <div class="col-md-2  text-center mb-4">
                <div class="card">
                    <div class="card-header" style="background-color: rgb(181, 206, 110) !important;">
                        <a href="" class="count">{{ __('Productos en el carro') }}</a>
                    </div>

                    <div class="card-body">
                        <strong>56</strong>
                    </div>
                </div>
            </div>
            <div class="col-md-2  text-center mb-4">
                <div class="card">
                    <div class="card-header" style="background-color: rgb(150, 93, 55) !important;">
                        <a href="" class="count">{{ __('Me gusta') }}</a>
                    </div>

                    <div class="card-body">
                        <strong>56</strong>
                    </div>
                </div>
            </div>
            <div class="col-md-2 text-center mb-4">
                <div class="card">
                    <div class="card-header" style="background-color: rgb(231, 59, 93) !important;">
                        <a href="" class="count">{{ __('Mis derechos de autor') }}</a>
                    </div>

                    <div class="card-body">
                        <strong>0</strong>
                    </div>
                </div>
            </div>
            <div class="col-md-2 text-center mb-4">
                <div class="card">
                    <div class="card-header" style="background-color: rgb(187, 71, 142) !important; ">
                        <a href="" class="count ">{{ __('En lista de reproducción') }}</a>
                    </div>

                    <div class="card-body">
                        <strong>56</strong>
                    </div>
                </div>
            </div>
            <div class="col-md-2  text-center mb-4">
                <div class="card">
                    <div class="card-header" style="background-color: rgb(123, 172, 24) !important;">
                        <a href="" class="count">{{ __('Licencias exclusivas') }}</a>
                    </div>

                    <div class="card-body">
                        <strong>56</strong>
                    </div>
                </div>
            </div>
            <div class="col-md-2  text-center mb-4">
                <div class="card">
                    <div class="card-header" style="background-color: rgb(40, 70, 105) !important;">
                        <a href="" class="count">{{ __('Licencias no exclusivas') }}</a>
                    </div>

                    <div class="card-body">
                        <strong>56</strong>
                    </div>
                </div>
            </div>

            {{-- graficos --}}
            <div class="col-md-6 mt-4">
                <div class="card">
                    <div class="card-header row">
                        <div class="col-md-9">
                            {{ __('Grafico de mis ventas en el mes') }}
                        </div>

                        <div class="col-md-3">
                            <select name="" id="" class="form-control">
                                <option value="">Enero</option>
                                <option value="">Febrero</option>
                                <option value="">Marzo</option>
                                <option value="">Abril</option>
                                <option value="">Mayo</option>
                                <option value="">Junio</option>
                                <option value="">Julio</option>
                                <option value="">Agosto</option>
                                <option value="">Septiembre</option>
                                <option value="">Octubre</option>
                                <option value="">Noviembre</option>
                                <option value="">Diciembre</option>
                            </select>
                        </div>

                    </div>

                    <div class="card-body">
                        <div class="chart-container">
                            <canvas id="dailySalesLineChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mt-4">
                <div class="card">
                    <div class="card-header row">
                        <div class="col-md-9">
                            {{ __('grafico de mis ventas en el año') }}
                        </div>
                        <div class="col-md-3">
                            <select name="" id="" class="form-control">
                                <option value="">2024</option>
                            </select>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="chart-container">
                            <canvas id="salesChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mt-4">
                <div class="card">
                    <div class="card-header">{{ __('grafico de ventas en el año') }}</div>

                    <div class="card-body">

                    </div>
                </div>
            </div>

            <div class="col-md-6 mt-4">
                <div class="card">
                    <div class="card-header">{{ __('grafico de ventas en el año') }}</div>

                    <div class="card-body">

                    </div>
                </div>
            </div>
            <div class="col-md-6 mt-4">
                <div class="card">
                    <div class="card-header">{{ __('grafico de ventas en el año') }}</div>

                    <div class="card-body">

                    </div>
                </div>
            </div>
            <div class="col-md-6 mt-4">
                <div class="card">
                    <div class="card-header">{{ __('grafico de ventas en el año') }}</div>

                    <div class="card-body">

                    </div>
                </div>
            </div>
            <div class="col-md-6 mt-4">
                <div class="card">
                    <div class="card-header">{{ __('grafico de ventas en el año') }}</div>

                    <div class="card-body">

                    </div>
                </div>
            </div>
            <div class="col-md-6 mt-4">
                <div class="card">
                    <div class="card-header">{{ __('grafico de ventas en el año') }}</div>

                    <div class="card-body">

                    </div>
                </div>
            </div>

            <div class="col-md-6 mt-4">
                <div class="card">
                    <div class="card-header">{{ __('grafico de ventas en el año') }}</div>

                    <div class="card-body">

                    </div>
                </div>
            </div>
            <div class="col-md-6 mt-4">
                <div class="card">
                    <div class="card-header">{{ __('grafico de ventas en el año') }}</div>

                    <div class="card-body">

                    </div>
                </div>
            </div>



        </div>
    </div>
@endsection
@section('js_after')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


    <script>
        // Datos ficticios de ventas diarias para un mes
        const ctxs = document.getElementById('dailySalesLineChart').getContext('2d');
        const dailySalesLineChart = new Chart(ctxs, {
            type: 'line',
            data: {
                labels: Array.from({
                    length: 31
                }, (_, i) => i + 1), // Días del mes
                datasets: [{
                    label: 'Ventas Diarias',
                    data: Array.from({
                        length: 31
                    }, () => Math.floor(Math.random() * 1000)), // Ventas aleatorias
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    fill: true, // Llenar el área bajo la línea
                    tension: 0.1 // Suaviza las líneas
                }]
            },
            options: {
                responsive: true,
                scales: {
                    x: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Día del Mes'
                        }
                    },
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Ventas'
                        }
                    }
                }
            }
        });
        // Datos ficticios para los 12 meses del año
        const ctx = document.getElementById('salesChart').getContext('2d');
        const salesChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre',
                    'Octubre', 'Noviembre', 'Diciembre'
                ],
                datasets: [{
                    label: 'Ventas en $',
                    data: [1200, 1500, 1700, 1300, 1800, 2000, 2200, 2100, 1900, 2300, 2500, 2700],
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Ventas en $'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Meses'
                        }
                    }
                }
            }
        });
    </script>
@endsection
