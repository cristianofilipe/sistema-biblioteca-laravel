@extends('layout.app')

@section('title', 'Home')

@section('content')

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
                    <h1>45</h1>
                </div>
            </div>
          
        </div>
        <!--End of sales-->

        <div class="expenses">
            <i class="fa fa-handshake-o"></i>
            <div class="middle">
                <div class="left">
                    <h3>Total de Empréstimos</h3>
                    <h1>11</h1>
                </div>
            
            </div>
          
        </div>
        <!--End of expenses-->

        <div class="teste">
            <i class="fa fa-users"></i>
            <div class="middle">
                <div class="left">
                    <h3>Total de Funcionários</h3>
                    <h1>7</h1>
                </div>
                
            </div>
          
        </div>
        <div class="income">
            <i class="fa fa-file-text-o"></i>
                <div class="middle">
                <div class="left">
                    <h3>Total de Relatórios</h3>
                    <h1>10</h1>
                </div>
            </div>
          
        </div>
        
        <!--End of income-->
    </div>
    <div class="recent-order">
        <h2>Dados Gerais</h2>
        <table>
            <thead>
                <tr>
                    
                    <th>Usuários</th>
                    <th>Visitantes</th>
                    <th>Empréstimos</th>
                    <th colspan="2">Livros</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Foldable Mini Drone</td>
                    <td>85631</td>
                    <td>Due</td>
                    <td class="warning">Pending</td>
                   
                </tr>
                <tr>
                    <td>Foldable Mini Drone</td>
                    <td>85631</td>
                    <td>Due</td>
                    <td class="warning">Pending</td>
                   
                </tr>
                <tr>
                    <td>Foldable Mini Drone</td>
                    <td>85631</td>
                    <td>Due</td>
                    <td class="warning">Pending</td>
                  
                </tr>
                <tr>
                    <td>Foldable Mini Drone</td>
                    <td>85631</td>
                    <td>Due</td>
                    <td class="warning">Pending</td>
                  
                </tr>
                <tr>
                    <td>Foldable Mini Drone</td>
                    <td>85631</td>
                    <td>Due</td>
                    <td class="warning">Pending</td>
                  
                </tr>
            </tbody>
        </table>
        <a href="#">Show All</a>
    </div>
</main>
<div class="right">
    <div class="top">
        <button id="menu-btn">
            <i class="fa fa-bars"></i>
        </button>
        <div class="theme-toggler">
            <i class="fa fa-sun-o active"></i>
            <i class="fa fa-moon-o"></i>
        </div>
        <div class="profile">
            <div class="profile-photo">
            <a href="">
                <i class="fa fa-user" style="font-size: 2rem;"></i>
            </a>
            </div>
        </div>
    </div>
    <!--End of the top-->
    <div class="recent-updates">
    </div>
    <!--End of the recent updates-->
@endsection