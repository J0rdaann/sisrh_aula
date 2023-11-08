@extends('layouts.default')

@section('title', 'SisRH - Dashboard')

@section('content')

<h1 class="mb-5">Dashboard</h1>

<div class="row g-4 mb-5">
    <div class="col-md-3">
        <div class="bg-primary shadow p-3 text-center text-white d-flex align-items-center rounded">
            <i class="bi bi-people-fill fs-1 me-3"></i>
            <div class="w-100">
                <span class="fs-5 d-block">Funcionários:</span>
                <span class="fs-2"><b>{{ $totalFuncionarios }}</b></span>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="bg-danger shadow p-3 text-center text-white d-flex d-flex align-items-center rounded">
            <i class="bi bi-pen-fill fs-1 me-3"></i>
            <div class="w-100">
                <span class="fs-5 d-block">Cargos:</span>
                <span class="fs-2"><b>{{ $totalCargos }}</b></span>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="bg-warning shadow p-3 text-center text-white d-flex d-flex g-5 align-items-center rounded">
            <i class="bi bi-building fs-1 me-3"></i>
            <div class="w-100">
                <span class="fs-5 d-block">Departamentos:</span>
                <span class="fs-2"><b>{{ $totalDepartamentos }}</b></span>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="bg-success shadow p-3 text-center text-white d-flex d-flex g-5 align-items-center rounded">
            <i class="bi bi-currency-dollar fs-1 me-3"></i>
            <div class="w-100">
                <span class="fs-5 d-block">Total de Salário:</span>
                <span class="fs-2"><b>{{ number_format($somaSalarios,  2, ',', '.') }}</b></span>
            </div>
        </div>
    </div>
</div>

<div class="row g-5">
    <div class="col-md-8">
        <h2 class="text-center mb-4">Departamentos</h2>
        <div>
            <canvas id="grafico-departamentos"></canvas>
        </div>
    </div>

    <div class="col-md-4">
        <h2 class="text-center mb-4">Cargos</h2>
        <div>
            <canvas id="grafico-cargos"></canvas>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const graficoDepartamentos = document.getElementById('grafico-departamentos');

        new Chart(graficoDepartamentos, {
            type: 'bar',
            data: {
                //labels: ['jan', 'fev', 'marco'],
                labels: [
                    @foreach ($departamentos as $departamento)
                        '{{ $departamento->nome }}',
                    @endforeach
                ],

                datasets: [{
                    axis: 'y',
                    label: '',
                    data: [
                        @foreach ($departamentos as $departamento)
                            {{ $departamento->funcionariosAtivos->count(); }},
                        @endforeach
                    ],
                    fill: false,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(201, 203, 207, 0.2)'
                    ],
                    borderColor: [
                        'rgb(255, 99, 132)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 205, 86)',
                        'rgb(75, 192, 192)',
                        'rgb(54, 162, 235)',
                        'rgb(153, 102, 255)',
                        'rgb(201, 203, 207)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                indexAxis: 'y',
                plugins: {
                    legend: {
                        display: false,
                    }
                }
            }
        });

        const graficoCargos = document.getElementById('grafico-cargos');

            new Chart(graficoCargos, {
                type: 'doughnut',
                data: {
                    labels: [
                        @foreach ($cargos as $cargo)
                            '{{ $cargo->descricao }}',
                        @endforeach
                    ],
                    datasets: [{
                        label: '',
                        data: [
                            @foreach ($cargos as $cargo)
                                {{ $cargo->funcionariosAtivos->count(); }},
                            @endforeach
                        ],
                        backgroundColor: [
                            'rgb(255, 99, 132)',
                            'rgb(255, 159, 64)',
                            'rgb(255, 205, 86)',
                            'rgb(75, 192, 192)',
                            'rgb(54, 162, 235)',
                            'rgb(153, 102, 255)',
                            'rgb(201, 203, 207)'
                        ],
                        hoverOffset: 10,
                    }]
                },
            });
    </script>
</div>

@endsection
