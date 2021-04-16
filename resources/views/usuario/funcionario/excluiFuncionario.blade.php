@extends('layouts.base')

@section('titulo', 'Excluir funcionário')

@section('conteudo')
<tr>     
    <div class="field">
        <H2 for="">Tem certeza que deseja excluir o cadastro do funcionário?</H2> 
    </div>
    <form method="POST" action="{{ route('ExcluirFuncionario', ['id' => $funcionario->id]) }}">
    @csrf
        <div class = "button">
            <td><button type="submit" class="btn btn-primary">Sim</button> </td>
        </div>
    </form>
    <br>
    <form method="GET" action="{{ route('ProcuraFuncionario') }}">
        <div class = "button">
            <td><button type="submit" class="btn btn-primary">Não</button> </td>  
        </div>
    </form>
</tr> 

@endsection
