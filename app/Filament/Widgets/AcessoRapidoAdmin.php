<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;

class AcessoRapidoAdmin extends Widget
{
    protected static string $view = 'filament.widgets.acesso-rapido-admin';
    protected static ?int $sort = 2;
    protected int | string | array $columnSpan = [
        'sm' => 12,
        'md' => 4,
    ];

    public function getUrlEmpresaEdit(): string
    {
        return route('filament.admin.resources.empresas.edit', ['record' => auth()->user()->empresa_id]);
    }

    public function getUrlUsersEdit(): string
    {
        return route('filament.admin.resources.users.index');
    }

    public static function canView(): bool
    {
        return auth()->user()?->hasRole('Admin');
    }
}
