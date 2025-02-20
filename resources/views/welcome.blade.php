<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Sistem Merit Demerit KVDSAZI</title>

        <!-- Fonts and Bootstrap -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

        <style>
            html, body {
                height: 100%;
                margin: 0;
            }
            body {
                display: flex;
                flex-direction: column;
            }
            .content {
                flex: 1;
            }
            footer {
                background-color: #343a40;
                color: white;
            }
        </style>
    </head>
    <body class="font-sans antialiased bg-light">

        <nav class="navbar bg-body-tertiary shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ route('welcome') }}">
                    <img src="{{ asset('assets/kv_logo.png') }}" alt="KVDSAZI Logo" width="250">
                </a>

                @if (Route::has('login'))
                    <div class="d-flex">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="btn btn-outline-primary me-2">
                                {{ __('Dashboard') }}
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-primary me-2">
                                {{ __('Log in') }}
                            </a>
                        @endauth
                    </div>
                @endif
            </div>
        </nav>

        <div class="content">
            <div class="container text-center mt-5">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <h1 class="display-4 fw-bold">Selamat Datang ke Sistem Merit Demerit KVDSAZI</h1>
                        <p class="lead text-muted mt-3">
                            Sistem ini direka untuk membantu menguruskan rekod merit dan demerit pelajar dengan mudah dan efisien. Log masuk untuk teruskan!
                        </p>
                        @if (Route::has('login'))
                            @auth
                                <a href="{{ url('/dashboard') }}" class="btn btn-success btn-lg mt-4">{{ _('Go to Dashboard') }}</a>
                            @else
                                <a href="{{ route('login') }}" class="btn btn-primary btn-lg mt-4 me-2">{{ _('Log In') }}</a>
                            @endauth
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <footer class="text-center py-3">
            <p class="mb-0">&copy; {{ date('Y') }} {{ _('Sistem Merit Demerit KVDSAZI') }}</p>
        </footer>
    </body>
    
</html>
