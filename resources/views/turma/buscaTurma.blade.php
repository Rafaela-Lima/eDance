<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name')}} : Buscar Turma</title>

    <link rel="stylesheet" href="{{ asset('css/app.css')}}">

{{csrf_field()}}
<body>

    <div class="container" >

        <div class="row">

            <div class="col-md-6" style="margin-top: 40px">

                <h4>Pesquisar turma</h4><hr>

                <form action=" {{ route('GerenciarTurma') }}" method="GET">

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

                @if(isset($turmas)) 

                <table class="table table-hover">

                    <thead>
                        <!-- Aqui podem ser selecionados outros campos para serem mostrados -->
                        <tr>
                            <th>Nome</th>
                            <th>Horário</th>
                        </tr>

                    </thead>

                    <tbody>

                        @if(count($turmas) > 0)
                            @foreach($turmas as $turma)
                                <!--Os campos alterados acima precisam ser alterados aqui também-->
                                <tr>
                                    <td>{{ $turma->nome }}</td>
                                    <td>{{ $turma->horario }}</td>
                                    <form method="GET" action="{{ route('EditarTurma', ['id' => $turma->id]) }}">
                                        <td><button type="submit" class="btn btn-primary">Atualizar</button> </td>
                                    </form>
                                    <form method="GET" action="{{ route('DeletarTurma',  ['id' => $turma->id]) }}">
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
