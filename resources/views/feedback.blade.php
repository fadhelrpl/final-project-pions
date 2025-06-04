@extends('layouts.main')
@section('content')
        <main class="w-full h-auto px-8 md:px-20 flex flex-col justify-center items-center bg-blue-900 py-15 pt-30">
            <section class="w-full h-auto mb-10 flex flex-col justify-center items-start">
                <h1 class="text-white font-black text-4xl sm:text-6xl leading-tight font-nohemi tracking-wide capitalize">Please give <br>your <span class="font-medium font-nohemi">feedback</span></h1>
                <p class="text-white text-base mt-2 leading-snug capitalize">Discover your division that you <br>like it and grown your abilty</p>
            </section>

            <section class="w-full h-auto py-10 bg-white border-4 border-black rounded-3xl gap-30 flex flex-col md:flex-row justify-center items-center">

                <aside class="w-max h-auto flex flex-col justify-center items-center">
                    <img src="{{ asset('images/logo.svg') }}" alt="" class="w-60 md:w-80 h-auto max-w-full mb-3">
                    <div class="w-auto h-auto px-5 flex flex-col justify-center items-center md:items-start">
                        <h1 class="text-blue-800 text-3xl md:text-4xl text-center md:text-left font-bold capitalize">pamijahan IDN <br>organization <br>nimbly student</h1>
                        <p class="text-blue-800 text-lg text-center md:tel font-medium capitalize">SMK IDN boarding school bogor</p>
                    </div>
                </aside>

                <form method="POST" action="{{ route('feedback') }}" class="w-full md:w-1/2 h-auto px-5 md:px-0 flex flex-col justify-center items-center">
                    @csrf

                    @if (session('success'))
                        <div class="w-full text-green-600 text-base font-semibold mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    <h1 class="w-full mb-3 text-black text-3xl md:text-4xl text-center md:text-left font-bold font-nohemi tracking-wide capitalize">give feedback</h1>

                    <div class="w-full h-auto mb-5 gap-3 flex flex-col justify-center items-start">
                        <div class="w-full h-auto flex flex-col justify-center items-start">
                            <label for="feedback" class="w-full mb-2 text-black text-base text-left font-medium capitalize">subject</label>
                            <input type="text" name="subject" class="w-full h-auto py-2 px-4 border-2 border-black bg-white rounded-md text-black text-base" placeholder="Enter your subject">
                        </div>

                        <div class="w-full h-auto flex flex-col justify-center items-start">
                            <label for="feedback" class="w-full mb-2 text-black text-base text-left font-medium capitalize">Do you have any thoughts you'd like to share?</label>
                            <input type="text" name="message" class="w-full h-45 py-2 px-4 border-2 border-black bg-white rounded-md text-black text-base">
                        </div>
                    </div>

                    <div class="w-full h-auto px-10 gap-5 flex justify-center items-center">
                        <button type="submit" class="w-full py-3 border-2 border-black rounded-full bg-black hover:bg-transparent text-base text-white hover:text-black font-normal capitalize transition-all cursor-pointer">send</button>
                    </div>
                </form>

            </section>
        </main>
@endsection
