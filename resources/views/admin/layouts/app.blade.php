<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <meta
        name="description"
        content="OBA TECH Administration Panel"
    >

    <title>
        @yield('title', 'Admin Dashboard') | OBA TECH
    </title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>


<body class="bg-slate-100 text-slate-900">

    <div class="flex min-h-screen">

        {{-- Sidebar --}}
        @include('admin.components.sidebar')


        {{-- Main Area --}}
        <div class="flex min-h-screen flex-1 flex-col">

            {{-- Topbar --}}
            @include('admin.components.topbar')


            {{-- Page Content --}}
            <main class="flex-1 p-6 lg:p-8">

                @yield('content')

            </main>

        </div>

    </div>

</body>

</html>