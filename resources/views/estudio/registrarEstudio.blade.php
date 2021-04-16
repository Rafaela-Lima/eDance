@extends('layouts.base')

@section('titulo', 'Registro de Estúdio')

@section('conteudo')
    <h1 class="mt-5"> Registrar estúdio</h1>
    <form action = "{{route('SalvarEstudio')}}" method="post">
        {{csrf_field()}}

        <div class="field"><br />
            <label for="nome">Nome:</label>
            <input type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" id="nome"/>

            @error('nome')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        </br><div class="btn">
            <button class="btn btn-outline-dark" type="submit">Registrar</button>
        </div>
    </form>

    
@endsection

