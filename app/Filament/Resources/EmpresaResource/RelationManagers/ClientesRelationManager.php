<?php

namespace App\Filament\Resources\EmpresaResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Hidden;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Columns\TextColumn;


class ClientesRelationManager extends RelationManager
{
    protected static string $relationship = 'clientes';
    protected static ?string $title = 'Clientes';

    public function form(Form $form): Form
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

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('nome')
            ->columns([
                TextColumn::make('nome'),
                TextColumn::make('cpf'),
                TextColumn::make('razao_social'),
                TextColumn::make('cnpj'),
                TextColumn::make('email'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                CreateAction::make(),
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
