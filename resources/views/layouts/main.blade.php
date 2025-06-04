<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }} | Pamijahan IDN Organization Nimbly Student</title>

    <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />

    @vite('resources/css/app.css')

    <link rel="shortcut icon" href="{{ asset('images/logo_pions.svg') }}" type="image/x-icon">

    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.1/css/all.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.1/css/sharp-thin.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.1/css/sharp-solid.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.1/css/sharp-regular.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.1/css/sharp-light.css">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        * {
            font-family: 'plus jakarta sans', serif;
        }

        [x-cloak] { display: none !important; }

        .font-nohemi {
            font-family: 'nohemi', 'plus jakarta sans';
        }

        .scrollbar-hidden::-webkit-scrollbar {
            display: none;
        }

        .checkmark-icon {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 3.5rem;
            /* Larger icon */
            color: #FF3475;
            /* Yellow color */
            text-shadow: 0 0 10px rgba(0, 0, 0, 0.6);
            /* Subtle shadow for visibility */
            opacity: 0;
            /* Hidden by default */
            transition: opacity 0.3s ease-in-out;
            z-index: 10;
            /* Ensure it's above the image */
        }

        /* Show checkmark when the sibling input is checked */
        .peer:checked~.card-content .image-wrapper .checkmark-icon {
            opacity: 1;
        }

        /* Dim image when the sibling input is checked */
        .peer:checked~.card-content .image-wrapper img {
            filter: brightness(60%);
            /* Dim the image */
        }
    </style>

    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

</head>

<body class="h-full bg-blue-900">
    <div class="min-h-full">

        @include('partials.navbar')

        <main>
            @yield('content')
        </main>

        @include('partials.footer')
    </div>
</body>

</html>
