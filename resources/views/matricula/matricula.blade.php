@extends('layouts.base')

@section('titulo', 'Matrícula de aluno')

@section('conteudo')
    <h1 class="mt-5"> Matricular aluno</h1>
    <form action = "{{route('SalvarMatricula')}}" method="post">
        {{csrf_field()}}
        <div class="field">
            <label for="nome">Nome do aluno:</label>
            <input type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" id="nome"/>

            @error('nome')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

        </div>

        <br /><div class="field">
            <label for="email">E-mail:</label>
            <input class="form-control @error('email') is-invalid @enderror"  name="email" id="email"/>
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <br /><div class="field">
        <label for="turma_id">Selecione a modalidade:</label>
        @foreach( DB::table('modalidades')->get() as $modality)
            <div class="col">
                <div class="form-check">
                    <input type="radio" name="modalidade_id" value="{{ $modality->id }}" id="{{ $modality->id }}" checked="">
                    <label class="form-check-label" for="{{$modality->id}}">{{ $modality->nome }} - R$ {{ $modality->valorMensalidade }}
                    </label>
                </div>
            </div>
        @endforeach
        </div>
        
        <br /><div class="field">
            <label for="qntMeses">Duração do plano:</label>
            <div class="col">
                <div class="form-check">
                    <div class="radio">
                        <input type="radio" name="qntMeses" value="anual" id="anual"  checked="">
                        <label for="anual" class="form-radio">Anual</label>
                    </div>  
                    <div class="radio">
                        <input type="radio" name="qntMeses" value="semestral" id="semestral">
                        <label for="semestral" class="form-radio">Semestral</label>
                    </div>  
                    <div class="radio">
                        <input type="radio" name="qntMeses" value="trimestral" id="trimestral">
                        <label for="trimestral" class="form-radio">Trimestral</label>
                    </div>  
                    <div class="radio">
                        <input type="radio" name="qntMeses" value="bimestral" id="bimestral">
                        <label for="bimestral" class="form-radio">Bimestral</label>
                    </div> 
                </div> 
            </div> 
        </div>

        
        <br /><div class="field">
            <label for="taxaMatricula">Valor da taxa de matrícula:</label>

            <input class="form-control @error('taxaMatricula') is-invalid @enderror" type="double" name="taxaMatricula"  placeholder="Ex.: 100.00">

            @error('taxaMatricula')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        

        <br /><div class="field">
            <label for="turma_id">Selecione a turma:</label>
            @foreach( DB::table('turmas')->get() as $turma)
                <div class="col">
                    <div class="form-check">
                        <input type="radio" name="turma_id" value="{{ $turma->id }}" id="{{ $turma->id }}" checked="">
                        <label class="form-check-label" for="{{$turma->id}}">{{ $turma->nome }} - {{ $turma->horario }} - {{ $turma->faixaEtaria }}</label></br>
                    </div>
                </div></br>
            @endforeach
        </div>
            
        <div class="btn">
            <button class="btn btn-outline-dark" type="submit">Matricular</button>
        </div>
    </form>

    
@endsection

    
