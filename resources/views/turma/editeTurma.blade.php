@extends('layouts.base')

@section('titulo', 'Editar turma')

@section('conteudo')
<h1 class="mt-5"> Atualizar turma</h1>
<form method="POST" action="{{ route('AlterarTurma', ['id' => $turma->id]) }}">
        {{csrf_field()}}
        <div class="field">
            <label for="nome">Nome:</label>

            <input value="{{$turma->nome}}" type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" id="nome"/>

            @error('nome')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <br /><div class="field">
            <label for="">Modalidade atual:</label>
            <input type="text" value="{{$modalidade->nome}}" class="form-control @error('nomeModalidade') is-invalid @enderror" name="nomeModalidade" id="nomeModalidade"/>
            @error('nomeModalidade')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="field">
        <label for="modalidade_id">Alterar modalidade:</label>
        @foreach( DB::table('modalidades')->get() as $modality)
            <div class="col">
                <div class="form-check">
                    <input type="radio" name="modalidade_id" value="{{ $modality->id }}" id="{{ $modality->id }}" checked="">
                    <label class="form-check-label" for="{{$modality->id}}">{{ $modality->nome }} </label>
                </div>
            </div>
        @endforeach
        </div>

        <br /><div class="field">
            <label for="">Estúdio atual:</label>
            <input value="{{$estudio->nome}}" class="form-control @error('nomeEstudio') is-invalid @enderror" name="nomeEstudio" id="nomeEstudio"/>
            @error('nomeEstudio')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="field">
        <label for="estudio_id">Alterar estúdio:</label>
        @foreach( DB::table('estudios')->get() as $est)
            <div class="col">
                <div class="form-check">
                    <input type="radio" name="estudio_id" value="{{ $est->id }}" id="{{ $est->id }}" checked="">
                    <label class="form-check-label" for="{{$est->id}}">
                        {{ $est->nome }}
                    </label>
                </div>
            </div>
        @endforeach
        </div>

        <br /><div class="field">
            <label for="">Professor atual:</label>
            <input value="{{$professor->nome}}" class="form-control @error('nomeProfessor') is-invalid @enderror" name="nomeProfessor" id="nomeProfessor"/>
            @error('nomeProfessor')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        </br><div class="field">
        <label for="funcionario_id">Alterar o professor:</label>
        @foreach($funcionarios as $func)
            <div class="col">
                <div class="form-check">
                    <input type="radio" name="funcionario_id" value="{{ $func->usuable_id }}" id="{{ $func->usuable_id }}" checked="">
                    <label class="form-check-label" for="{{$func->usuable_id}}">
                        {{$func->nome}}
                    </label>
                </div>
            </div>
        @endforeach
        </div>

        </br><div class="field">
            <label for="">Nível atual da turma:</label>
            <input value="{{$turma->nivel}}" class="form-control @error('') is-invalid @enderror" />
            @error('')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        
        <div class="field">
            <label for="nivel">Alterar nível da turma:</label>
            <div class="col">
                <div class="form-check">
                    <div class="radio">
                        <input type="radio" name="nivel" value="baixo" id="baixo"  checked="">
                        <label for="baixo" class="form-radio">Básico</label>
                    </div> 
                    <div class="radio">
                        <input type="radio" name="nivel" value="médio" id="médio">
                        <label for="médio" class="form-radio">Intermediário</label>
                    </div> 
                    <div class="radio">
                        <input type="radio" name="nivel" value="alto" id="alto">
                        <label for="alto" class="form-radio">Avançado</label>
                    </div> 
                </div> 
            </div>
        </div>

        </br><div class="field">
            <label for="">Faixa etária atual da turma:</label>
            <input value="{{$turma->faixaEtaria}}"  class="form-control @error('') is-invalid @enderror"/>
            @error('')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="field">
            <label for="faixaEtaria">Alterar faixa etária da turma:</label>
            <div class="col">
                <div class="form-check">
                    <div class="radio">
                        <input type="radio" name="faixaEtaria" value="crianças" id="crianças"  checked="">
                        <label for="crianças" class="form-radio">Crianças</label>
                    </div>
                    <div class="radio">
                        <input type="radio" name="faixaEtaria" value="adolescentes" id="adolescentes">
                        <label for="adolescentes" class="form-radio">Adolescentes</label>
                    </div>           
                    <div class="radio">
                        <input type="radio" name="faixaEtaria" value="jovens" id="jovens">
                        <label for="jovens" class="form-radio">Jovens</label>
                    </div>
                    <div class="radio">
                        <input type="radio" name="faixaEtaria" value="adultos" id="adultos">
                        <label for="adultos" class="form-radio">Adultos</label>
                    </div>

                    <div class="radio">
                        <input type="radio" name="faixaEtaria" value="idosos" id="idosos">
                        <label for="idosos" class="form-radio">Idosos</label>
                    </div>  
                </div>
            </div>
        </div>

        </br><div class="field">
            <label for="qntAlunos">Quantidade máxima de alunos na turma:</label>

            <input value="{{$turma->qntAlunos}}" type="integer" class="form-control @error('qntAlunos') is-invalid @enderror" type="integer" name="qntAlunos">
            @error('qntAlunos')

                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        </br><div class="field">
            <label for="horario">Horário de aulas:</label>
            <input value="{{$turma->horario}}" type="time" class="form-control @error('horario') is-invalid @enderror" name="horario" id="horario"/>
            @error('horario')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        </br><div class="btn">
            <button class="btn btn-outline-dark" type="submit">Salvar</button>
        </div>

    </div>

    
@endsection
