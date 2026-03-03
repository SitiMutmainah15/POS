<!DOCTYPE html>
<html>
<head>
    <title>Ubah User</title>
</head>
<body>
<h1>Form Ubah User</h1>

@if ($errors->any())
    <ul style="color:red">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ url('/user/ubah_simpan/'.$data->user_id) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Username</label>
    <input type="text" name="username" value="{{ $data->username }}" required><br>

    <label>Nama</label>
    <input type="text" name="nama" value="{{ $data->nama }}" required><br>

    <label>Password</label>
    <input type="password" name="password" placeholder="Kosongkan jika tidak diubah"><br>

    <label>Level</label>
    <select name="level_id" required>
        @foreach($levels as $level)
            <option value="{{ $level->level_id }}" {{ $data->level_id == $level->level_id ? 'selected' : '' }}>
                {{ $level->level_nama }}
            </option>
        @endforeach
    </select><br><br>

    <input type="submit" value="Simpan Perubahan">
</form>

<br>
<a href="{{ url('/user') }}">Kembali ke Data User</a>
</body>
</html>