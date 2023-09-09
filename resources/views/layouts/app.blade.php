<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        @vite('resources/css/app.css')
        <title>{{ $page_title }}</title>

        @livewireStyles
</head>

<body>
        <div class="flex">
                <nav class="sidebar md:w-1/5">
                        <x-sidebar_admin />
                </nav>
                <main class="relative container md:w-4/5 min-h-screen p-3 overflow-x-hidden"
                        style="background-color: var(--color-1)">


                        @yield('content')
                </main>
        </div>

        @livewireScripts
</body>

</html>