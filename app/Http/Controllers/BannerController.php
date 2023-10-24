<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use App\Http\Requests\BannerRequest;
use App\Http\Requests\UpdateBannerRequest;
use Illuminate\Support\Facades\Auth;
class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::user()->role_id==2){
            $banner = Banner::get();
            return view('admin.banner.list',['banner' => $banner]);
        }
        else{
            return redirect()->route('login');
        }
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $banner = Banner::get();
        return view('admin.banner.create',['banner' => $banner]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BannerRequest $request)
    {
        $name = $request->input('name');      
        $img = $request->file('img')->getClientOriginalName();
        $request->file('img')->storeAs('public/images', $img);

        $data = [
            'name' => $name,
            'img' => $img,
        ];
        Banner::create($data);
        return redirect()->route('banner.index')
        ->with('success','Banner has been created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Banner $banner)
    {
        return view('admin.banner.edit',compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBannerRequest $request, Banner $banner)
    {
        $name = $request->input('name');     
        $banner->fill([
            'name' => $name,
            ])->save();
            if ($request->file('img') !== null) {
                $img = $request->file('img')->getClientOriginalName(); //lay ten file
                $request->file('img')->storeAs('public/images', $img); //luu file vao duong dan public/images voi ten $logo
            
                $banner->fill([
                    'img' => $img,
                ])->save();
            }
            
            return redirect()->route('banner.index')
            ->with('success', 'Banner update successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Banner $banner)
    {
        $banner->delete();
        return redirect()->route('banner.index')
        ->with('success', 'Delete Banner  successfully');
    }
}