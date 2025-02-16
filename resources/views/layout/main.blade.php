<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <!-- {{ route('register') }} -->
         <!-- font aw -->
          <!-- Font Awesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>
<body class="bg-gray-100 ">
    @yield('content')


<!-- Heroicons -->
<script src="https://cdn.jsdelivr.net/npm/heroicons@1.0.5/outline/index.js"></script>
<script src="/js/index.js"></script>

</body>
            
   
</html>
