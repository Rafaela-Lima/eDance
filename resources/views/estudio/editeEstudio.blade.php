@extends('layouts.base')

@section('titulo', 'Editar estúdio')

@section('conteudo')
    <h1 class="mt-5"> Atualizar estúdio</h1>
    <form method="POST" action="{{ route('AlterarEstudio', ['id' => $estudio->id]) }}">
        {{csrf_field()}}
        <div class="field">
            <label for="nome">Nome do estúdio:</label>
            <input type="text" name="nome" value="{{$estudio->nome}}" class="form-control @error('nome') is-invalid @enderror" id="nome"/>
            @error('nome')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        </br><div class="btn">
            <button class="btn btn-outline-dark" type="submit">Salvar</button>
        </div>
    </form>

    
@endsection
