@extends('layouts.main')

@php
    use App\Enums\Position; // Pastikan ini diimport

    // Opsional: Definisikan warna untuk setiap jenis posisi atau berdasarkan divisi
    $positionColors = [
        Position::PRESIDENT->value => 'bg-[#ff2a5b] hover:bg-[#e0244f]', // Merah
        Position::VICE_PRESIDENT->value => 'bg-purple-700 hover:bg-purple-800', // Ungu
        Position::SECRETARY->value => 'bg-blue-600 hover:bg-blue-700', // Biru
        Position::VICE_SECRETARY->value => 'bg-cyan-600 hover:bg-cyan-700', // Cyan
        Position::TREASURER->value => 'bg-green-600 hover:bg-green-700', // Hijau
            // Divisi Heads (gunakan warna konsisten, misal biru)
        Position::MEDIA_HEAD->value => 'bg-indigo-600 hover:bg-indigo-700',
        Position::EVENT_HEAD->value => 'bg-indigo-600 hover:bg-indigo-700',
        Position::EDUCATION_HEAD->value => 'bg-indigo-600 hover:bg-indigo-700',
        Position::UBUDIYYAH_HEAD->value => 'bg-indigo-600 hover:bg-indigo-700',
        Position::PR_HEAD->value => 'bg-indigo-600 hover:bg-indigo-700',
        Position::SPORTS_HEAD->value => 'bg-indigo-600 hover:bg-indigo-700',
        Position::CLEANLINESS_HEAD->value => 'bg-indigo-600 hover:bg-indigo-700',
            // Member Divisi (gunakan warna konsisten, misal hijau muda)
        Position::MEDIA_MEMBER->value => 'bg-lime-600 hover:bg-lime-700',
        Position::EVENT_MEMBER->value => 'bg-lime-600 hover:bg-lime-700',
        Position::EDUCATION_MEMBER->value => 'bg-lime-600 hover:bg-lime-700',
        Position::UBUDIYYAH_MEMBER->value => 'bg-lime-600 hover:bg-lime-700',
        Position::PR_MEMBER->value => 'bg-lime-600 hover:bg-lime-700',
        Position::SPORTS_MEMBER->value => 'bg-lime-600 hover:bg-lime-700',
        Position::CLEANLINESS_MEMBER->value => 'bg-lime-600 hover:bg-lime-700',
    ];

    // Fungsi helper untuk mendapatkan URL gambar
    function getPositionImageUrl($positionValue)
    {
        $basePath = 'images/positions/'; // Folder utama untuk semua gambar posisi
        $fileName = Str::slug($positionValue, '_') . '.jpg';
        $fullPath = asset($basePath . $fileName);
        // Fallback ke ui-avatars jika gambar tidak ditemukan
        return $fullPath;
    }
@endphp

@section('content')
    <section class="w-full h-auto py-20 bg-blue-900 flex flex-col justify-center items-center">
        <header class="w-full px-8 md:px-15 my-18 flex justify-between items-center">
            <h1 class="w-120 text-4xl md:text-6xl text-white font-black font-nohemi">Being Part of us in <span
                    class="font-normal font-nohemi">Pions</span></h1>
            <p class="w-60 text-xs md:text-base text-white font-normal">Discover your division that you like it and grow
                your ability</p>
        </header>

        <h2 class="font-jakarta font-extrabold text-2xl md:text-4xl mb-10 text-[#FF3475] animate-fade-in-down delay-400">
            Apply to be a Member or Head of Pions
        </h2>

        <form action="{{ route('apply.store') }}"
            class="bg-white rounded-2xl p-8 sm:p-10 text-[#1f3e91] shadow-2xl transform transition-all duration-300 hover:shadow-3xl animate-fade-in-up"
            enctype="multipart/form-data" method="POST">
            @csrf
            <input name="user_id" type="hidden" value="{{ auth()->id() }}" />

            {{-- Bagian Pilihan Posisi --}}
            <label class="block font-jakarta font-bold mb-4 text-base sm:text-lg text-[#1f3e91]" for="preferred_position">
                Preferred Position
            </label>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-3 xl:grid-cols-4 gap-6 mb-10">
                {{-- Loop untuk semua posisi --}}
                @foreach (Position::cases() as $position)
                    @php
                        $displayLabel = '';
                        $bgColorClass = $positionColors[$position->value] ?? 'bg-gray-600 hover:bg-gray-700'; // Default jika tidak ada di map
                        $imageUrl = getPositionImageUrl($position->value); // Dapatkan URL gambar

                        // Logika untuk displayLabel
                        if ($position->value === Position::PRESIDENT->value) {
                            $displayLabel = 'President Of Pions';
                        } elseif ($position->value === Position::VICE_PRESIDENT->value) {
                            $displayLabel = 'Vice President Of Pions';
                        } elseif ($position->value === Position::SECRETARY->value) {
                            $displayLabel = 'Secretary Of Pions';
                        } elseif ($position->value === Position::VICE_SECRETARY->value) {
                            $displayLabel = 'Vice Secretary Of Pions';
                        } elseif ($position->value === Position::TREASURER->value) {
                            $displayLabel = 'Treasurer Of Pions';
                        } elseif (Str::contains($position->value, 'President of')) {
                            // Ini untuk Head Divisi selain Pions President
                            $displayLabel = Str::replace('President of ', '', $position->value) . ' Head';
                        } elseif (Str::contains($position->value, 'Member of')) {
                            // Ini untuk Member Divisi
                            $displayLabel = Str::replace('Member of ', '', $position->value) . ' Member';
                        } else {
                            // Default jika tidak masuk kategori di atas (misal: 'Anggota')
                            $displayLabel = $position->value;
                        }
                    @endphp

                    <label class="cursor-pointer">
                        <input class="hidden peer" id="pos_{{ Str::slug($position->name, '_') }}" name="preferred_position"
                            required type="radio" value="{{ $position->value }}" />
                        <div
                            class="card-content {{ $bgColorClass }} rounded-xl p-5 flex flex-col items-center text-white hover:transition duration-300 transform hover:-translate-y-1 hover:scale-105 peer-checked:ring-4 peer-checked:ring-[#FF3475] peer-checked:ring-offset-2 peer-checked:ring-offset-white">
                            <div class="relative w-28 h-28 mb-4 image-wrapper">
                                <img alt="{{ $displayLabel }} icon"
                                    class="w-full h-full rounded-xl object-cover shadow-md group-hover:shadow-lg transition-all duration-300"
                                    height="112" src="{{ $imageUrl }}"
                                    onerror="this.onerror=null;this.src='https://ui-avatars.com/api/?name={{ urlencode($displayLabel) }}&color=FFFFFF&background=111827&size=200';"
                                    width="112" />
                                <i class="fas fa-check-circle checkmark-icon"></i>
                            </div>
                            <span class="font-jakarta font-semibold text-lg text-center">{{ $displayLabel }}</span>
                        </div>
                    </label>
                @endforeach
            </div>
            {{-- End Bagian Pilihan Posisi --}}

            {{-- ... Bagian Motivation, Upload Photo, Submit Button tetap sama ... --}}

            <label class="block font-jakarta font-bold mb-4 text-base sm:text-lg text-[#1f3e91]" for="motivation">
                Motivation
            </label>
            <textarea
                class="w-full rounded-lg border border-gray-300 p-4 text-[#1f3e91] resize-none focus:outline-none focus:ring-3 focus:ring-[#1f3e91] focus:border-transparent transition duration-200 shadow-sm"
                id="motivation" name="motivation"
                placeholder="Tell us why you want to join Pions and what you hope to achieve..." required
                rows="7"></textarea>
            @error('motivation')
                <p class="text-red-500 text-xs mt-1 mb-4">{{ $message }}</p>
            @enderror

            <label class="block font-jakarta font-bold mt-10 mb-4 text-base sm:text-lg text-[#1f3e91]" for="photo">
                Upload Your Photo
                <span class="text-gray-500 font-normal text-sm">(optional, Max 5MB)</span>
            </label>
            <input accept="image/png, image/jpeg, image/gif"
                class="block w-full text-sm text-gray-500 file:mr-5 file:py-3 file:px-6 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-[#1f3e91] file:text-white hover:file:bg-[#16326b] cursor-pointer transition duration-200 focus:outline-none focus:ring-2 focus:ring-[#1f3e91]"
                id="photo" name="photo" type="file" />
            @error('photo')
                <p class="text-red-500 text-xs mt-1 mb-4">{{ $message }}</p>
            @enderror

            <button
                class="mt-12 bg-[#ff2a5b] hover:bg-[#e0244f] text-white font-jakarta font-bold py-4 px-8 rounded-xl w-full transition duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl text-lg sm:text-xl tracking-wide"
                type="submit">
                Submit Application
            </button>
        </form>
    </section>
@endsection