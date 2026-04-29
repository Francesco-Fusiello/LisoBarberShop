<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Errore</title>

    <link rel="stylesheet">
</head>

<body>

    <div class="min-vh-100">
        {{ $slot }}
    </div>
</body>
</html>