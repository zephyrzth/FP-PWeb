<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;

class PagesController extends Controller
{
    public function index() {
        $title = 'Selamat Datang di Toko Paling Maju';
        return view('pages.index')->with('title', $title);
    }
    
    public function buy($id)
    {
        $items = Item::find($id);

        if (auth()->user()->id == $items->user->id) {
            return view('items.edit')->with('items', $items);
        }
        
        return view('items.buy')->with('items', $items);
    }
}
