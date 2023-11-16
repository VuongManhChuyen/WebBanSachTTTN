<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Promotion;
use Illuminate\Support\Facades\Auth;
class PromotionController extends Controller
{
    public function index()
    {   if(Auth::user() && Auth::user()->role_id ==2){
            $promotion = Promotion::all();
            return view('admin.promotion.list',['promotion' => $promotion]);
    }else{
        return redirect()->route('login');
    }
    }
    public function create()
    {
        return view('admin.promotion.create');
    }
    public function store(Request $request)
    {
        $promotion = $request->input('price_promotion');
        $data = [
            'price_promotion' => $promotion,
        ];
        Promotion::create($data);
        
        return redirect()->route('promotion.index')
            ->with('success','Created successfully.');
    }
    public function show(string $id)
    {
        //
    }

    public function edit(Promotion $promotion)
    {
        return view('admin.promotion.edit', compact('promotion'));
    }
    public function update(Request $request, Promotion $promotion)
    {
        $price_promotion = $request->input('price_promotion');
        $promotion->fill([
            'price_promotion' => $price_promotion,
        ])->save();
        return redirect()->route('promotion.index')
            ->with('success', 'update successfully');
    }
    public function destroy(Promotion $promotion)
    {
        $promotion->delete();
        return redirect()->route('promotion.index')
        ->with('success', 'Delete  successfully');
    }
}