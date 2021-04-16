@extends('layouts.base')

@section('titulo', 'Excluir aluno')

@section('conteudo')
<tr>     
    <div class="field">
        <H2 for="">Tem certeza que deseja excluir o cadastro?</H2> 
    </div>
    <form method="POST" action="{{ route('ExcluirCadastro', ['id' => $aluno->id]) }}">
    @csrf
        <div class = "button">
            <td><button type="submit" class="btn btn-primary">Sim</button> </td>
        </div>
    </form>
    <br>
    <form method="GET" action="{{ route('ProcuraAluno') }}">
        <div class = "button">
            <td><button type="submit" class="btn btn-primary">Não</button> </td>  
        </div>
    </form>
</tr> 

@endsection
