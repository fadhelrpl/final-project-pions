<x-filament::widget>
    <x-filament::card>
        <h2 class="text-xl font-bold mb-4">Votings Summary</h2>
        <div class="space-y-6">
            @forelse ($groupedVotes as $votingTitle => $votes)
                <div class="space-y-2">
                    <h2 class="text-lg font-bold mb-2">
                        {{ $votingTitle }}
                    </h2>
                    <span class="space-y-1 list-decimal list-inside">
                        @foreach ($votes as $vote)
                            <span class="flex justify-between">
                                <span class="">{{ $vote->candidate_name }}</span>
                                {{ $vote->total }} {{ \Illuminate\Support\Str::plural('vote', $vote->total) }}
                            </span>
                        @endforeach
                    </span>
                </div>
            @empty
                <p class="text-sm">No voting results available.</p>
            @endforelse
        </div>
    </x-filament::card>
</x-filament::widget>