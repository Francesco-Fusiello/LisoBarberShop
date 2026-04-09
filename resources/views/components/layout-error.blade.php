<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Errore</title>

    <link rel="stylesheet">
</head>

<body class="error-body min-vh-100"style="background-image: url('/images/sfondo3.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat; background-attachment: fixed;">

    <div class="error-page">
        {{ $slot }}
    </div>
</body>
</html>