<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class userController extends Controller
{
    public function profile($id, $name) {
        return view('pos.user', ['id' => $id, 'name' => $name]);
    }
}
