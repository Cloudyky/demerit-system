<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Sistem Merit Demerit KVDSAZI</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </head>
    <body class="font-sans antialiased">
        <nav class="navbar bg-body-tertiary">
            <div class="container">
                <a class="navbar-brand" href="{{ route('welcome') }}">
                    <img src="{{ asset('assets/kv_logo.png') }}" alt="" width="250" >
                </a>

                @if (Route::has('login'))
                    <nav class="-mx-3 flex flex-1 justify-end">
                        @auth
                            <a
                                href="{{ url('/dashboard') }}"
                                class="rounded-md px-3 py-2 text-black text-decoration-none "
                            >
                                {{ __('Dashboard') }}
                            </a>
                            @else
                            <a
                                href="{{ route('login') }}"
                                class="rounded-md px-3 py-2 text-black text-decoration-none"
                            >
                                {{ __('Log in') }}
                            </a>
                        @endauth
                    </nav>
                @endif
            </div>
        </nav>
    </body>
</html>
