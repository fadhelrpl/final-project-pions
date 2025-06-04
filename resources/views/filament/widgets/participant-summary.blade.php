<x-filament::widget>
    <x-filament::card>
        <h2 class="text-xl font-bold mb-4">Participant Summary</h2>

        <div class="space-y-2 w-full">
            @foreach ($summary as $row)
                <div class="flex justify-between pb-1">
                    <span>{{ $row->event->title ?? 'Unknown Event' }}</span>
                    <span class="font-semibold text-sm">{{ $row->total }} participants</span>
                </div>
            @endforeach
        </div>
    </x-filament::card>
</x-filament::widget>