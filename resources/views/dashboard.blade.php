<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard TheVillage</title>
</head>
<body>
    <h1>{{ $dashboard }}</h1>

    <p>Selamat datang, {{ $user->name }}!</p>
    <p>Email: {{ $user->email }}</p>
    <p>Role: {{ $user->role }}</p>

    @if ($user->role === 'PENYELENGGARA')
        <p>Status akun penyelenggara perlu diverifikasi admin sebelum mengelola event.</p>
    @elseif ($user->role === 'ADMIN')
        <p>Anda masuk sebagai Admin.</p>
    @else
        <p>Anda masuk sebagai Warga TheVillage.</p>
    @endif

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Logout</button>
    </form>
</body>
</html>