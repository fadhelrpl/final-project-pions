<?php

namespace App\Filament\Widgets;

use App\Models\Vote;
use Filament\Widgets\Widget;

class VotingResults extends Widget
{
    protected static string $view = 'filament.widgets.voting-results';

    protected function getViewData(): array
    {
        $results = Vote::selectRaw('votes.voting_id, users.name as candidate_name, votings.title as voting_title, COUNT(*) as total')
            ->join('users', 'votes.candidate_id', '=', 'users.id')
            ->join('votings', 'votes.voting_id', '=', 'votings.id')
            ->groupBy('votes.voting_id', 'votes.candidate_id', 'users.name', 'votings.title')
            ->get()
            ->groupBy('voting_title');

        return [
            'groupedVotes' => $results,
        ];
    }
}
