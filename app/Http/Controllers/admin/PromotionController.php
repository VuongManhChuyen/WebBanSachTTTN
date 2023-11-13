<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Http\Requests\KhuyenMaiRequest;
use Illuminate\Http\Request;
use App\Models\Promotion;
use Illuminate\Support\Facades\Auth;
class PromotionController extends Controller
{
    public function index()
    {
            $promotion = Promotion::all();
            return view('admin.promotion.list',['promotion' => $promotion]);
       
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
            ->with('success','Promotion has been created successfully.');
    }
    public function show(string $id)
    {
        //
    }

    public function edit(Request $request)
    {
        return view('admin.Khuyenmai.edit', compact('Khuyenmai'));
    }
    public function update(Request $request, Promotion $promotion)
    {
        $price_promotion = $request->input('price_promotion');
        $promotion->fill([
            'price_promotion' => $price_promotion,
        ])->save();
        return redirect()->route('promotion.index')
            ->with('success', 'Khuyến Mại update successfully');
    }
    public function destroy(Promotion $promotion)
    {
        $promotion->delete();
        return redirect()->route('promotion.index')
        ->with('success', 'Delete Khuyen Mai successfully');
    }
}