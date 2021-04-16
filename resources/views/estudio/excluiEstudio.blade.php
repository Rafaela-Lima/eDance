@extends('layouts.base')

@section('titulo', 'Excluir estúdio')

@section('conteudo')
<tr>     
    <div class="field">
        <H2 for="">Tem certeza que deseja excluir o estúdio?</H2> 
    </div>
    <form method="POST" action="{{ route('ExcluirEstudio', ['id' => $estudio->id]) }}">
    @csrf
        <div class = "button">
            <td><button type="submit" class="btn btn-primary">Sim</button> </td>
        </div>
    </form>
    <br>
    <form method="GET" action="{{ route('GerenciarEstudio') }}">
        <div class = "button">
            <td><button type="submit" class="btn btn-primary">Não</button> </td>  
        </div>
    </form>
</tr> 

@endsection
