<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Limpa dados antigos (em caso de fresh)
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Permissões
        $permissions = [
            'ver clientes',
            'criar clientes',
            'editar clientes',
            'deletar clientes',
            'ver empresa',
            'editar empresa',
            'gerenciar usuários',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Cargos
        $admin = Role::firstOrCreate(['name' => 'Admin']);
        $gerente = Role::firstOrCreate(['name' => 'Gerente']);
        $funcionario = Role::firstOrCreate(['name' => 'Funcionário']);

        // Define permissões para cada cargo
        $admin->syncPermissions($permissions);

        $gerente->syncPermissions([
            'ver clientes',
            'criar clientes',
            'editar clientes',
            'deletar clientes',
        ]);

        $funcionario->syncPermissions([
            'ver clientes',
        ]);
    }
}
