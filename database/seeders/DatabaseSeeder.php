<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Empresa;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Cria superadmin global (sem empresa)
        User::create([
            'name' => 'Nycollas Kaique',
            'email' => 'nycollaskaique@hotmail.com',
            'password' => Hash::make('password'),
            'empresa_id' => null,
            'is_superadmin' => true,
        ]);

        // 2. Cria uma empresa exemplo
        $empresa = Empresa::create([
            'nome' => 'Empresa Exemplo Ltda',
            'cnpj' => '12345678000199',
            'email' => 'contato@empresaexemplo.com',
            'telefone' => '11999999999',
            'endereco' => 'Rua Exemplo, 123, São Paulo - SP',
        ]);

        // 3. Cria admin da empresa
        User::create([
            'name' => 'Admin Empresa',
            'email' => 'admin@empresaexemplo.com',
            'password' => Hash::make('password'),
            'empresa_id' => $empresa->id,
            'is_superadmin' => false,
        ]);

        // 4. Cria usuário comum da empresa
        User::create([
            'name' => 'Usuário Teste',
            'email' => 'usuario@empresaexemplo.com',
            'password' => Hash::make('password'),
            'empresa_id' => $empresa->id,
            'is_superadmin' => false,
        ]);
    }
}
