<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chatosphere | Login</title>
    <link rel="icon" type="image/x-icon" href="/images/chatosphere_logo.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp" />
    <link rel="stylesheet" href="/css/login.css">
</head>
<body>
    @include('sweetalert::alert')
    <div class="card">
        <div class="top">
            <div class="logo">
                <img src="/images/full_logo.png" alt="Chatosphere Logo" width="200">
            </div>
            <div class="title">Login <span class="color-span">Chatosphere</span></div>
        </div>
        <div class="login-form">
            <form action="/login" method="POST">
                @csrf
                <div class="input-group">
                    <input type="text" name="email" placeholder="Email">
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="">
                    <input type="password" name="password" placeholder="Password">
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit">Login</button>
            </form>
        </div>
    </div>
</body>
</html>