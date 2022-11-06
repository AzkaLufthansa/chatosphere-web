<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chatosphere | {{ $title }}</title>
    <link rel="icon" type="image/x-icon" href="/images/chatosphere_logo.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp" />
    {{-- My CSS --}}
    @yield('css')

    {{-- Trix Editor --}}
    <link rel="stylesheet" type="text/css" href="/css/trix.css">
    <script type="text/javascript" src="/js/trix.js"></script>
</head>
<body>
    <div class="container">
        {{-- SIDEBAR --}}
        @include('partials.sidebar')

        {{-- MAIN CONTENT --}}
        <main>
            @yield('main')
        </main>

        {{-- RIGHT --}}
        @yield('right')
    </div>
    
    <script src="js/script.js"></script>
</body>
</html>