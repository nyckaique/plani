<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Cliente;
use App\Models\User;

class EmpresaStatus extends BaseWidget
{
    protected static ?int $sort = 1;
    protected int | string | array $columnSpan = [
        'sm' => 12,
        'md' => 8,
    ];
    protected function getColumns(): int
    {
        return 2;
    }

    protected function getStats(): array
    {
        return [
            Stat::make('Clientes',Cliente::where('empresa_id', auth()->user()->empresa_id)->count()),
            Stat::make('Usuários da Empresa', User::where('empresa_id', auth()->user()->empresa_id)->count())
        ];
    }

    public static function canView(): bool
    {
        return auth()->user()?->hasRole('Admin') || auth()->user()?->hasRole('Gerente');
    }
}