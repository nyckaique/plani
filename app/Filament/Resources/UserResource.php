<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
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
use Spatie\Permission\Models\Role;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationGroup = 'Administração';
    protected static ?string $modelLabel = 'Usuário';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Nome')
                    ->required()
                    ->maxLength(255),

                TextInput::make('email')
                    ->label('E-mail')
                    ->required()
                    ->email()
                    ->maxLength(255),

                TextInput::make('password')
                    ->label('Senha')
                    ->password()
                    ->required(fn ($livewire) => $livewire instanceof \App\Filament\Resources\UserResource\Pages\CreateUser)
                    ->maxLength(255)
                    ->dehydrateStateUsing(fn ($state) => !empty($state) ? bcrypt($state) : null)
                    ->dehydrated(fn ($state) => filled($state)),

                Select::make('roles')
                    ->label('Função')
                    ->relationship('roles', 'name', function ($query) {
                        $query->where('name', '!=', 'Superadmin');
                    })
                    ->preload()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nome')
                    ->searchable(),
                TextColumn::make('email')
                    ->label('E-mail')
                    ->searchable()
                    ->copyable()
                    ->copyMessage('E-mail copiado!')
                    ->icon('heroicon-m-envelope')
                    ->iconColor('primary')
                    ->color('primary'),
                TextColumn::make('roles.name')
                    ->label('Função')
                    ->badge()
                    ->color(fn ($state) => match ($state) {
                        'Superadmin' => 'primary',
                        'Admin' => 'secondary',
                        'Gerente' => 'info',
                        'Funcionário' => 'success',
                        default => 'primary',
                    }),
                TextColumn::make('created_at')
                    ->label('Criado em')
                    ->dateTime('d/m/Y')
                    ->timezone('America/Sao_Paulo'),
            ])
            ->filters([])
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        $query = parent::getEloquentQuery();

        // Se não for superadmin, restringe por empresa
        if (!auth()->user()->hasRole('Superadmin')) {
            $query->where('empresa_id', auth()->user()->empresa_id);
        }

        return $query;
    }

    public static function mutateFormDataBeforeCreate(array $data): array
    {
        if (!auth()->user()->hasRole('Superadmin')) {
            $data['empresa_id'] = auth()->user()->empresa_id;
        }

        return $data;
    }

    public static function mutateFormDataBeforeSave(array $data): array
    {
        if (!auth()->user()->hasRole('Superadmin')) {
            $data['empresa_id'] = auth()->user()->empresa_id;
        }

        return $data;
    }


    public static function canViewAny(): bool
    {
        return auth()->user()->hasRole('Superadmin') || auth()->user()->can('gerenciar usuários');
    }

    public static function canCreate(): bool
    {
        return auth()->user()->hasRole('Superadmin') || auth()->user()->can('gerenciar usuários');
    }

    public static function canEdit($record): bool
    {
        return auth()->user()->hasRole('Superadmin') || auth()->user()->can('gerenciar usuários');
    }

    public static function canDelete($record): bool
    {
        return auth()->user()->hasRole('Superadmin') || auth()->user()->can('gerenciar usuários');
    }

    public static function shouldRegisterNavigation(): bool
    {
        return auth()->user()->hasRole('Superadmin') || auth()->user()->can('gerenciar usuários');
    }



}