@extends('layout.app')

@section('title', 'Home')

@push('styles')
    <style>
        .cont {
            display: flex;
            justify-content: space-between;
        }

        .box {
            margin-top: 30px;
            transform: translate(-50%, -50%);
            background-color: #fff;
            border-radius: 5px;
            padding: 30px 90px;
            box-shadow: 5px;
            text-align: left;
            box-sizing: border-box;
            box-shadow: -1px 1px 5px #4f4e4e;
        }

        .box h2 {
            font-size: 20px;
            font-weight: 300;
        }
        .box h3 {
            font-size: 35px;
        }
    </style>
@endpush

@section('content')
<div>
        <h1>Sistema Bilioteca</h1>
        <div class="date">
            <input type="date" name="" id="">
        </div>
        <div class="insights">
            <div class="sales">
                <i class="fa fa-book"></i>
                <div class="middle">
                    <div class="left">
                        <h3>Total de Materiais</h3>
                        <h1>{{ $total['material'] }}</h1>
                    </div>
                </div>
              
            </div>
            <!--End of sales-->

            <div class="expenses">
                <i class="fa fa-handshake"></i>
                <div class="middle">
                    <div class="left">
                        <h3>Total de Empréstimos</h3>
                        <h1>{{ $total['emprestimo'] }}</h1>
                    </div>
                
                </div>
              
            </div>
            <!--End of expenses-->

            <div class="teste">
                <i class="fa fa-users"></i>
                <div class="middle">
                    <div class="left">
                        <h3>Total de Visitantes</h3>
                        <h1>{{ $total['visitante'] }}</h1>
                    </div>
                    
                </div>
              
            </div>
            <div class="income">
                <i class="fa fa-file-text"></i>
                    <div class="middle">
                    <div class="left">
                        <h3>Consulta</h3>
                        <h1>{{ $total['consulta'] }}</h1>
                    </div>
                </div>
              
            </div>
            
            <!--End of income-->
        </div>
        <br><br>
        <div class="cont">
            <div style="width: 900px; height: 500px;">
                <h1>Livros mais emprestados</h1>
                <canvas id="myChart" ></canvas>
            </div>
                
                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                
                <script>
                const ctx = document.getElementById('myChart');
                
                new Chart(ctx, {
                    type: 'bar',
                    data: {
                    labels: ['Promação em C', 'Quem me dera ser onda', 'Engenharia de Requisitos', 'Fundamentos da programação', 'Empreendedorismo - 10 classe'],
                    datasets: [{
                        label: '# of Votes',
                        data: [8, 10, 3, 5, 2],
                        borderWidth: 1
                    }]
                    },
                    options: {
                    scales: {
                        y: {
                        beginAtZero: true
                        }
                    }
                    }
                });
                </script>
        </div>
</div>
@endsection