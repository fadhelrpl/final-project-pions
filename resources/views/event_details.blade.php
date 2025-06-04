@extends('layouts.main')
@section('content')
<body class="">
    <main class="pt-33 pb-20 pl-3 pr-3">
        <section class="max-w-[900px] mx-auto bg-white rounded-[20px] border-2 border-black p-6">
            <img class="rounded-[20px] w-full mb-4 h-96 object-cover" src="{{ $events->image_url ?: 'https://picsum.photos/600/400?random=' . $events->id }}"/>
            <p class="text-sm text-blue-800 mb-2"><i class="fas fa-map-pin mr-2"></i>SMK IDN Boarding School Bogor</p>
            <p class="text-sm text-blue-800 mb-3"><i class="fas fa-scroll mr-1"></i>Category: Education &amp; Skill Development</p>
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 sm:gap-6 mb-6">
                <!-- Bagian Kiri: Judul dan Penulis -->
                <div class="flex-1">
                    <h1 class="text-blue-800 font-extrabold text-3xl leading-tight">{{ $events->title }}</h1>
                    <p class="text-gray-400 text-sm mt-2">Written By: {{ $events->creator->name }}</p>
                </div>

                <!-- Bagian Kanan: Tanggal -->
                @if ($events->date)
                    <div class="bg-green-600 text-white font-extrabold text-xl rounded-sm w-full sm:w-auto px-5 py-4 flex flex-col items-center justify-center">
                        <div class="text-3xl font-nohemi leading-none">
                            {{ $events->date->format('d') }}
                        </div>
                        <div class="text-lg md:text-xs font-semibold font-nohemi leading-none sm:mt-1 sm:text-center">
                            {{ $events->date->format('M y') }}
                        </div>
                    </div>
                @else
                    <div class="bg-green-600 text-white font-extrabold text-xl rounded-sm w-full sm:w-auto px-5 py-4 flex items-center justify-center">
                        <div class="text-center leading-tight">
                            Tanggal tidak ditentukan
                        </div>
                    </div>
                @endif
            </div>
            <p class="text-blue-800 text-base leading-tight mb-2 font-bold">Place:</p>
            <p class="text-blue-800 text-sm leading-tight mb-6 text-justify">{{ $events->location }}</p>
            <p class="text-blue-800 text-sm mb-2 font-semibold">Share To:</p>
            <div class="flex space-x-4 text-blue-800 text-sm font-semibold">
                <div class="flex items-center space-x-1">
                    <button type="button"><i class="fab fa-instagram text-base mr-1"></i><span>Instagram</span></button>
                </div>
                <div class="flex items-center space-x-1">
                    <button type="button"><i class="fab fa-facebook-f text-base mr-1"></i><span>Facebook</span></button>
                </div>
                <div class="flex items-center space-x-1">
                    <button type="button"><i class="fab fa-tiktok text-base mr-1"></i><span>TikTok</span></button>
                </div>
            </div>
        </section>
    </main>
</body>
@endsection
