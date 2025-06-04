<?php

namespace App\Filament\Resources\VotingResource\Pages;

use App\Filament\Resources\VotingResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListVotings extends ListRecords
{
    protected static string $resource = VotingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
