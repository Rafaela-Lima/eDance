@extends('layouts.base')

@section('titulo', 'Editar modalidade')

@section('conteudo')
    <h1 class="mt-5"> Atualizar modalidade</h1>
    <form method="POST" action="{{ route('AlterarModalidade', ['id' => $modalidade->id]) }}">
        {{csrf_field()}}
        <div class="field">
            <label for="nome">Nome da modalidade:</label>
            <input type="text" name="nome" value="{{$modalidade->nome}}" class="form-control @error('nome') is-invalid @enderror" id="nome"/>
            @error('nome')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        </br><div class="field">
            <label for="valorMensalidade">Valor da mensalidade:</label>
            <input type="double" value="{{$modalidade->valorMensalidade}}" name="valorMensalidade" class="form-control @error('valorMensalidade') is-invalid @enderror" id="valorMensalidade" placeholder="Ex.: 100.00"><br />
            @error('valorMensalidade')
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
