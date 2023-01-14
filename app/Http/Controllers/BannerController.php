<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use App\Models\Banner;
use App\Http\Requests\StoreBannerRequest;
use App\Http\Requests\UpdateBannerRequest;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin-side.dashboard.banner.index', [
            "title" => "Banner Management",
            'banner' => Banner::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin-side.dashboard.banner.create', [
            "title" => "Add banner",
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorebannerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBannerRequest $request)
    {
        $dataNewbanner = $request->all();
        $dataNewbanner['fzAttention'] = (is_null($dataNewbanner['fzAttention'])) ? 35 : $dataNewbanner['fzAttention'];
        $dataNewbanner['fzOffer'] = (is_null($dataNewbanner['fzOffer'])) ? 40 : $dataNewbanner['fzOffer'];
        // dd($dataNewbanner);
        $name_picture_path = $request->file('picture')->store('banner-picture', 'public');
        $dataNewbanner['picture'] = $name_picture_path;
        Banner::create($dataNewbanner);

        return redirect('/dashboard/banner')->with('success', 'Data banner berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        return view('admin-side.dashboard.banner.edit', [
            'title' => 'Edit banner',
            'banner' => $banner,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatebannerRequest  $request
     * @param  \App\Models\banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBannerRequest $request, $id)
    {
        $Updatebanner = $request->all();
        $Updatebanner['fzAttention'] = (is_null($Updatebanner['fzAttention'])) ? 35 : $Updatebanner['fzAttention'];
        $Updatebanner['fzOffer'] = (is_null($Updatebanner['fzOffer'])) ? 40 : $Updatebanner['fzOffer'];
        if ($request->file('picture')) {
            if ($request->oldPicture) {
                File::delete('storage/' . $request->oldPicture);
            }
            $name_picture_path = $request->file('picture')->store('banner-picture', 'public');
            $Updatebanner['picture'] = $name_picture_path;
        } else {
            $Updatebanner['picture'] = $request->oldPicture;
        }
        // dd($Updatebanner);
        $findbanner = banner::find($id);
        $findbanner->name = $Updatebanner['name'];
        $findbanner->attention = $Updatebanner['attention'];
        $findbanner->fzAttention = $Updatebanner['fzAttention'];
        $findbanner->offer = $Updatebanner['offer'];
        $findbanner->fzOffer = $Updatebanner['fzOffer'];
        $findbanner->picture = $Updatebanner['picture'];
        $findbanner->save();

        $request->session()->flash('success', 'banner has been updated');

        return redirect('/dashboard/banner');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        if ($banner->picture) {
            File::delete('storage/' . $banner->picture);
        }

        $banner->delete();
        return redirect('dashboard/banner')->with('success', 'Data banner berhasil dihapus');
    }
}
