@extends('layouts.base')

@section('titulo', 'Excluir modalidade')

@section('conteudo')
<tr>     
    <div class="field">
        <H2 for="">Tem certeza que deseja excluir a modalidade?</H2> 
    </div>
    <form method="POST" action="{{ route('ExcluirModalidade', ['id' => $modalidade->id]) }}">
    @csrf
        <div class = "button">
            <td><button type="submit" class="btn btn-primary">Sim</button> </td>
        </div>
    </form>
    <br>
    <form method="GET" action="{{ route('GerenciarModalidade') }}">
        <div class = "button">
            <td><button type="submit" class="btn btn-primary">Não</button> </td>  
        </div>
    </form>
</tr> 

@endsection
