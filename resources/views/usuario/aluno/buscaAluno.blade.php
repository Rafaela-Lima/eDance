@extends('layouts.base')
@section('nome_pagina')
    Busca aluno
@endsection
@section('conteudo')
        <form action=" {{ route('ProcuraAluno') }}" method="GET">
            @csrf

            <div class="form-group">
                <h4 style="margin-top: 10px;">
                    Pesquisar Aluno
                </h4>
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
                            <form method="GET"
                                  action="{{ route('EditarCadastro', ['id' => $aluno->usuable_id]) }}">
                                <td>
                                    <button type="submit" class="btn btn-primary">Atualizar</button>
                                </td>
                            </form>
                            <form method="GET"
                                  action="{{ route('DeletarCadastro',  ['id' => $aluno->usuable_id]) }}">
                                <td>
                                    <button type="submit" class="btn btn-primary">Remover</button>
                                </td>
                            </form>
                        </tr>
                    @endforeach



                @else
                    <tr>
                        <td>A busca não retornou resultados.</td>
                    </tr>
                @endif

                </tbody>

            </table>

        @endif



@endsection
