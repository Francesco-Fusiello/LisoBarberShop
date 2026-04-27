<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    

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

    <div>

        {{ $slot }}
    </div>

    <x-footer />


    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            once: true,
            offset: 300,
            easing: 'ease-out-cubic'
        });
    </script>

</body>

</html>
