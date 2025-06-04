@extends('layouts.main')
@section('content')
    <section class="w-full h-screen bg-blue-900 relative overflow-hidden flex flex-col justify-center items-center">
        <img src="{{ asset('images/hero-vec-bg.svg') }}" class="w-130 h-auto max-w-full absolute -top-10 -right-40">

        <div class="w-full h-auto px-5 gap-5 flex flex-col-reverse md:flex-row justify-center md:justify-between items-center md:items-center z-10
                max-w-7xl lg:max-w-screen-2xl mx-auto py-10 md:py-0"> 

            <div class="w-full h-auto pl-0 md:pl-20 pb-0 md:pb-0 flex flex-col justify-center items-center md:items-start ">
                <h1
                    class="mb-3 md:mb-4 text-5xl md:text-8xl text-white text-center md:text-left font-black font-nohemi capitalize tracking-wide">
                    grow <br>your skill <br>with pions</h1>
                <p class="mb-5 md:mb-10 text-base md:text-2xl text-white text-center md:text-left font-medium">Let's grow
                    together and<br>make cool things happend</p>
                <div class="w-full h-auto gap-5 flex justify-center md:justify-start items-center">
                    <a href="#"
                        class="px-8 md:px-10 py-3 border-4 border-emerald-500 rounded-full bg-emerald-500 text-sm md:text-lg text-white text-center md:text-left font-medium font-nohemi capitalize">join
                        us</a>
                    <a href="#"
                        class="px-8 md:px-10 py-3 border-4 border-purple-600 rounded-full bg-purple-600 text-sm md:text-lg text-white text-center md:text-left font-medium font-nohemi capitalize">explore
                        division</a>
                </div>
            </div>

            <div class="w-full h-auto pr-0 md:pr-30 flex justify-center md:justify-end items-center z-10
                        md:mt-0">
                <img src="{{ asset('images/hero-img.png') }}" alt="hero-card-image" class="w-full max-w-xs sm:max-w-sm md:w-80 h-auto
                            transform rotate-6 -translate-y-10 md:rotate-0 md:translate-y-0
                            lg:w-[400px] lg:h-auto lg:max-w-none lg:pr-0"> 
            </div>
        </div>
    </section>
    
    <section class="w-full h-auto bg-blue-900 py-10 relative overflow-hidden flex flex-col justify-center items-center">
                    <div class="w-full h-auto px-5 md:px-20 mb-10 gap-5 flex justify-between items-center">
                        <h1 class="w-full md:w-90 text-2xl md:text-5xl text-white font-black font-nohemi capitalize">Meet the leaders of
                            <span class="font-medium">pions division</span></h1>
                        <p class="w-full md:w-65 text-xs md:text-lg text-white text-right md:text-left font-normal">Find the division
                            you vibe with & level up your skills 🚀</p>
                    </div>

                    <div class="w-full h-auto flex justify-center items-center">

                        <div class="w-full h-auto px-3 md:px-25 absolute flex justify-between items-center z-10">
                            <p id="kiri"
                                class="h-11 px-4 rounded-full bg-white overflow-hidden flex justify-center items-center shadow-sm shadow-black/30 cursor-pointer">
                                <i class="fa-solid fa-caret-left text-2xl text-blue-800"></i></p>
                            <p id="kanan"
                                class="h-11 px-4 rounded-full bg-white overflow-hidden flex justify-center items-center shadow-sm shadow-black/30 cursor-pointer">
                                <i class="fa-solid fa-caret-right text-2xl text-blue-800"></i></p>
                        </div>

                        <div class="w-full h-auto px-2 md:px-30 overflow-x-scroll scrollbar-hidden flex items-center">
                            <div id="cardContainer" class="w-max h-auto relative overflow-hidden gap-3 flex">
                                @foreach($divisionLeaders as $leaderPionsPosition) {{-- <-- Perubahan di sini: Pakai leaderPionsPosition --}}
                                    {{-- Tambahkan pengecekan null untuk relasi member --}}
                                    @if ($leaderPionsPosition->member)
                                        @php
                                            $leader = $leaderPionsPosition->member;
                                            $photoUrl = $leader->photo ? asset('storage/' . $leader->photo) : 'https://ui-avatars.com/api/?name=' . urlencode($leader->name) . '&color=FFFFFF&background=111827&size=200';
                                        @endphp
                                        <div
                                            class="w-90 min-w-90 max-w-90 h-auto pb-10 border-4 border-black bg-white rounded-3xl relative overflow-hidden flex flex-col justify-center items-start">
                                            <div class="w-full h-auto
                                                        @if ($leaderPionsPosition->position->value == \App\Enums\Position::MEDIA_HEAD->value) bg-blue-600
                                                        @elseif ($leaderPionsPosition->position->value == \App\Enums\Position::EVENT_HEAD->value) bg-purple-700
                                                        @elseif ($leaderPionsPosition->position->value == \App\Enums\Position::PR_HEAD->value) bg-pink-600
                                                        @elseif ($leaderPionsPosition->position->value == \App\Enums\Position::CLEANLINESS_HEAD->value) bg-red-900
                                                        @elseif ($leaderPionsPosition->position->value == \App\Enums\Position::UBUDIYYAH_HEAD->value) bg-yellow-400
                                                        @elseif ($leaderPionsPosition->position->value == \App\Enums\Position::EDUCATION_HEAD->value) bg-emerald-600
                                                        @elseif ($leaderPionsPosition->position->value == \App\Enums\Position::SPORTS_HEAD->value) bg-orange-600
                                                        @else bg-gray-600 @endif
                                                        pt-6 mb-5 flex justify-center items-end">
                                                {{-- TIDAK ADA LOOP BERSARANG DI SINI --}}
                                                <img src="{{ $photoUrl }}" alt="{{ $leader->name }}"
                                                    class="w-full h-full object-cover rounded-md">
                                            </div>
                                            <div class="w-full h-auto px-4 mb-1 flex justify-between items-start">
                                                <h1 class="text-blue-800 text-3xl capitalize font-black">{{ $leader->name }}</h1>
                                                <a href="#" class="px-5 py-2 rounded-full text-white text-[10px] capitalize font-medium
                                                    @if ($leaderPionsPosition->position->value == \App\Enums\Position::MEDIA_HEAD->value) bg-blue-600
                                                    @elseif ($leaderPionsPosition->position->value == \App\Enums\Position::EVENT_HEAD->value) bg-purple-700
                                                    @elseif ($leaderPionsPosition->position->value == \App\Enums\Position::PR_HEAD->value) bg-pink-600
                                                    @elseif ($leaderPionsPosition->position->value == \App\Enums\Position::CLEANLINESS_HEAD->value) bg-red-900
                                                    @elseif ($leaderPionsPosition->position->value == \App\Enums\Position::UBUDIYYAH_HEAD->value) bg-yellow-400
                                                    @elseif ($leaderPionsPosition->position->value == \App\Enums\Position::EDUCATION_HEAD->value) bg-emerald-600
                                                    @elseif ($leaderPionsPosition->position->value == \App\Enums\Position::SPORTS_HEAD->value) bg-orange-600
                                                    @else bg-gray-600 @endif">see more</a>
                                            </div>
                                            <p class="ml-4 text-blue-800 text-sm capitalize font-bold">
                                                {{ str_replace('President of ', 'Leader of ', $leaderPionsPosition->position->value) }}</p>
                                        </div>
                                    @endif {{-- Akhir dari pengecekan @if ($leaderPionsPosition->member) --}}
                                @endforeach

                            </div>
                        </div>
                    </div>
    </section>

    {{-- Bagian "what is pions" tetap sama --}}
    <section
                    class="w-full h-auto md:h-screen py-10 px-5 bg-blue-900 gap-10 relative overflow-hidden flex flex-col md:flex-row justify-center items-center">
                    <div class="w-full h-auto flex justify-center md:justify-end items-center">
                        <img src="{{ asset('images/posterPions.png') }}" class="w-60 md:w-100 h-auto max-w-full">
                    </div>
                    <div class="w-full h-auto flex flex-col justify-center items-center md:items-start">
                        <h1 class="w-auto md:w-60 text-white text-4xl md:text-6xl text-center md:text-left font-nohemi capitalize">what
                            is <span class="font-extrabold font-nohemi tracking-wider">pions</span>?</h1>
                        <p class="w-full md:w-110 text-white text-sm md:text-xl text-justify font-medium mb-5">PIONS (Pamijahan IDN
                            Organization Nimbly Student) is a student
                            organization at SMK IDN Boarding School Bogor that helps students grow their skills, lead with confidence,
                            and explore their passions through 4
                            main divisions.</p>

                        <div class="w-full h-auto mb-6 gap-5 flex justify-center md:justify-start items-center">
                            <div
                                class="w-20 h-20 px-3 bg-emerald-600 relative overflow-hidden flex flex-col justify-center items-center">
                                <h2 class="w-full text-left text-white text-xl md:text-3xl font-bold font-nohemi capitalize">30+</h2>
                                <p class="w-full text-left text-white text-xs md:text-sm font-medium font-nohemi capitalize leading-4">
                                    active member</p>
                            </div>
                            <div
                                class="w-20 h-20 px-3 bg-purple-700 relative overflow-hidden flex flex-col justify-center items-center">
                                <h2 class="w-full text-left text-white text-xl md:text-3xl font-bold font-nohemi capitalize">6</h2>
                                <p class="w-full text-left text-white text-xs md:text-sm font-medium font-nohemi capitalize leading-4">
                                    inspiring leaders division</p>
                            </div>
                            <div class="w-20 h-20 px-3 bg-pink-600 relative overflow-hidden flex flex-col justify-center items-center">
                                <h2 class="w-full text-left text-white text-xl md:text-3xl font-bold font-nohemi capitalize">5</h2>
                                <p class="w-full text-left text-white text-xs md:text-sm font-medium font-nohemi capitalize leading-4">
                                    pions pillars</p>
                            </div>
                        </div>

                        <div class="w-full h-auto gap-5 flex justify-center md:justify-start items-center">
                            <a href="#"
                                class="px-5 md:px-8 py-2 border-4 border-emerald-600 rounded-full bg-emerald-600 text-sm text-center md:text-left text-white font-medium capitalize">learn
                                more</a>
                            <a href="#"
                                class="px-5 md:px-8 py-2 border-4 border-pink-600 rounded-full bg-pink-600 text-sm text-center md:text-left text-white font-medium capitalize">explore
                                division</a>
                        </div>
                    </div>
    </section>

    <section
                    class="w-full h-auto px-5 md:px-15 bg-blue-900 relative overflow-hidden flex flex-row-reverse justify-between items-center">
                    <h1 class="w-100 md:w-120 text-white text-xl md:text-5xl text-right font-bold font-nohemi capitalize">Welcome to
                        pions and here the 5 Pillar <span class="font-medium">of Pions</span></h1>
                    <p class="w-70 text-white text-xs md:text-xl text-left font-medium capitalize">Explore PIONS' Divisions, Uncover
                        Your Hidden Talents, and Grow Your
                        Potential!</p>
    </section>

    <section
                        class="w-full h-auto px-5 md:px-15 py-10 bg-blue-900 gap-6 relative overflow-hidden flex md:grid flex-col md:grid-cols-2 justify-center items-center">

                        @foreach($pillars as $pillarPionsPosition) {{-- <-- Perubahan di sini: Pakai pillarPionsPosition --}}
                            @if ($pillarPionsPosition->member) {{-- <-- Tambahkan pengecekan null --}}
                                @php
                                    $member = $pillarPionsPosition->member; // Ambil objek Member
                                    $photoUrl = $member->photo ? asset('storage/' . $member->photo) : 'https://ui-avatars.com/api/?name=' . urlencode($member->name) . '&color=FFFFFF&background=111827&size=200';
                                @endphp
                                <div
                                    class="w-max h-auto px-3 md:px-5 py-5 md:py-10 bg-white border-2 border-black rounded-xl gap-5 flex justify-center items-center">
                                    {{-- TIDAK ADA LOOP BERSARANG DI SINI --}}
                                    <div class="pions-member-card">
                                        <div class="member-photo">
                                            <img src="{{ $photoUrl }}" alt="{{ $member->name }}" class="w-full h-full object-cover rounded-md">
                                        </div>
                                        {{-- Baris ini mungkin tidak perlu di sini jika Anda sudah menampilkannya di H1 dan P di bawah --}}
                                        {{-- <h3 class="member-name">{{ $member->name }}</h3> --}}
                                        {{-- <p class="member-position">{{ $pillarPionsPosition->position->value }}</p> --}}
                                        {{-- Tambahkan link sosial media jika ada --}}
                                    </div>
                                    <div class="w-40 md:w-70 h-auto flex flex-col justify-center items-start">
                                        <h1 class="text-blue-800 font-bold text-lg md:text-3xl text-left capitalize">{{ $member->name }}
                                        </h1>
                                        <p class="text-blue-800 font-medium text-xs md:text-base text-left capitalize mb-2 md:mb-5">
                                            {{ $pillarPionsPosition->position->value }}</p>
                                        <div class="w-auto h-auto gap-2 md:gap-5 flex justify-start items-center">
                                            <a href="#" class="w-10 md:w-18 h-10 md:h-18 p-3 bg-emerald-600 flex justify-center items-center"><i
                                                    class="fa-brands fa-instagram text-white text-2xl md:text-4xl"></i></a>
                                            <a href="#" class="w-10 md:w-18 h-10 md:h-18 p-3 bg-purple-700 flex justify-center items-center"><i
                                                    class="fa-brands fa-facebook text-white text-2xl md:text-4xl"></i></a>
                                            <a href="#" class="w-10 md:w-18 h-10 md:h-18 p-3 bg-pink-600 flex justify-center items-center"><i
                                                    class="fa-brands fa-linkedin text-white text-2xl md:text-4xl"></i></a>
                                        </div>
                                    </div>
                                </div>
                            @endif {{-- Akhir dari pengecekan @if ($pillarPionsPosition->member) --}}
                        @endforeach

    </section>

    <script>
                        const container = document.getElementById("cardContainer");
                        const scrollAmount = 372; // Pastikan ini sesuai dengan lebar card + gap

                        const kanan = document.getElementById("kanan").onclick = () => {
                            container.scrollBy({ left: scrollAmount, behavior: "smooth" });
                        };

                        const kiri = document.getElementById("kiri").onclick = () => {
                            container.scrollBy({ left: -scrollAmount, behavior: "smooth" });
                        };
    </script>

@endsection