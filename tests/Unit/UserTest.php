<?php

namespace Tests\Unit;

use App\Models\Usuario;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class UserTest extends TestCase
{
    use DatabaseTransactions;

    public function test_create_usuario()
    {
        $email = 'deni@alessi.com';
        $cpf = '125.816.145-25';
        $rg = '14.874.166-15';
        $senha = '12345678ab';

        $this->assertMatchesRegularExpression('/^[0-9a-zA-Z.-]+@[0-9a-zA-Z.-]+.[a-zA-Z{3}]$/', $email);
        $this->assertMatchesRegularExpression('/^[0-9{3}]+.[0-9{3}]+.[0-9{3}]+-[0-9{2}]+$/', $cpf);
        $this->assertNotEmpty($cpf);
        $this->assertMatchesRegularExpression('/^[0-9{2}]+.[0-9{3}]+.[0-9{3}]+-[0-9{2}]+$/', $rg);
        $this->assertNotEmpty($rg);
        $this->assertMatchesRegularExpression('/^[0-9a-z]|[0-9A-Z]$|[a-z0-9]$|[A-Z0-9]$/', $senha);
        $this->assertGreaterThanOrEqual(8, strlen($senha));


        Usuario::create ([
            'nome' => 'Denise Alessi',
            'email' => $email,
            'senha' => $senha,
            'endereco' => 'Rua Principal',
            'cpf' => $cpf,
            'rg'=> $rg,
            'cidade'=> 'Guarapuava',
            'cep' => '87120-58',
            'contato' => 998541224,
            'dataNasc' => "1999-05-12",
            'dataInicio' => "2021-02-10"
        ]);

        $this->assertDatabaseHas('usuarios', ['nome' => 'Denise Alessi']);
    }

}


