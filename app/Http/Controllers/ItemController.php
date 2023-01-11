<?php

namespace App\Http\Controllers;

use App\Models\item;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreitemRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateitemRequest;
use App\Models\item_category;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.item.index', [
            "title" => "Item Management",
            'item' => item::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.item.create', [
            "title" => "Add Item",
            'category' => item_category::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreitemRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreitemRequest $request)
    {

        $dataNewItem = $request->all();

        if ($request->file('picture')) {
            $name_picture_path = $request->file('picture')->store('item-picture', 'public');
            $dataNewItem['picture'] = $name_picture_path;
        }

        item::create($dataNewItem);

        return redirect('/dashboard/item')->with('success', 'Data item berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(item $item)
    {
        return view('dashboard.item.edit', [
            'title' => 'Edit Item',
            'item' => $item,
            'category' => item_category::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateitemRequest  $request
     * @param  \App\Models\item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateitemRequest $request, $id)
    {
        $UpdateItem = $request->all();
        // dd($UpdateItem);
        if ($request->file('picture')) {
            if ($request->oldPicture) {
                // dd($request->oldPicture);
                File::delete('storage/' . $request->oldPicture);
            }
            $name_picture_path = $request->file('picture')->store('item-picture', 'public');
            $UpdateItem['picture'] = $name_picture_path;
        }

        $findItem = item::find($id);
        $findItem->name = $UpdateItem['name'];
        $findItem->price = $UpdateItem['price'];
        $findItem->category_id = $UpdateItem['category_id'];
        $findItem->description = $UpdateItem['description'];
        $findItem->picture = $UpdateItem['picture'];
        $findItem->save();

        $request->session()->flash('success', 'Item has been updated');

        return redirect('/dashboard/item');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(item $item)
    {
        // dd($item);
        if ($item->picture) {
            File::delete('storage/' . $item->picture);
        }

        // item::destroy($item->id);
        $item->delete();
        return redirect('dashboard/item')->with('success', 'Data item berhasil dihapus');
    }
}
