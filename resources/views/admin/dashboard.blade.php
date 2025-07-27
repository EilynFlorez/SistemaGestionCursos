@extends('layouts.admin')
@section('titulo', 'Dashboard')

@section('contenido')
    <section class="contenedor">
        <div class="tarjeta">
            <p class="numero">{{ $totalcursos }}</p>
            <p>Total de cursos</p>
        </div>
        <div class="tarjeta">
            <p class="numero">{{ $totalestudiantes }}</p>
            <p>Total de estudiantes</p>
        </div>
    </section>
    
    <div class="grafica">
        <canvas id="graficoHorizontal"></canvas>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            const ctx = document.getElementById('graficoHorizontal').getContext('2d');

            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: @json($cursos->pluck('nombre')),
                    datasets: [{
                        label: 'Inscritos por curso',
                        data: @json($cursos->pluck('inscripciones_count')),
                        backgroundColor: 'rgba(0, 151, 178, 0.6)',
                        borderColor: 'rgba(5, 72, 84, 1)',
                        borderWidth: 1,
                        barThickness: 40,
                    }]
                },
                options: {
                    indexAxis: 'y',
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        x: {
                            beginAtZero: true,
                            ticks: {
                                stepSize: 10 
                            }
                        },
                        y: {
                            ticks: {
                                font: {
                                    size: 14
                                },
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            enabled: true
                        }
                    }
                }
            });
        </script>
    </div>
@endsection