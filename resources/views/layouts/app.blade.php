<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>UK Company Checker</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4">
        <a class="navbar-brand text-white" href="{{ route('companies.search') }}">UK Company Checker</a>
        @auth
        <span class="navbar-text text-white ms-auto">Welcome, {{ auth()->user()->name }}</span>
        @endauth
    </nav>

    <main class="container mt-4">
        @yield('content')
    </main>
</body>
</html>
