@extends('layouts.base')

@section('titulo', 'Editar aluno')

@section('conteudo')
    <h1 class="mt-5"> Atualizar cadastro de aluno</h1>
    <form method="POST" action="{{ route('AlterarCadastro', ['id' => $aluno->id]) }}">
        {{csrf_field()}}
        <div class="field"><br />
            <label for="nome">Nome:</label>
            <input type="text" value="{{$usuario->nome}}" class="form-control @error('nome') is-invalid @enderror" name="nome" id="nome"/>
            @error('nome')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="field">
            <label for="email">E-mail:</label>
            <input  value="{{$usuario->email}}" class="form-control @error('email') is-invalid @enderror"  name="email" id="email"/>
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="field">
            <label for="endereco">Endereço:</label>
            <input type="text" value="{{$usuario->endereco}}" class="form-control @error('endereco') is-invalid @enderror" name="endereco" id="endereco"  placeholder="Ex.: Rua, nº"/>
            @error('endereco')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="field">
            <label for="cpf">CPF:</label>
            <input type="text" value="{{$usuario->cpf}}" name="cpf" class="form-control @error('cpf') is-invalid @enderror" placeholder="Ex.: 000.000.000-00">
            @error('cpf')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="field">
            <label for="rg">RG:</label>
            <input type="text" name="rg" value="{{$usuario->rg}}" class="form-control @error('rg') is-invalid @enderror" placeholder="Ex.: 00.000.000-0">
            @error('rg')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="field">
            <label for="cidade">Cidade:</label>
            <input type="text" value="{{$usuario->cidade}}" class="form-control @error('cidade') is-invalid @enderror" name="cidade" id="cidade"/>
            @error('cidade')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="field">
            <label for="cep">CEP:</label>
            <input type="text" name="cep" value="{{$usuario->cep}}" class="form-control @error('cep') is-invalid @enderror" placeholder="Ex.: 00000-000">
            @error('cep')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="field">
            <label for="contato">Contato:</label>
            <input type="text" name="contato" value="{{$usuario->contato}}" class="form-control @error('contato') is-invalid @enderror" placeholder="Ex.: (00) 00000-0000">
            @error('contato')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="field">
            <label for="dataNasc">Data de Nascimento:</label>
            <input type="date" value="{{$usuario->dataNasc}}" class="form-control @error('dataNasc') is-invalid @enderror" name="dataNasc" id="dataNasc"/>
            @error('dataNasc')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="field">
            <label for="qntModalidades">Quantas modalidades pretende fazer?</label>
            <input type="integer" value="{{$aluno->qntModalidades}}" class="form-control @error('qntModalidades') is-invalid @enderror" name="qntModalidades">
            @error('qntModalidades')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div></br>

        <div class="btn">
            <button class="btn btn-outline-dark" type="submit">Salvar</button>
        </div>
    </form>
    
@endsection
