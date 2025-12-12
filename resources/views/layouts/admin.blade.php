<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>@yield('title', 'Admin - Studio Musik')</title>
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
    <header>
        <h1>Admin Panel</h1>
        <nav>
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
        </nav>
    </header>
    <main>
        @yield('content')
    </main>
</body>
</html>
