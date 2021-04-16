@extends('layouts.base')

@section('titulo', 'Vincular Professor à Modalidade')

@section('conteudo')
    <form action = "{{route('SalvarProfessor')}}" method="post">
        {{csrf_field()}}
        <br /><div class="form-group row">
            <label for="nome">Nome do professor:</label>
            <input required="required" type="text" name="nome" id="nome"/><br />
            @error('nome')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div><br />

        <div class="form-group row">
            <label for="email">E-mail:</label>
            <input required="required" type="email" name="email" id="email"/><br />
        </div><br />

        <div class="form-group row">
            <?php 
                use App\Models\Funcionario; 
                $count = 0;
                $funcionarios = Funcionario::where('categoria', '=', 'p')->get();
                foreach ($funcionarios as $funcionario) {
                    $noCart[] = $funcionario->noCarteiraTrab;
                    $idP[] = $funcionario->id;
                }
            ?>
            <label for="noCarteiraTrab" class="col-md-4 col-form-label text-md-right">{{ __('Número da Carteira de Trabalho:') }}</label>
            <div class="radio">
                <?php foreach($funcionarios as $funcionario=>$noCart[]): ?>
                <input type="radio" name="noCarteiraTrab" value="<?php echo $idP[$count]; ?>" id="<?php echo $idP[$count]; ?>"  checked="">
	            <label for="<?php echo $idP[$count]; ?>"><td><?php echo $noCart[$count]; ?></td></label><br />
                <?php $count ++; ?>
                <?php endforeach; ?>
            </div>  
        </div><br />

        <div class="form-group row">
            <?php 
                $count = 0;
                $modalidades = DB::table('modalidades')->get();
                foreach ($modalidades as $modalidade) {
                    $nomes[] = $modalidade->nome;
                    $ids[] = $modalidade->id;
                }
            ?>
			<label for="modalidade_id" class="col-md-4 col-form-label text-md-right">{{ __('Selecione a modalidade:') }}</label>
            <div class="radio">
                <?php foreach($modalidades as $modalidade=>$nomes[]): ?>
                <input type="radio" name="modalidade_id" value="<?php echo $ids[$count]; ?>" id="<?php echo $ids[$count]; ?>"  checked="">
	            <label for="<?php echo $ids[$count]; ?>"><td><?php echo $nomes[$count]; ?></td></label><br />
                <?php $count ++; ?>
                <?php endforeach; ?>
            </div>  
        </div> 
        
        <div class="btn">
            <button type="submit">Salvar</button>
        </div>
    </form>

    
@endsection

    
