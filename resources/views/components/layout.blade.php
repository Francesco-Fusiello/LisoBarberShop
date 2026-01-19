<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
     <link rel="preload" as="image" href="/images/sfondo3.jpg">
  

    <title>Liso Barber Shop</title>
</head>
<body>

<x-navbar/>

    <div class="min-vh-100"style="background-image: url('/images/sfondo3.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat; background-attachment: fixed;">
        {{$slot}}
        </div>

 <x-footer/> 
 
 
 
</body>
</html>
