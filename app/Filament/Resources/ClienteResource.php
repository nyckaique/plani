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
                TextColumn::make('nome')->label('Nome'),
                TextColumn::make('cpf')->label('CPF'),
                TextColumn::make('razao_social')->label('Razão Social'),
                TextColumn::make('cnpj')->label('CNPJ'),
                TextColumn::make('telefone')->label('Telefone'),
                TextColumn::make('email')->label('E-mail'),
                TextColumn::make('tipo')
                    ->label('Tipo')
                    ->formatStateUsing(fn ($state) => match ($state) {
                        'pf' => 'Pessoa Física',
                        'pj' => 'Pessoa Jurídica',
                        default => $state,
                    })
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
            //
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
}
