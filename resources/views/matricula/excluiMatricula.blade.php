@extends('layouts.base')

@section('titulo', 'Excluir matrícula')

@section('conteudo')
<tr>     
    <div class="field">
        <H2 for="">Tem certeza que deseja excluir a matrícula?</H2> 
    </div>
    <form method="POST" action="{{ route('ExcluirMatricula', ['id' => $matricula->id]) }}">
    @csrf
        <div class = "button">
            <td><button type="submit" class="btn btn-primary">Sim</button> </td>
        </div>
    </form>
    <br>
    <form method="GET" action="{{ route('ProcuraMatricula') }}">
        <div class = "button">
            <td><button type="submit" class="btn btn-primary">Não</button> </td>  
        </div>
    </form>
</tr> 

@endsection
