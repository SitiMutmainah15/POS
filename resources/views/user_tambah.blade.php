<body>
    <h1>Form Tambah Data User</h1>

    <form action="{{ url('/user/tambah_simpan') }}" method="POST">
    @csrf

        <label>Username</label>
        <input type="text" name="username" placeholder="Masukan Username">
        <br>

        <label>Nama</label>
        <input type="text" name="nama" placeholder="Masukan Nama">
        <br>

        <label>Password</label>
        <input type="password" name="password" placeholder="Masukan Password">
        <br>

        <label>Level ID</label>
        <input type="number" name="level_id" placeholder="Masukan ID Level">
        <br>

        <input type="submit" class="btn btn-success" value="Simpan">
    </form>
</body>