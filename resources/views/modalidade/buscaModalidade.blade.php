<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name')}} : Buscar Modalidade</title>

    <link rel="stylesheet" href="{{ asset('css/app.css')}}">

{{csrf_field()}}
<body>

    <div class="container" >

        <div class="row">

            <div class="col-md-6" style="margin-top: 40px">

                <h4>Pesquisar modalidade</h4><hr>

                <form action=" {{ route('GerenciarModalidade') }}" method="GET">

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

                @if(isset($modalidades)) 

                <table class="table table-hover">

                    <thead>
                        <!-- Aqui podem ser selecionados outros campos para serem mostrados -->
                        <tr>
                            <th>Nome</th>
                            <th>Valor Mensalidade</th>
                        </tr>

                    </thead>

                    <tbody>

                        @if(count($modalidades) > 0)
                            @foreach($modalidades as $modalidade)
                                <!--Os campos alterados acima precisam ser alterados aqui também-->
                                <tr>
                                    <td>{{ $modalidade->nome }}</td>
                                    <td>{{ $modalidade->valorMensalidade }}</td>
                                    <form method="GET" action="{{ route('EditarModalidade', ['id' => $modalidade->id]) }}">
                                        <td><button type="submit" class="btn btn-primary">Atualizar</button> </td>
                                    </form>
                                    <form method="GET" action="{{ route('DeletarModalidade',  ['id' => $modalidade->id]) }}">
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
