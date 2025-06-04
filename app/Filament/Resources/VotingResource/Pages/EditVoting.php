<?php

namespace App\Filament\Resources\VotingResource\Pages;

use App\Filament\Resources\VotingResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditVoting extends EditRecord
{
    protected static string $resource = VotingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
