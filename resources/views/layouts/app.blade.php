<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your App Name</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<header>
    <nav>
        <ul>
            <li><a href="{{ route('loginForm') }}">Login</a></li>
            <li><a href="{{ route('registerForm') }}">Register</a></li>
        </ul>
    </nav>
</header>

<main>
    @yield('content')
</main>

<footer>
    <p>&copy; {{ date('Y') }} My blog App</p>
</footer>

<script src="{{ asset('js/app.js') }}"></script>

</body>
</html>

