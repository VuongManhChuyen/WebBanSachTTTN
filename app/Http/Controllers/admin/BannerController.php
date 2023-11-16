<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Banner;
use App\Http\Requests\BannerRequest;
use App\Http\Requests\UpdateBannerRequest;
use Illuminate\Support\Facades\Auth;
class BannerController extends Controller
{
    public function index()
    {    if(Auth::user() && Auth::user()->role_id ==2){
            $banner = Banner::get();
            return view('admin.banner.list',['banner' => $banner]);
    }else{
        return redirect()->route('login');
    }
}
    public function create()
    {
        $banner = Banner::get();
        return view('admin.banner.create',['banner' => $banner]);
    }
    public function store(Request $request)
    {
        $img = $request->file('img')->getClientOriginalName();
        $request->file('img')->storeAs('public/images', $img);

        $data = [
            'img' => $img,
        ];
        Banner::create($data);
        return redirect()->route('banner.index')
        ->with('success','Banner has been created successfully.');

    }
    public function edit(Banner $banner)
    {
        return view('admin.banner.edit',compact('banner'));
    }
    public function update(Request $request, Banner $banner)
    {
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
    public function destroy(Banner $banner)
    {
        $banner->delete();
        return redirect()->route('banner.index')
        ->with('success', 'Delete Banner  successfully');
    }
}