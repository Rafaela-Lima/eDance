@extends('layouts.base')

@section('titulo', 'Excluir turma')

@section('conteudo')
<tr>     
    <div class="field">
        <H2 for="">Tem certeza que deseja excluir a turma?</H2> 
    </div>
    <form method="POST" action="{{ route('ExcluirTurma', ['id' => $turma->id]) }}">
    @csrf
        <div class = "button">
            <td><button type="submit" class="btn btn-primary">Sim</button> </td>
        </div>
    </form>
    <br>
    <form method="GET" action="{{ route('GerenciarTurma') }}">
        <div class = "button">
            <td><button type="submit" class="btn btn-primary">Não</button> </td>  
        </div>
    </form>
</tr> 

@endsection
