<!DOCTYPE html>
<html>
<head>
    <title>Tambah User</title>
</head>
<body>
<h1>Form Tambah User</h1>

@if ($errors->any())
    <ul style="color:red">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ url('/user/tambah_simpan') }}" method="POST">
    @csrf
    <label>Username</label>
    <input type="text" name="username" required><br>

    <label>Nama</label>
    <input type="text" name="nama" required><br>

    <label>Password</label>
    <input type="password" name="password" required><br>

    <label>Level</label>
    <select name="level_id" required>
        @foreach($levels as $level)
            <option value="{{ $level->level_id }}">{{ $level->level_nama }}</option>
        @endforeach
    </select><br><br>

    <input type="submit" value="Simpan">
</form>

<br>
<a href="{{ url('/user') }}">Kembali ke Data User</a>
</body>
</html>