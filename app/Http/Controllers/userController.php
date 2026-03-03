<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use App\Models\LevelModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index()
    {

        $users = UserModel::with('level')->get();
        return view('user', ['data' => $users]);
    }

    public function tambah()
    {
        $levels = LevelModel::all();
        return view('user_tambah', compact('levels'));
    }


    public function tambah_simpan(Request $request)
    {

        $request->validate([
            'username' => 'required|unique:m_user,username',
            'nama' => 'required',
            'password' => 'required|min:6',
            'level_id' => 'required|exists:m_level,level_id'
        ]);

        UserModel::create([
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => Hash::make($request->password),
            'level_id' => $request->level_id
        ]);

        return redirect('/user')->with('success', 'User berhasil ditambahkan!');
    }

    public function ubah($id)
    {
        $data = UserModel::findOrFail($id);
        $levels = LevelModel::all();
        return view('user_ubah', compact('data', 'levels'));
    }


    public function ubah_simpan($id, Request $request)
    {
        $user = UserModel::findOrFail($id);

        $request->validate([
            'username' => 'required|unique:m_user,username,' . $id . ',user_id',
            'nama' => 'required',
            'password' => 'nullable|min:6',
            'level_id' => 'required|exists:m_level,level_id'
        ]);

        $user->username = $request->username;
        $user->nama = $request->nama;

        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->level_id = $request->level_id;

        $user->save();

        return redirect('/user')->with('success', 'User berhasil diperbarui!');
    }

    public function hapus($id)
    {
        $user = UserModel::findOrFail($id);
        $user->delete();
        return redirect('/user')->with('success', 'User berhasil dihapus!');
    }
}
