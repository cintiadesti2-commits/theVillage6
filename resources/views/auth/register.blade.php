<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Register TheVillage</title>
    <style>
        body { font-family: Arial; background: #f3f4f6; }
        .container { width: 420px; margin: 30px auto; background: white;
            padding: 25px; border-radius: 10px; }
        input, select, button { width: 100%; padding: 10px;
            margin: 7px 0; box-sizing: border-box; }
        button { background: #166534; color: white; border: 0; cursor: pointer; }
        .error { color: red; font-size: 13px; }
    </style>
</head>
<body>
<div class="container">
    <h2>Daftar TheVillage</h2>

    @if ($errors->any())
        <div class="error">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form method="POST" action="{{ route('register.process') }}">
        @csrf

        <input type="text" name="nama_awal" placeholder="Nama Awal"
               value="{{ old('nama_awal') }}" required>

        <input type="text" name="nama_akhir" placeholder="Nama Akhir"
               value="{{ old('nama_akhir') }}" required>

        <input type="email" name="email" placeholder="Email"
               value="{{ old('email') }}" required>

        <input type="password" name="password" placeholder="Password" required>

        <input type="password" name="password_confirmation"
               placeholder="Konfirmasi Password" required>

        <input type="text" name="no_hp" placeholder="Nomor HP"
               value="{{ old('no_hp') }}" required>

        <input type="number" name="id_desa" placeholder="ID Desa"
               value="{{ old('id_desa', 1) }}" required>

        <input type="text" name="rt" placeholder="RT"
               value="{{ old('rt') }}" required>

        <input type="text" name="rw" placeholder="RW"
               value="{{ old('rw') }}" required>

        <select name="role" required>
            <option value="USER">Warga</option>
            <option value="PENYELENGGARA">Penyelenggara</option>
        </select>

        <button type="submit">Daftar</button>
    </form>

    <p>Sudah punya akun? <a href="{{ route('login') }}">Login</a></p>
</div>
</body>
</html>