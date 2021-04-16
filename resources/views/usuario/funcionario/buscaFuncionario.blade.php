<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name')}} : Buscar Funcionário</title>

    <link rel="stylesheet" href="{{ asset('css/app.css')}}">

{{csrf_field()}}
<body>

    <div class="container" >

        <div class="row">

            <div class="col-md-6" style="margin-top: 40px">

                <h4>Pesquisar funcionário</h4><hr>

                <form action=" {{ route('ProcuraFuncionario') }}" method="GET">

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

                @if(isset($funcionarios)) 

                <table class="table table-hover">

                    <thead>
                        <!-- Aqui podem ser selecionados outros campos para serem mostrados -->
                        <tr>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Endereço</th>
                            <th>Número da Carteira de Trabalho</th>
                        </tr>

                    </thead>

                    <tbody>

                        @if(count($funcionarios) > 0)
                            @foreach($funcionarios as $funcionario)
                                <!--Os campos alterados acima precisam ser alterados aqui também-->
                                <tr>
                                    <td>{{ $funcionario->nome }}</td>
                                    <td>{{ $funcionario->email }}</td>
                                    <td>{{ $funcionario->endereco }}</td>
                                    <td>{{ $funcionario->noCarteiraTrab }}</td>
                                    <form method="GET" action="{{ route('EditarFuncionario', ['id' => $funcionario->usuable_id]) }}">
                                        <td><button type="submit" class="btn btn-primary">Atualizar</button> </td>
                                    </form>
                                    <form method="GET" action="{{ route('DeletarFuncionario',  ['id' => $funcionario->usuable_id]) }}">
                                        <td><button type="submit" class="btn btn-primary">Remover</button> </td>
                                    </form>
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
