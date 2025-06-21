<?php

namespace App\Filament\Resources\RelatorioAtendimentoResource\Pages;

use App\Filament\Resources\RelatorioAtendimentoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRelatorioAtendimento extends EditRecord
{
    protected static string $resource = RelatorioAtendimentoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
