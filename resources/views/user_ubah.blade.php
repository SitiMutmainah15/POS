<body>
    <h1>Form Ubah Data User</h1>

    <form method="post" action="{{ url('user/ubah_simpan/'.$data->user_id) }}">
        @csrf
        @method('PUT') <!-- memberitahu Laravel pakai PUT -->

        <label>Username</label>
        <input type="text" name="username" value="{{ $data->username }}">
        <br>

        <label>Nama</label>
        <input type="text" name="nama" value="{{ $data->nama }}">
        <br>

        <label>Password</label>
        <input type="password" name="password" placeholder="Kosongkan jika tidak diubah">
        <br>

        <label>Level ID</label>
        <input type="number" name="level_id" value="{{ $data->level_id }}">
        <br>

        <input type="submit" value="Simpan Perubahan">
    </form>
</body>