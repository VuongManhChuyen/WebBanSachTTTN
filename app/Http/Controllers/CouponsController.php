<?php

namespace App\Http\Controllers;


use App\Models\Coupon;
use App\Http\Requests\CouponRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class CouponsController extends Controller
{
    /**
     * Display a listing of the resource.
     * * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->role_id==2){
            $coupon = Coupon::get();
        return view('admin.coupon.list',['coupon' => $coupon]);
        }
        else{
            return redirect()->route('login');
        }
        
    }

    /**
     * Show the form for creating a new resource.
     * 
     */
    public function create()
    {
        return view('admin.coupon.create');
    }

    /**
     * Store a newly created resource in storage.
     * 
     */
    public function store(CouponRequest $request)
    {
        $name_coupons = $request->input('name_coupons');
        $type = $request->input('type');
        $value = $request->input('value');
        $data = [
            'name_coupons' => $name_coupons,
            'type' => $type,
            'value' => $value,
        ];
        Coupon::create($data);
        
        return redirect()->route('coupon.index')
            ->with('success','Coupon has been created successfully.');
    }

    /**
     * Display the specified resource.
     * 
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Coupon $coupon)
    {
        return view('admin.coupon.edit', compact('coupon'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CouponRequest $request, Coupon $coupon)
    {
        $name_coupons = $request->input('name_coupons');
        $type = $request->input('type');
        $value = $request->input('value');
        $coupon->fill([
            'name_coupons' => $name_coupons,
            'type' => $type,
            'value' => $value,
        ])->save();
        return redirect()->route('coupon.index')
            ->with('success', 'Coupon update successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Coupon $coupon)
    {
        $coupon->delete();
        return redirect()->route('coupon.index')
        ->with('success', 'Delete Coupon successfully');
    }
}