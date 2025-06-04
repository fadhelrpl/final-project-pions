@extends('layouts.main')
@section('content')
    <section class="w-full h-auto py-15 flex flex-col justify-center items-center bg-blue-800 text-white">
        <h1 class="text-4xl md:text-6xl font-semibold text-center mt-15 mb-15">Selection list at <span
                class="text-pink-600">PIONS</span></h1>

        <section class="w-full h-auto px-6 md:px-40 grid grid-cols-1 md:grid-cols-2 gap-6">
            @forelse($votings as $voting) {{-- Loop melalui data voting --}}
                <div class="w-full bg-sky-50 rounded-xl overflow-hidden border border-blue-950 shadow-md">
                    {{-- Gambar dinamis (gunakan gambar default atau dari database jika ada) --}}
                    <img src="https://picsum.photos/seed/{{ $voting->id }}/400/300" class="w-full h-auto"
                        alt="{{ $voting->title }} Image" />
                    {{-- Atau jika Anda punya kolom 'image_url' di tabel votings: --}}
                    {{-- <img src="{{ asset('storage/' . $voting->image_url) }}" class="w-full h-auto"
                        alt="{{ $voting->title }} Image" /> --}}

                    <div class="p-4 text-blue-800 space-y-4">
                        <h2 class="text-2xl md:text-3xl font-semibold">{{ $voting->title }}</h2> {{-- Judul dinamis --}}
                        <p class="text-sm text-justify">{{ $voting->description }}</p> {{-- Deskripsi dinamis --}}
                        <a href="{{ route('votings.show', $voting->id) }}"
                            class="block w-full text-center px-5 py-2 bg-pink-600 text-white font-medium rounded-md border border-[#FF0856] hover:bg-transparent hover:text-[#FF0856] transition duration-200 text-sm">Check</a>
                        {{-- Link dinamis --}}
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center text-gray-300 py-10">
                    <p class="text-xl">No active voting events at the moment. Please check back later!</p>
                </div>
            @endforelse
        </section>
    </section>
@endsection