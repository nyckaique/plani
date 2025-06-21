<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ClienteResource\Pages;
use App\Filament\Resources\ClienteResource\RelationManagers;
use App\Models\Cliente;
use App\Models\Empresa;
use App\Models\User; 
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Hidden;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;


class ClienteResource extends Resource
{
    protected static ?string $model = Cliente::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('tipo')
                    ->label('Tipo')
                    ->options([
                        'pf' => 'Pessoa Física',
                        'pj' => 'Pessoa Jurídica',
                    ])
                    ->required()
                    ->reactive(),

                TextInput::make('nome')
                    ->label('Nome')
                    ->required(fn (callable $get) => $get('tipo') === 'pf')
                    ->maxLength(255),

                TextInput::make('cpf')
                    ->label('CPF')
                    ->required(fn (callable $get) => $get('tipo') === 'pf')
                    ->maxLength(14)
                    ->mask('000.000.000-00'),

                TextInput::make('razao_social')
                    ->label('Razão Social')
                    ->required(fn (callable $get) => $get('tipo') === 'pj')
                    ->maxLength(255),

                TextInput::make('cnpj')
                    ->label('CNPJ')
                    ->required(fn (callable $get) => $get('tipo') === 'pj')
                    ->maxLength(18)
                    ->mask('00.000.000/0000-00'),

                TextInput::make('telefone')
                    ->label('Telefone')
                    ->maxLength(20),

                TextInput::make('email')
                    ->label('E-mail')
                    ->email()
                    ->maxLength(255),

                TextInput::make('endereco')
                    ->label('Endereço')
                    ->maxLength(255),

                Hidden::make('empresa_id')
                    ->default(auth()->user()->empresa_id)
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nome')
                    ->label('Nome')
                    ->searchable()
                    ->copyable()
                    ->copyMessage('Nome copiado!'),
                TextColumn::make('cpf')
                    ->label('CPF')
                    ->formatStateUsing(fn ($state) => preg_replace('/(\d{3})(\d{3})(\d{3})(\d{2})/', '$1.$2.$3-$4', $state))
                    ->copyable()
                    ->copyMessage('CPF copiado!'),
                TextColumn::make('razao_social')
                    ->label('Razão Social')
                    ->copyable()
                    ->copyMessage('Razão Social copiada!'),
                TextColumn::make('cnpj')
                    ->label('CNPJ')
                    ->formatStateUsing(fn ($state) => preg_replace('/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/', '$1.$2.$3/$4-$5', $state))
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
                TextColumn::make('tipo')
                    ->label('Tipo')
                    ->formatStateUsing(fn ($state) => match ($state) {
                        'pf' => 'Pessoa Física',
                        'pj' => 'Pessoa Jurídica',
                        default => $state,
                    })
                    ->badge(),
                TextColumn::make('created_at')
                    ->label('Criado em')
                    ->dateTime('d/m/Y')
                    ->timezone('America/Sao_Paulo'),
            ])
            ->filters([
                //
            ])
            ->defaultSort('nome')
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\RelatoriosRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListClientes::route('/'),
            'create' => Pages\CreateCliente::route('/create'),
            'edit' => Pages\EditCliente::route('/{record}/edit'),
        ];
    }
    public static function canViewAny(): bool
    {
        return auth()->user()->hasRole('Superadmin') || auth()->user()->can('ver clientes');
    }

    public static function canCreate(): bool
    {
        return auth()->user()->hasRole('Superadmin') || auth()->user()->can('criar clientes');
    }

    public static function canEdit($record): bool
    {
        return auth()->user()->hasRole('Superadmin') || auth()->user()->can('editar clientes');
    }

    public static function canDelete($record): bool
    {
        return auth()->user()->hasRole('Superadmin') || auth()->user()->can('deletar clientes');
    }

    public static function shouldRegisterNavigation(): bool
    {
        return auth()->user()->hasRole('Superadmin') || auth()->user()->can('ver clientes');
    }

}