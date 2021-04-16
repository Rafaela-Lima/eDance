@extends('layouts.base')

@section('titulo', 'Cadastro de aluno')

@section('conteudo')
    <h1 class="mt-5"> Cadastro de aluno</h1>

    <form method="POST" action="{{ route('SalvarAluno') }}">
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

        <div class="field">
            <label for="email">E-mail:</label>
            <input class="form-control @error('email') is-invalid @enderror"  name="email" id="email"/>
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="field">
            <label for="senha">Senha:</label>
            <input type="password" name="senha" id="senha" class="form-control @error('senha') is-invalid @enderror"/>
            @error('senha')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

       <div class="field">
            <label for="senha_confirmation">Confirme a senha:</label>
            <input id="senha_confirmation" type="password" class="form-control" name="senha_confirmation">
        </div> 

        <div class="field">
            <label for="endereco">Endereço:</label>
            <input type="text" class="form-control @error('endereco') is-invalid @enderror" name="endereco" id="endereco"  placeholder="Ex.: Rua, nº"/>
            @error('endereco')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="field">
            <label for="cpf">CPF:</label>
            <input type="text" name="cpf" class="form-control @error('cpf') is-invalid @enderror" placeholder="Ex.: 000.000.000-00">
            @error('cpf')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="field">
            <label for="rg">RG:</label>
            <input type="text" name="rg" class="form-control @error('rg') is-invalid @enderror" placeholder="Ex.: 00.000.000-0">
            @error('rg')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="field">
            <label for="cidade">Cidade:</label>
            <input type="text" class="form-control @error('cidade') is-invalid @enderror" name="cidade" id="cidade"/>
            @error('cidade')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="field">
            <label for="cep">CEP:</label>
            <input type="text" name="cep" class="form-control @error('cep') is-invalid @enderror" placeholder="Ex.: 00000-000">
            @error('cep')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="field">
            <label for="contato">Contato:</label>
            <input type="text" name="contato" class="form-control @error('contato') is-invalid @enderror" placeholder="Ex.: (00) 00000-0000">
            @error('contato')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="field">
            <label for="dataNasc">Data de Nascimento:</label>
            <input type="date" class="form-control @error('dataNasc') is-invalid @enderror" name="dataNasc" id="dataNasc"/>
            @error('dataNasc')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="field">
            <label for="qntModalidades">Quantas modalidades pretende fazer?</label>
            <input type="integer" class="form-control @error('qntModalidades') is-invalid @enderror" name="qntModalidades">
            @error('qntModalidades')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div></br>

        <div class="btn">
            <button class="btn btn-outline-dark" type="submit">Cadastrar</button>
        </div>
    </form>
    
@endsection

       
