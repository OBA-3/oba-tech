<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="OBA TECH - Building innovative digital solutions.">

    <title>
        @yield('title', 'OBA TECH')
    </title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-white text-gray-900">

    {{-- Navbar --}}
    <header>
        @include('components.navbar')
    </header>


    {{-- Main Content --}}
    <main>
        @yield('content')
    </main>


    {{-- Footer --}}
    <footer>
        @include('components.footer')
    </footer>

</body>
</html>