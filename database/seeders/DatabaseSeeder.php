<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Empresa;
use App\Models\Cliente;
use App\Models\RelatorioAtendimento;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
        ]);

        // 1. Cria superadmin global (sem empresa)
        $superadmin = User::create([
            'name' => 'Super Admin Plani',
            'email' => 'superadmin@plani.com',
            'password' => Hash::make('password'),
            'empresa_id' => null,
        ]);
        $superadmin->assignRole('Superadmin');

        // 2. Cria uma empresa exemplo
        $empresa = Empresa::create([
            'nome' => 'Empresa Exemplo Ltda',
            'cnpj' => '12345678000199',
            'email' => 'contato@exemplo.com',
            'telefone' => '11999999999',
            'endereco' => 'Rua Exemplo, 123, São Paulo - SP',
        ]);

        // 3. Cria admin da empresa
        $admin = User::create([
            'name' => 'Admin Empresa',
            'email' => 'admin@exemplo.com',
            'password' => Hash::make('password'),
            'empresa_id' => $empresa->id,
        ]);
        $admin->assignRole('Admin');

        // 4. Cria gerente da empresa

        $gerente = User::create([
            'name' => 'Gerente Teste',
            'email' => 'gerente@exemplo.com',
            'password' => Hash::make('password'),
            'empresa_id' => $empresa->id,
        ]);
        $gerente->assignRole('Gerente');

        // 5. Cria funcionário da empresa
        $usuario = User::create([
            'name' => 'Funcionário Teste',
            'email' => 'funcionario@exemplo.com',
            'password' => Hash::make('password'),
            'empresa_id' => $empresa->id,
        ]);
        $usuario->assignRole('Funcionário');

        $faker = Faker::create('pt_BR');
        // Armazenar clientes criados para depois gerar relatórios
        $clientes = [];

        // Criar 20 clientes PF
        foreach (range(1, 20) as $i) {
            $clientes[] = Cliente::create([
                'empresa_id' => $empresa->id,
                'tipo' => 'pf',
                'nome' => $faker->name(),
                'cpf' => $faker->cpf(false),
                'telefone' => $faker->cellphoneNumber(),
                'email' => $faker->unique()->safeEmail(),
                'endereco' => $faker->address(),
                'razao_social' => null,
                'cnpj' => null,
            ]);
        }

        // Criar 20 clientes PJ
        foreach (range(1, 20) as $i) {
            $clientes[] = Cliente::create([
                'empresa_id' => $empresa->id,
                'tipo' => 'pj',
                'nome' => null,
                'cpf' => null,
                'razao_social' => $faker->company(),
                'cnpj' => $faker->cnpj(false),
                'telefone' => $faker->phoneNumber(),
                'email' => $faker->unique()->companyEmail(),
                'endereco' => $faker->address(),
            ]);
        }

        // Para cada cliente, criar entre 1 e 5 relatórios
        foreach ($clientes as $cliente) {
            $numRelatorios = rand(1, 5);

            for ($j = 0; $j < $numRelatorios; $j++) {
                RelatorioAtendimento::create([
                    'cliente_id' => $cliente->id,
                    'data' => $faker->dateTimeBetween('-1 years', 'now')->format('Y-m-d'),
                    'descricao' => $faker->paragraph(3),
                ]);
            }
        }
    }
}