<!DOCTYPE html>
<html>
<head>
    <title>{{ config('app.name')}} : @yield('nome_pagina')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css')}}">
    <style>

        * {
            margin: 0;
            padding: 0;
        }

        .menu {
            width: 100%;
            height: 50px;
            background: rgb(241, 166, 166);
            font-family: 'Arial';
        }

        .menu ul {
            list-style: none;
            position: relative;
        }

        .menu ul li {
            width: 150px;
            background: tomato;
            float: left;
        }

        .menu a {
            background-color: rgb(241, 166, 166);
            padding: 15px;
            display: block;
            text-decoration: none;
            text-align: center;
            color: #fff;
        }

        .menu a:hover {
            background-color: rgb(241, 149, 149);
            color: #fff;
        }

        .menu ul ul {
            position: absolute;
            visibility: hidden;
        }

        .menu ul li:hover ul {
            visibility: visible;
        }

        .menu ul ul li {
            float: none;
            border-bottom: solid 1px #ccc;
        }

        .menu ul ul li a {
            background-color: rgb(216, 214, 214);
        }

        label[for="bt_menu"] {
            padding: 5px;
            background-color: rgb(181, 201, 231);
            color: #fff;
            font-family: 'Arial';
            text-align: center;
            font-size: 30px;
            cursor: pointer;
            width: 50px;
            height: 50px;
            display: none;
        }

        #bt_menu {
            display: none;
        }

        @media (max-width: 800px) {
            label[for="bt_menu"] {
                display: block;
            }

            #bt_menu:checked ~ .menu {
                margin-left: 0;
            }

            .menu {
                margin-top: 5px;
                margin-left: -100%;
                transition: all .4s;
            }

            .menu ul li {
                width: 100%;
                float: none;
            }

            .menu ul ul {
                position: static;
                overflow: hidden;
                max-height: 0;
                transition: all .8s;
            }

            .menu ul li:hover ul {
                height: auto;
                max-height: 200px;
            }
        }
    </style>

    <style>
        .table-responsive {
            width: 100% !important;
            margin-top: 200px;
        }

        .table {
            border: 5px solid pink;
            width: 50% !important; /*Importante manter o !important rs */
            margin: auto;
        }

    </style>

</head>
<body style="margin-top: -17px">

<input type="checkbox" id="bt_menu">
<label for="bt_menu">&#9776;</label>

<nav class="menu">
    <ul>
        <li>
            <a class="dropdown-item" href="{{ route('login') }}"
               onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                {{ __('Home') }}

            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <form id="logout-form" action="{{ route('login') }}" method="GET" class="d-none">
                    @csrf
                </form>
            </div>

        <li>
            <a href="#">Aluno</a>
            <ul>
                <li><a href="{{route('CadastroAluno')}}">Cadastrar Aluno</a></li>
                <li><a href="{{route('ProcuraAluno')}}">Pesquisar Aluno</a></li>
            </ul>
        </li>

        <li>
            <a href="#">Matr??cula</a>
            <ul>
                <li><a href="{{route('MatriculaAluno')}}">Nova Matr??cula</a></li>
                <li><a href="{{route('ProcuraMatricula')}}">Pesquisar Matr??cula</a></li>
            </ul>
        </li>

        <li>
            <a href="#">Turma</a>
            <ul>
                <li><a href="{{route('RegistrarTurma')}}">Registrar Turma</a></li>
                <li><a href="{{route('GerenciarTurma')}}">Pesquisar Turma</a></li>
            </ul>
        </li>

        <li>
            <a href="#">Funcion??rio</a>
            <ul>
                <li><a href="{{route('InsereFuncionario')}}">Cadastrar Funcion??rio</a></li>
                <li><a href="{{route('VincularProfessor')}}">Vincular Professor ?? Modalidade</a></li>
                <li><a href="{{route('ProcuraFuncionario')}}">Pesquisar Funcion??rio</a></li>
            </ul>
        </li>

        <li>
            <a href="#">Modalidade</a>
            <ul>
                <li><a href="{{route('RegistrarModalidade')}}">Registrar Modalidade</a></li>
                <li><a href="{{route('GerenciarModalidade')}}">Gerenciar Modalidades</a></li>
            </ul>
        </li>

        <li>
            <a href="#">Est??dio</a>
            <ul>
                <li><a href="{{route('RegistrarEstudio')}}">Registrar Est??dio</a></li>
                <li><a href="{{route('GerenciarEstudio')}}">Gerenciar Est??dios</a></li>
            </ul>
        </li>

        <li class="float-right">
            <a href="#">{{ Auth::user()->name }}</a>
            <ul style="padding-left: 0px">
                <li>
                    <form id="logout-form" action="{{ route('user.logout') }}" method="POST">
                        @csrf
                        <button class="btn btn-primary" type="submit">SAIR</button>
                    </form>
                </li>
            </ul>

        </li>

    </ul>
</nav>
<div class="container"> <!-- todo o conte??do ficar?? no container-->
    @yield('conteudo')
</div>
<footer>
    <div style='text-align:center'>
        <p> eDance - 2021 </p>
    </div>
</footer>
</body>
</html>
