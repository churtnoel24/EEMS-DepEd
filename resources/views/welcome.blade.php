<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous">
    <link rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
</head>
<body class="min-vh-100 d-flex flex-column">
    <header class="w-100 py-4 bg-primary">
        <div class="container d-flex justify-content-center">
            @if (Route::has('login'))
                <nav class="d-flex align-items-center gap-3">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="btn btn-light me-2">Dashboard</a>
                        <a href="{{ url('/health-card/create') }}" class="btn btn-outline-light">Create Health Card</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-light me-2">Log in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-outline-light">Register</a>
                        @endif
                    @endauth
                </nav>
            @endif
        </div>
    </header>
    <main class="flex-grow-1 d-flex align-items-center justify-content-center">
        <div class="text-center">
            <h1 class="mt-4 fs-2 fs-lg-1 fw-semibold">Welcome to Electronic Employees' Medical System</h1>
            <p class="mt-3 fs-6 fs-lg-5 mx-auto" style="max-width: 500px;">
                Electronic Employees’ Medical System (EEMS) is a secure,
                web-based platform that streamlines employee medical record management.<br>
                It allows staff to easily book appointments, track medical histories,
                and access health information while enabling administrators to efficiently<br>
                monitor records and generate reports—all in one centralized, paperless system.
            </p>
        </div>
    </main>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous">
    </script>
</body>
</html>
