<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="preload" as="image" href="/images/sfondo3.jpg">

    <title>@yield('title', 'Liso Barber Shop | Barbiere ad Andria')</title>
    <meta name="description" content="@yield('meta_description', 'Liso Barber Shop è il barbiere di riferimento ad Andria. Taglio uomo, barba e stile moderno. Prenota ora il tuo appuntamento.')">

    <meta name="robots" content="index, follow">
    <meta name="author" content="Liso Barber Shop">
    <meta name="geo.region" content="IT-BT">
    <meta name="geo.placename" content="Andria">

    <meta property="og:title" content="@yield('title', 'Barbiere ad Andria | Liso Barber Shop')">
    <meta property="og:description" content="@yield('meta_description', 'Liso Barber Shop è il barbiere di riferimento ad Andria.')">
    <meta property="og:type" content="website">
    <meta property="og:image" content="{{ asset('images/sfondo3.jpg') }}">

</head>

<body>

    <x-navbar />

    <div
        class="min-vh-100"style="background-image: url('/images/sfondo3.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat; background-attachment: fixed;">
        {{ $slot }}
    </div>

    <x-footer />




</body>

</html>
