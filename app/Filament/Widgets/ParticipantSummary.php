<?php

namespace App\Filament\Widgets;

use App\Models\Participant;
use Filament\Widgets\Widget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget;

class ParticipantSummary extends Widget
{
    protected static string $view = 'filament.widgets.participant-summary';

    public static function canView(): bool
    {
        return true;
    }

    public function getViewData(): array
    {
        return [
            'summary' => Participant::selectRaw('event_id, COUNT(*) as total')
                ->groupBy('event_id')
                ->with('event')
                ->get(),
        ];
    }
}

