<?php

namespace App\Filament\Widgets;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use App\Models\Cliente;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\EditAction;

class UltimosClientesEmpresa extends BaseWidget
{
    protected static ?int $sort = 3;
    protected static ?string $heading = 'Últimos Clientes Cadastrados';
    protected int | string | array $columnSpan = 12;
    
    public function table(Table $table): Table
    {
        return $table
            ->query(
                Cliente::query()
                    ->where('empresa_id', auth()->user()->empresa_id)
                    ->latest()
                    ->limit(20)
            )
            ->columns([
                TextColumn::make('nome')
                    ->label('Nome')
                    ->searchable()
                    ->sortable()
                    ->url(fn ($record) => route('filament.admin.resources.clientes.edit', ['record' => $record])),

                TextColumn::make('email')
                    ->label('E-mail')
                    ->icon('heroicon-m-envelope')
                    ->iconColor('primary')
                    ->copyable()
                    ->copyMessage('E-mail copiado!')
                    ->color('primary'),

                TextColumn::make('telefone')
                    ->label('WhatsApp')
                    ->formatStateUsing(fn ($state) => preg_replace(
                        '/(\d{2})(\d{5})(\d{4})/',
                        '($1) $2-$3',
                        preg_replace('/\D/', '', $state)
                    ))
                    ->url(fn ($record) => 'https://wa.me/' . preg_replace('/\D/', '', $record->telefone))
                    ->openUrlInNewTab()
                    ->icon('heroicon-o-chat-bubble-bottom-center-text')
                    ->color('success'),

                TextColumn::make('created_at')
                    ->label('Criado em')
                    ->dateTime('d/m/Y')
                    ->sortable(),
            ]);  
    }
    public static function canView(): bool
    {
        return !auth()->user()?->hasRole('Superadmin');
    }
}