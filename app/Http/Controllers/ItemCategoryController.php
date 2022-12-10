<?php

namespace App\Http\Controllers;

use App\Models\item_category;
use App\Http\Requests\Storeitem_categoryRequest;
use App\Http\Requests\Updateitem_categoryRequest;

class ItemCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Storeitem_categoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storeitem_categoryRequest $request)
    {
        //
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
    public function edit(item_category $item_category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updateitem_categoryRequest  $request
     * @param  \App\Models\item_category  $item_category
     * @return \Illuminate\Http\Response
     */
    public function update(Updateitem_categoryRequest $request, item_category $item_category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\item_category  $item_category
     * @return \Illuminate\Http\Response
     */
    public function destroy(item_category $item_category)
    {
        //
    }
}
