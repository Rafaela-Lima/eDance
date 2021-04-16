@extends('layouts.base')

@section('titulo', 'Registro de Turma')

@section('conteudo')
    <h1 class="mt-5"> Registro de turma</h1>
    <form action = "{{route('SalvarTurma')}}" method="post">
        {{csrf_field()}}
        <div class="field">
            <label for="nome">Nome:</label>

            <input type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" id="nome" placeholder="Ex.: Turma A - modalidade"/>

            @error('nome')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <br /><div class="field">
        <label for="modalidade_id">Selecione a modalidade:</label>
        @foreach( DB::table('modalidades')->get() as $modality)
            <div class="col">
                <div class="form-check">
                    <input type="radio" name="modalidade_id" value="{{ $modality->id }}" id="{{ $modality->id }}" checked="">
                    <label class="form-check-label" for="{{$modality->id}}">{{ $modality->nome }}
                    </label>
                </div>
            </div>
        @endforeach
        </div>

        </br><div class="field">
        <label for="estudio_id">Selecionar o estúdio:</label>
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

        </br><div class="field">
        <label for="funcionario_id">Selecione o professor:</label>
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
            <label for="nivel">Nível da turma:</label>
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
            <label for="faixaEtaria">Faixa etária da turma:</label>
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
            <input type="number" max="25" class="form-control @error('qntAlunos') is-invalid @enderror" name="qntAlunos" id="qntAlunos"/>

            @error('qntAlunos')

                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>


        </br><div class="field">
            <label for="horario">Horário de aulas:</label>

            <input type="time" class="form-control @error('horario') is-invalid @enderror" name="horario" id="horario"/>
            @error('horario')
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


