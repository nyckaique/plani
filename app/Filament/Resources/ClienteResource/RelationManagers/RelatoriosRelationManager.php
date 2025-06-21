<?php

namespace App\Filament\Resources\ClienteResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;

class RelatoriosRelationManager extends RelationManager
{
    protected static string $relationship = 'relatorios';
    protected static ?string $modelLabel = 'Relatório de Atendimento';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                DatePicker::make('data')
                    ->required()
                    ->label('Data do Atendimento')
                    // ->format('d/m/Y')
                    // ->timezone('America/Sao_Paulo')
                    ->columnSpan(1),
                RichEditor::make('descricao')
                    ->required()
                    ->label('Descrição')
                    ->columnSpan('full')
                    ->disableToolbarButtons([
                        'attachFiles',
                    ]),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('data')
            ->columns([
                TextColumn::make('data')
                    ->label('Data do Atendimento')
                    ->dateTime('d/m/Y')
                    ->timezone('America/Sao_Paulo'),
                TextColumn::make('descricao')
                    ->limit(50)->label('Descrição')
                    ->html(),
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