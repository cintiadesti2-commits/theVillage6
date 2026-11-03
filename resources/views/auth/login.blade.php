<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login TheVillage</title>
    <style>
        body { font-family: Arial; background: #f3f4f6; }
        .container { width: 350px; margin: 80px auto; background: white;
            padding: 25px; border-radius: 10px; }
        input, button { width: 100%; padding: 10px;
            margin: 8px 0; box-sizing: border-box; }
        button { background: #166534; color: white; border: 0; cursor: pointer; }
        .error { color: red; }
        .success { color: green; }
    </style>
</head>
<body>
<div class="container">
    <h2>Login TheVillage</h2>

    @if (session('success'))
        <p class="success">{{ session('success') }}</p>
    @endif

    @if ($errors->any())
        <p class="error">{{ $errors->first() }}</p>
    @endif

    <form method="POST" action="{{ route('login.process') }}">
        @csrf

        <input type="email" name="email" placeholder="Email"
               value="{{ old('email') }}" required>

        <input type="password" name="password" placeholder="Password" required>

        <button type="submit">Masuk</button>
    </form>

    <p>Belum punya akun? <a href="{{ route('register') }}">Daftar</a></p>
</div>
</body>
</html>