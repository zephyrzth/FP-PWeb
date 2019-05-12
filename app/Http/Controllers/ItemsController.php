<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Item;
use DB;

class ItemsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::orderBy('created_at', 'desc')->paginate(6);
        return view('items.index')->with('items', $items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('items.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);

        // Handling File Upload
        if ($request->hasFile('cover_image')) {
            // Get filename with extension
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
            // Get just filename
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
            // Upload Image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        // Create Item
        $items = new Item;
        $items->name = $request->input('name');
        $items->description = $request->input('description');
        $items->price = $request->input('price');
        $items->user_id = auth()->user()->id;
        $items->cover_image = $fileNameToStore;
        $items->save();

        return redirect('/items')->with('success', 'Items Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $items = Item::find($id);
        return view('items.show')->with('items', $items);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $items = Item::find($id);

        // Check for correct user
        if (auth()->user()->id !== $items->user->id) {
            return redirect('/items')->with('error', 'Unauthorized Page');
        }
        return view('items.edit')->with('items', $items);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);

        // Handling File Upload
        if ($request->hasFile('cover_image')) {
            // Get filename with extension
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
            // Get just filename
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
            // Upload Image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        }

        // Create Item
        $items = Item::find($id);
        $items->name = $request->input('name');
        $items->description = $request->input('description');
        $items->price = $request->input('price');
        if ($request->hasFile('cover_image')) {
            Storage::delete('public/cover_images/' . $items->cover_image);
            $items->cover_image = $fileNameToStore;
        }
        $items->save();

        return redirect('/items')->with('success', 'Item Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $items = Item::find($id);

        // Check for correct user
        if (auth()->user()->id !== $items->user->id) {
            return redirect('/items')->with('error', 'Unauthorized Page');
        }

        if ($items->cover_image != 'noimage.jpg') {
            Storage::delete('public/cover_images/' . $items->cover_image);
        }

        $items->delete();
        return redirect('/items')->with('success', 'Item Removed');
    }

}
