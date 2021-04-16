<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name')}} :: @yield('titulo')</title> <!-- "echo" dentro do blade-->

    <link rel="stylesheet" href="{{ asset('css/app.css')}}">
</head>
<body>

    <div class="container" >

        <div class="row">

            <div class="col-md-6" style="margin-top: 40px">

                <h4>Pesquisar aluno</h4><hr>

                <form action=" {{ route('ProcuraCadastro') }}" method="GET">

                    <div class="form-group">

                        <label for="">Digite um nome</label>

                        <input type="text" class="form-control" name="consulta" placeholder="Pesquise aqui">

                    </div>

                    <div class="form-group">

                        <button type="submit" class="btn btn-primary">Buscar</button>

                    </div>

                </form>

                <br>
                <br>
                <br>
                <br>
                <br>

                @if(isset($alunos)) 

                <table class="table table-hover">

                    <thead>
                        <!-- Aqui podem ser selecionados outros campos para serem mostrados -->
                        <tr>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Endereço</th>
                        </tr>

                    </thead>

                    <tbody>

                        @if(count($alunos) > 0)

                            @foreach($alunos as $aluno)

                                <!--Os campos alterados acima precisam ser alterados aqui também-->
                                <tr>
                                    <td>{{ $aluno->nome }}</td>
                                    <td>{{ $aluno->email }}</td>
                                    <td>{{ $aluno->endereco }}</td>
                                    <td><button type="submit" class="btn btn-primary"> Atualizar </button></td>
                                    <td><button type="submit" class="btn btn-primary"> Remover </button></td>
                                </tr>

                            @endforeach

                        @else
                            <tr><td>A busca não retornou resultados.</td></tr>
                        @endif

                    </tbody>

                </table>

                @endif
            </div>

        </div>


    </div>

</body>
</html>