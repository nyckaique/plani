<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EmpresaResource\Pages;
use App\Filament\Resources\EmpresaResource\RelationManagers;
use App\Models\Empresa;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\BulkActionGroup;

class EmpresaResource extends Resource
{
    protected static ?string $model = Empresa::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nome')
                ->required()
                ->maxLength(255),
                TextInput::make('cnpj')
                    ->label('CNPJ')
                    ->mask('99.999.999/9999-99')
                    ->maxLength(18),
                TextInput::make('email')
                    ->email()
                    ->maxLength(255),
                TextInput::make('telefone')
                    ->tel()
                    ->maxLength(20),
                TextInput::make('endereco')
                    ->label('Endereço')
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nome')
                    ->searchable()
                    ->copyable()
                    ->copyMessage('Nome copiado!'),
                TextColumn::make('cnpj')
                    ->label('CNPJ')
                    ->formatStateUsing(function ($state) {
                        return preg_replace('/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/', '$1.$2.$3/$4-$5', $state);
                    })
                    ->copyable()
                    ->copyMessage('CNPJ copiado!'),
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
                TextColumn::make('endereco')
                    ->label('Endereço')
                    ->copyable()
                    ->copyMessage('Endereço copiado!'),
                TextColumn::make('created_at')
                    ->label('Criado em')
                    ->dateTime('d/m/Y')
                    ->timezone('America/Sao_Paulo'),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                //
            ])
            ->actions([
                EditAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\UsersRelationManager::class,
            RelationManagers\ClientesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEmpresas::route('/'),
            'create' => Pages\CreateEmpresa::route('/create'),
            'edit' => Pages\EditEmpresa::route('/{record}/edit'),
        ];
    }

    public static function canViewAny(): bool
    {
        return true; // Todos podem ver a própria empresa
    }

    public static function canCreate(): bool
    {
        return auth()->user()->hasRole('Superadmin');
    }

    public static function canEdit($record): bool
    {
        return auth()->user()->hasRole('Superadmin') || auth()->user()->hasRole('Admin');
    }

    public static function canDelete($record): bool
    {
        return auth()->user()->hasRole('Superadmin');
    }

    public static function shouldRegisterNavigation(): bool
    {
        return auth()->user()->hasRole('Superadmin') || auth()->user()->can('ver empresa');
    }

}