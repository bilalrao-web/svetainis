<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uplance Web Agency</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <!-- Livewire Styles -->
    @livewireStyles
</head>
<body>
    
     <!-- Renders the Header component -->
     @livewire('header')
    <!-- This will render the content of your main Livewire component (Landing.php) -->
    {{ $slot }}

    <!-- Renders the Footer component -->
    @livewire('footer')
    <!-- Livewire Scripts -->
    @livewireScripts
</body>
</html>
