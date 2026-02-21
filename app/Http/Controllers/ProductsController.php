<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function food() {
        return view('pos.food');
    }

    public function beauty() {
        return view('pos.beauty');
    }

    public function homeCare() {
        return view('pos.homecare');
    }

    public function babyKid() {
        return view('pos.babykid');
    }
}
