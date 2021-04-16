<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/menu-principal', 'App\Http\Controllers\EDance\PaginaInicialController')->name('PaginaInicial');
    Route::get('/', 'App\Http\Controllers\EDance\PaginaInicialController');

    Route::post('logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('user.logout');

    Route::get('/cadastrar-aluno', 'App\Http\Controllers\EDance\CadastroController@create')->name('CadastroAluno');
    Route::post('/salvar-aluno', 'App\Http\Controllers\EDance\CadastroController@salvarAluno')->name('SalvarAluno');
    Route::get('/procurar-aluno', 'App\Http\Controllers\EDance\CadastroController@index')->name('ProcuraAluno');
    Route::get('/procurar-aluno/{id}', 'App\Http\Controllers\EDance\CadastroController@show')->name('ProcuraCadastro');
    Route::get('/editar-aluno/{id}', 'App\Http\Controllers\EDance\CadastroController@edit')->name('EditarCadastro');
    Route::post('/editar-aluno/{id}', 'App\Http\Controllers\EDance\CadastroController@update')->name('AlterarCadastro');
    Route::get('/excluir-aluno/{id}', 'App\Http\Controllers\EDance\CadastroController@delete')->name('DeletarCadastro');;
    Route::post('/excluir-aluno/{id}', 'App\Http\Controllers\EDance\CadastroController@destroy')->name('ExcluirCadastro');

    Route::get('/matricular-aluno', 'App\Http\Controllers\EDance\MatriculaController@create')->name('MatriculaAluno');
    Route::post('/salvar-matricula', 'App\Http\Controllers\EDance\MatriculaController@salvar')->name('SalvarMatricula');
    Route::get('/procurar-matricula', 'App\Http\Controllers\EDance\MatriculaController@index')->name('ProcuraMatricula');
    Route::get('/procurar-matricula/{id}', 'App\Http\Controllers\EDance\MatriculaController@show')->name('ProcuraMatriculaAluno');
    Route::get('/editar-matricula/{id}', 'App\Http\Controllers\EDance\MatriculaController@edit')->name('EditarMatricula');
    Route::post('/editar-matricula/{id}', 'App\Http\Controllers\EDance\MatriculaController@update')->name('AlterarMatricula');
    Route::get('/excluir-matricula/{id}', 'App\Http\Controllers\EDance\MatriculaController@delete')->name('DeletarMatricula');;
    Route::post('/excluir-matricula/{id}', 'App\Http\Controllers\EDance\MatriculaController@destroy')->name('ExcluirMatricula');

    Route::get('/registrar-turma', 'App\Http\Controllers\EDance\TurmaController@create')->name('RegistrarTurma');
    Route::post('/salvar-turma', 'App\Http\Controllers\EDance\TurmaController@salvarTurma')->name('SalvarTurma');
    Route::get('/gerir-turma', 'App\Http\Controllers\EDance\TurmaController@index')->name('GerenciarTurma');
    Route::get('/procurar-turma/{id}', 'App\Http\Controllers\EDance\TurmaController@show')->name('ProcurarTurma');
    Route::get('/editar-turma/{id}', 'App\Http\Controllers\EDance\TurmaController@edit')->name('EditarTurma');
    Route::post('/editar-turma/{id}', 'App\Http\Controllers\EDance\TurmaController@update')->name('AlterarTurma');
    Route::get('/excluir-turma/{id}', 'App\Http\Controllers\EDance\TurmaController@delete')->name('DeletarTurma');;
    Route::post('/excluir-turma/{id}', 'App\Http\Controllers\EDance\TurmaController@destroy')->name('ExcluirTurma');

    Route::get('/inserir-funcionario', 'App\Http\Controllers\EDance\FuncionarioController@create')->name('InsereFuncionario');
    Route::post('/salvar-funcionario', 'App\Http\Controllers\EDance\FuncionarioController@salvar')->name('Salvar');
    Route::get('/definir-professor', 'App\Http\Controllers\EDance\FuncionarioController@vincularProfessor')->name('VincularProfessor');
    Route::post('/salvar-professor', 'App\Http\Controllers\EDance\FuncionarioController@salvarProfessor')->name('SalvarProfessor');
    Route::get('/procurar-funcionario', 'App\Http\Controllers\EDance\FuncionarioController@index')->name('ProcuraFuncionario');
    Route::get('/procurar-funcionario/{id}', 'App\Http\Controllers\EDance\FuncionarioController@show')->name('ProcurarFuncionario');
    Route::get('/editar-funcionario/{id}', 'App\Http\Controllers\EDance\FuncionarioController@edit')->name('EditarFuncionario');
    Route::post('/editar-funcionario/{id}', 'App\Http\Controllers\EDance\FuncionarioController@update')->name('AlterarFuncionario');
    Route::get('/excluir-funcionario/{id}', 'App\Http\Controllers\EDance\FuncionarioController@delete')->name('DeletarFuncionario');;
    Route::post('/excluir-funcionario/{id}', 'App\Http\Controllers\EDance\FuncionarioController@destroy')->name('ExcluirFuncionario');

    Route::get('/registrar-modalidade', 'App\Http\Controllers\EDance\ModalidadeController@create')->name('RegistrarModalidade');
    Route::post('/salvar-modalidade', 'App\Http\Controllers\EDance\ModalidadeController@salvarModalidade')->name('SalvarModalidade');
    Route::get('/gerir-modalidade', 'App\Http\Controllers\EDance\ModalidadeController@index')->name('GerenciarModalidade');
    Route::get('/procurar-modalidade/{id}', 'App\Http\Controllers\EDance\ModalidadeController@show')->name('ProcuraModalidade');
    Route::get('/editar-modalidade/{id}', 'App\Http\Controllers\EDance\ModalidadeController@edit')->name('EditarModalidade');
    Route::post('/editar-modalidade/{id}', 'App\Http\Controllers\EDance\ModalidadeController@update')->name('AlterarModalidade');
    Route::get('/excluir-modalidade/{id}', 'App\Http\Controllers\EDance\ModalidadeController@delete')->name('DeletarModalidade');;
    Route::post('/excluir-modalidade/{id}', 'App\Http\Controllers\EDance\ModalidadeController@destroy')->name('ExcluirModalidade');

    Route::get('/registrar-estudio', 'App\Http\Controllers\EDance\EstudioController@create')->name('RegistrarEstudio');
    Route::post('/salvar-estudio', 'App\Http\Controllers\EDance\EstudioController@salvarEstudio')->name('SalvarEstudio');
    Route::get('/gerir-estudio', 'App\Http\Controllers\EDance\EstudioController@index')->name('GerenciarEstudio');
    Route::get('/procurar-estudio/{id}', 'App\Http\Controllers\EDance\EstudioController@show')->name('ProcuraEstudio');
    Route::get('/editar-estudio/{id}', 'App\Http\Controllers\EDance\EstudioController@edit')->name('EditarEstudio');
    Route::post('/editar-estudio/{id}', 'App\Http\Controllers\EDance\EstudioController@update')->name('AlterarEstudio');
    Route::get('/excluir-estudio/{id}', 'App\Http\Controllers\EDance\EstudioController@delete')->name('DeletarEstudio');;
    Route::post('/excluir-estudio/{id}', 'App\Http\Controllers\EDance\EstudioController@destroy')->name('ExcluirEstudio');
});
