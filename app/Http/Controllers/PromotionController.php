<?php

namespace App\Http\Controllers;

use App\Http\Requests\KhuyenMaiRequest;
use Illuminate\Http\Request;
use App\Models\Promotion;
use Illuminate\Support\Facades\Auth;
class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // if(Auth::user()->role_id==2){
            $promotion = Promotion::all();
            // $promotion->load('book');
            return view('admin.promotion.list',['promotion' => $promotion]);
        // }
        // else{
        //     return redirect()->route('login');
        // }
       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.promotion.create');
    }

    /**
     * Store a newly created resource in storage.
     */
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
    public function edit(Request $request)
    {
        return view('admin.Khuyenmai.edit', compact('Khuyenmai'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Promotion $promotion)
    {
        $price_promotion = $request->input('price_promotion');
        $promotion->fill([
            'price_promotion' => $price_promotion,
        ])->save();
        return redirect()->route('promotion.index')
            ->with('success', 'Khuyến Mại update successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Promotion $promotion)
    {
        $promotion->delete();
        return redirect()->route('promotion.index')
        ->with('success', 'Delete Khuyen Mai successfully');
    }
}