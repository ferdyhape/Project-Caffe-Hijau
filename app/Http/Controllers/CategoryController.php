<?php

namespace App\Http\Controllers;

use App\Models\item_category;
use App\Http\Requests\Storeitem_categoryRequest;
use App\Http\Requests\Updateitem_categoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.category.index', [
            "title" => "Category Management",
            'category' => item_category::all(),
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.category.create', [
            "title" => "Add Category",
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Storeitem_categoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storeitem_categoryRequest $request)
    {
        $dataNewCategory = $request->all();

        item_category::create($dataNewCategory);

        return redirect('/dashboard/category')->with('success', 'New category added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\item_category  $item_category
     * @return \Illuminate\Http\Response
     */
    public function show(item_category $item_category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\item_category  $item_category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $findCategory = item_category::find($id);
        return view('dashboard.category.edit', [
            'title' => 'Edit Category',
            'category' => $findCategory,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updateitem_categoryRequest  $request
     * @param  \App\Models\item_category  $item_category
     * @return \Illuminate\Http\Response
     */
    public function update(Updateitem_categoryRequest $request, $id)
    {
        $UpdateNewCategory = $request->all();

        $findCategory = item_category::find($id);
        $findCategory->name = $UpdateNewCategory['name'];
        $findCategory->description = $UpdateNewCategory['description'];
        $findCategory->save();

        $request->session()->flash('success', 'Category has been updated');

        return redirect('/dashboard/category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\item_category  $item_category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        item_category::destroy($id);
        return redirect('dashboard/category')->with('success', 'Data category deleted successfully');
    }
}
