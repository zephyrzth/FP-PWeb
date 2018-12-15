<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index() {
        $title = 'Selamat Datang di Toko Paling Maju';
        return view('pages.index')->with('title', $title);
    }
}
