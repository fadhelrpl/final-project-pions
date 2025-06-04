@extends('layouts.main')
@section('content')

    <body class="bg-blue-900 text-white">
        <main
            class="w-full h-auto px-5 py-15 bg-blue-900 relative overflow-hidden flex flex-col justify-center items-center">
            <header class="w-full h-auto mt-15 gap-10 flex flex-col md:flex-row justify-center items-center">
                @if ($leader && $leader->member) {{-- Pastikan leader dan member-nya ada --}}
                    @php
                        $leaderMember = $leader->member;
                        $leaderPhotoUrl = $leaderMember->photo ? asset('storage/' . $leaderMember->photo) : 'https://ui-avatars.com/api/?name=' . urlencode($leaderMember->name) . '&color=FFFFFF&background=111827&size=200';
                    @endphp
                    <div
                        class="min-w-90 max-w-90 h-auto p-3 border-4 border-black bg-white rounded-3xl relative overflow-hidden flex flex-col justify-center items-center">
                        <img src="{{ $leaderPhotoUrl }}" alt="{{ $leaderMember->name }}" class="w-80 h-auto max-w-full mb-5">
                        <div class="w-full h-auto px-4 mb-5 flex justify-between items-center">
                            <div class="w-full h-auto flex flex-col justify-center items-start">
                                <h1 class="text-blue-800 text-2xl capitalize font-black mb-3">{{ $leader->position->value }}
                                </h1> {{-- Ambil posisi dari leader --}}
                                <p class="text-blue-800 text-sm capitalize font-bold">SMK IDN boarding school bogor</p>
                            </div>
                            <img src="{{ asset('images/logo_pions_colored.svg') }}" alt="" class="w-13 h-auto max-w-full">
                        </div>
                    </div>

                    <div class="w-auto h-auto flex flex-col justify-center items-start">
                        <h1
                            class="w-full md:w-105 text-white text-5xl md:text-6xl text-center md:text-left font-black font-nohemi capitalize mb-3">
                            {{ $leaderMember->name }}</h1>
                        <p
                            class="w-full md:w-95 text-white text-base text-justify md:text-left font-medium capitalize leading-7 mb-8">
                            {{-- Deskripsi divisi, bisa juga diambil dari DB atau disesuaikan --}}
                            {{ $leader->position->value }} in PIONS is the security division. We help keep everything safe,
                            organized, and running smoothly in every event and activity.
                        </p>
                        <div class="w-auto h-auto mb-5 gap-5 flex justify-start items-center">
                            {{-- Jika ada kolom social media di tabel Member, Anda bisa menampilkannya di sini --}}
                            <a href="#"
                                class="w-25 h-25 text-xs text-white font-nohemi font-medium tracking-wider bg-emerald-600 relative overflow-hidden gap-2 flex flex-col justify-center items-center"><i
                                    class="fa-brands fa-instagram text-white text-5xl"></i></a>
                            <a href="#"
                                class="w-25 h-25 text-xs text-white font-nohemi font-medium tracking-wider bg-purple-700 relative overflow-hidden gap-2 flex flex-col justify-center items-center"><i
                                    class="fa-brands fa-facebook text-white text-5xl"></i></a>
                            <a href="#"
                                class="w-25 h-25 text-xs text-white font-nohemi font-medium tracking-wider bg-pink-600 relative overflow-hidden gap-2 flex flex-col justify-center items-center"><i
                                    class="fa-brands fa-linkedin text-white text-5xl"></i></a>
                        </div>
                        <p class="text-white text-xl text-left font-medium font-nohemi capitalize leading-7 tracking-wide mb-5">
                            let's connect!</p>
                    </div>
                @else
                    <div class="w-full text-center text-white">
                        <h1 class="text-3xl font-bold">Leader for this division not found.</h1>
                    </div>
                @endif
            </header>
        </main>

        <section class="w-full h-auto py-10 bg-blue-900 relative overflow-hidden flex flex-col justify-center items-center">
            <div class="w-full h-auto mb-10 flex justify-center items-center">
                <h1 class="w-max text-white text-4xl md:text-6xl text-center font-nohemi font-black tracking-wide">Meet Our
                    <span class="font-nohemi font-medium">{{ ucfirst(str_replace('-', ' ', $slug)) }}</span> Team</h1>
            </div>

            @if ($members->isNotEmpty()) {{-- Cek apakah ada anggota --}}
                <section
                    class="w-full h-auto px-5 md:px-15 bg-blue-900 gap-6 relative overflow-hidden flex md:grid flex-col md:grid-cols-2 justify-center items-center">
                    @foreach ($members as $memberPionsPosition)
                        @if ($memberPionsPosition->member)
                            @php
                                $member = $memberPionsPosition->member;
                                $photoUrl = $member->photo ? asset('storage/' . $member->photo) : 'https://ui-avatars.com/api/?name=' . urlencode($member->name) . '&color=FFFFFF&background=111827&size=200';
                            @endphp
                            <div
                                class="w-max h-auto px-3 md:px-5 py-5 bg-white border-2 border-black rounded-xl gap-5 flex justify-center items-center">
                                <img src="{{ $photoUrl }}" alt="{{ $member->name }}" class="w-30 md:w-60 h-auto max-w-full">
                                <div class="w-40 md:w-70 h-auto flex flex-col justify-center items-start">
                                    <h1 class="text-blue-800 font-bold text-lg md:text-3xl text-left capitalize mb-1">
                                        {{ $member->name }}</h1>
                                    <p class="text-blue-800 font-bold text-xs md:text-base text-left capitalize mb-2 md:mb-5">
                                        {{ $memberPionsPosition->position->value }}</p>
                                    <div class="w-auto h-auto gap-2 md:gap-5 flex justify-start items-center">
                                        <a href="#"
                                            class="w-10 md:w-18 h-10 md:h-18 p-3 bg-emerald-600 flex justify-center items-center"><i
                                                class="fa-brands fa-instagram text-white text-2xl md:text-4xl"></i></a>
                                        <a href="#"
                                            class="w-10 md:w-18 h-10 md:h-18 p-3 bg-purple-700 flex justify-center items-center"><i
                                                class="fa-brands fa-facebook text-white text-2xl md:text-4xl"></i></a>
                                        <a href="#"
                                            class="w-10 md:w-18 h-10 md:h-18 p-3 bg-pink-600 flex justify-center items-center"><i
                                                class="fa-brands fa-linkedin text-white text-2xl md:text-4xl"></i></a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </section>
            @else
                {{-- Bagian jika tidak ada anggota --}}
                <div class="w-full text-center text-white py-20">
                    <h2 class="text-3xl md:text-5xl font-bold mb-5">Oops! No members found for the
                        {{ ucfirst(str_replace('-', ' ', $slug)) }} division yet.</h2>
                    <p class="text-lg md:text-xl mb-8">Be the first to join and contribute to PIONS!</p>
                    <a href="{{ route('apply') }}" class="px-8 py-3 rounded-full bg-emerald-600 text-white text-lg font-medium capitalize">
                        Apply for PIONS Now!
                    </a>
                </div>
            @endif
        </section>
    </body>

@endsection