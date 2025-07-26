<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SGC - Dashboard</title>
</head>
<body>
    <h2>Administrador</h2>
    <h1>SGC - Sistema de Gestión de Cursos</h1>
    <p>Bienvenid@, {{ Auth::user()->nombres}}</p>
    <ul>
        <li><a href="{{ route('cursos.index') }}">Cursos</a></li>
        <li><a href="{{ route('logout') }}">Cerrar sesión</a></li>
    </ul>
    <div>
        <p>Total de cursos: {{ $totalcursos }}</p>
    </div>
    <div>
        <p>Total de estudiantes {{ $totalestudiantes }}</p>
    </div>
    <div>
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
                        backgroundColor: 'rgba(75, 192, 192, 0.6)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    indexAxis: 'y', // 👈 Esto invierte el gráfico (lo hace horizontal)
                    responsive: true,
                    scales: {
                        x: {
                            beginAtZero: true,
                            ticks: {
                                stepSize: 10 // Puedes cambiar a 1 o 10 si quieres
                            }
                        },
                        y: {
                            ticks: {
                                font: {
                                    size: 14
                                }
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
</body>
</html>