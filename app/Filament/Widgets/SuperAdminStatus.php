<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\User;
use App\Models\Empresa;
use App\Models\Cliente;

class SuperAdminStatus extends BaseWidget
{
    protected static ?int $sort = 0;
    protected function getStats(): array
    {
        return [
            Stat::make('Total de Empresas', Empresa::count()),
            Stat::make('Total de Clientes', Cliente::count()),
            Stat::make('Total de Usuários', User::count()),
        ];
    }
    public static function canView(): bool
    {
        return auth()->user()?->hasRole('Superadmin');
    }
}
