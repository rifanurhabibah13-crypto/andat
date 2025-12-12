<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>@yield('title', 'Studio Musik')</title>
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
    <header>
        <h1>Studio Musik</h1>
        @auth
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit">Logout</button>
            </form>
        @endauth
    </header>
    <main>
        @yield('content')
    </main>
</body>
</html>
