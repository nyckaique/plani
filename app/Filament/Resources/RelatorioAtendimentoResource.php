<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RelatorioAtendimentoResource\Pages;
use App\Filament\Resources\RelatorioAtendimentoResource\RelationManagers;
use App\Models\RelatorioAtendimento;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;

class RelatorioAtendimentoResource extends Resource
{
    protected static ?string $model = RelatorioAtendimento::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationGroup = 'Clientes';
    protected static ?string $label = 'Relatório';
    protected static ?string $pluralLabel = 'Relatórios';
    protected static ?string $modelLabel = 'Relatório de Atendimento';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
            Select::make('cliente_id')
                ->relationship('cliente', 'nome')
                ->required()
                ->label('Cliente')
                ->columnSpan(1),
            DatePicker::make('data')
                ->required()
                // ->format('d/m/Y')
                // ->timezone('America/Sao_Paulo')
                ->label('Data do Atendimento')
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

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('cliente.nome')
                    ->label('Cliente'), 
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRelatorioAtendimentos::route('/'),
            'create' => Pages\CreateRelatorioAtendimento::route('/create'),
            'edit' => Pages\EditRelatorioAtendimento::route('/{record}/edit'),
        ];
    }

    public static function shouldRegisterNavigation(): bool
    {
        return false;
    }
}