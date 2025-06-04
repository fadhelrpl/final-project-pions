<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - PIONS | Pamijahan IDN Organization Nimbly Student</title>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
    @vite('resources/css/app.css')

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        * {
            font-family: 'plus jakarta sans', 'nohemi';
        }
    </style>
</head>

<body>
    <section
        class="w-full h-screen bg-blue-800 relative overflow-x-hidden flex flex-col md:flex-row-reverse justify-between items-center">
        <div
            class="w-auto md:w-full h-auto absolute top-0 md:translate-x-0 -translate-x-45 flex justify-center items-center">
            <img src="{{ asset('images/Ellipse.svg') }}" class="w-150 h-auto z-0">
        </div>

        <div class="w-full md:w-auto h-screen px-5 md:px-15 py-10 flex flex-col justify-start items-end z-10">
            <img src="{{ asset('images/logo_pions.svg') }}" class="w-15 md:w-20 h-auto max-w-full mb-10 md:mb-40">
            <div class="w-full h-auto flex flex-col justify-center items-end">
                <h1 class="text-5xl md:text-7xl font-medium text-white text-right capitalize mb-6 md:mb-10">Welcome
                    <br>back to Pions
                </h1>
                <p class="text-sm md:text-lg text-right font-normal text-white capitalize">sign in. stay active. stay
                    inspired</p>
            </div>
        </div>

        <div
            class="w-full md:w-auto h-screen px-5 md:px-15 py-8 md:py-10 bg-white border-l-0 md:border-l-3 border-l-transparent md:border-l-gray-300 flex flex-col justify-start items-start z-10">
            <h1 class="text-5xl text-blue-800 font-medium capitalize mb-8 md:py-12">sign in</h1>

            <form method="post" action="{{ route('login') }}"
                class="w-full h-auto gap-5 flex flex-col justify-center items-start">
                @csrf
                <div class="w-full h-auto gap-1 flex flex-col justify-center items-start">
                    <h2 class="text-sm text-cyan-900 font-medium capitalize">email</h2>
                    <input type="email" name="email" id="email"
                        class="w-full h-12 px-4 bg-white border-2 border-cyan-900 text-cyan-900 text-sm rounded-lg focus:outline-none"
                        placeholder="Enter your email" required>
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="w-full h-auto gap-1 flex flex-col justify-center items-start">
                    <h2 class="text-sm text-cyan-900 font-medium capitalize">password</h2>
                    <input type="password" name="password" id="password"
                        class="w-full h-12 px-4 bg-white border-2 border-cyan-900 text-cyan-900 text-sm rounded-lg focus:outline-none"
                        placeholder="Enter your password" required>
                    @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="w-full h-auto pt-3 gap-0 md:gap-50 flex justify-between md:justify-center items-center">
                    <a href="#" class="text-black text-sm md:text-base font-medium capitalize underline">forgot your
                        password?</a>
                    <div class="w-auto h-auto gap-1 md:gap-2 flex flex-row-reverse justify-center items-center">
                        <h2 class="text-sm md:text-base text-black font-medium capitalize">remember me</h2>
                        <input type="checkbox" name="remember" id="remember"
                            class="h-4 w-4 focus:outline-none focus:bg-cyan-900">
                    </div>
                </div>

                <div class="w-full h-auto mt-3 md:mt-8 gap-3 flex flex-col justify-center items-center">
                    <button type="submit"
                        class="w-full h-auto mb-1 py-3 text-base text-white capitalize bg-blue-800 rounded-xl border-2 border-blue-800 hover:bg-transparent hover:text-blue-800 transition cursor-pointer">sign
                        in</button>
                    <p class="text-black text-sm">Don't have an account? <a href="{{ route('register') }}"
                            class="text-blue-800 text-sm font-medium decoration-0 capitalize">sign up</a></p>
                </div>
            </form>
        </div>
    </section>
</body>

</html>