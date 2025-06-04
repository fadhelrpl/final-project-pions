@extends('layouts.main')
@section('content')
    <section class="w-full h-auto py-15 flex flex-col justify-center items-center bg-blue-800 text-white">
        <h1 class="text-4xl md:text-6xl font-semibold text-center mt-15 mb-15">
            {{ $voting->title }}
            <span class="text-pink-600">Voting</span>
        </h1>
        <p class="text-lg text-center mb-10">{{ $voting->description }}</p>

        @if (session('success'))
            <div class="bg-green-500 text-white p-4 rounded-md mb-4">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="bg-red-500 text-white p-4 rounded-md mb-4">{{ session('error') }}</div>
        @endif
        @if ($errors->any())
            <div class="bg-red-500 text-white p-4 rounded-md mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @auth {{-- Hanya tampilkan form voting jika user login --}}
            @if (!$userHasVoted) {{-- Hanya tampilkan form jika user belum vote --}}
                <h2 class="text-3xl font-semibold text-center mb-8">Choose Your Candidate</h2>
                <form action="{{ route('votings.vote', $voting->id) }}" method="POST" class="w-full px-6 md:px-40">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @forelse($allUsersCanBeVoted as $candidate)
                            <label
                                class="w-full bg-sky-50 rounded-xl overflow-hidden border border-blue-950 shadow-md cursor-pointer hover:shadow-lg transition duration-200">
                                <input type="radio" name="candidate_id" value="{{ $candidate->id }}" class="hidden peer">
                                <div class="p-4 text-blue-800 space-y-4 peer-checked:bg-blue-200 peer-checked:border-blue-700">
                                    {{-- Gambar Kandidat (misalnya avatar atau foto profil) --}}
                                    <img src="{{ $candidate->profile_photo_url ?? 'https://via.placeholder.com/150' }}"
                                        class="w-24 h-24 rounded-full mx-auto mb-4 object-cover" alt="{{ $candidate->name }}" />
                                    <h3 class="text-xl md:text-2xl font-semibold text-center">{{ $candidate->name }}</h3>
                                    {{-- Anda bisa menambahkan detail lain tentang kandidat di sini, misalnya posisi mereka --}}
                                    <p class="text-sm text-center">{{ $candidate->pionsPositions->first()->position ?? 'No Position' }}
                                    </p>
                                </div>
                            </label>
                        @empty
                            <div class="col-span-full text-center text-gray-300 py-10">
                                <p class="text-xl">No candidates available for this voting.</p>
                            </div>
                        @endforelse
                    </div>

                    <div class="mt-8 text-center">
                        <button type="submit"
                            class="px-8 py-3 bg-pink-600 text-white font-medium rounded-md border border-[#FF0856] hover:bg-transparent hover:text-[#FF0856] transition duration-200 text-lg">
                            Submit Your Vote
                        </button>
                    </div>
                </form>
            @else
                <div class="bg-blue-500 text-white p-6 rounded-md mb-8 text-center">
                    <p class="text-xl">Thank you! You have already cast your vote for this election.</p>
                </div>
            @endif
        @else
            <div class="bg-yellow-500 text-white p-6 rounded-md mb-8 text-center">
                <p class="text-xl">Please <a href="{{ route('login') }}" class="underline font-bold">login</a> to cast your
                    vote.</p>
            </div>
        @endauth
    </section>
@endsection