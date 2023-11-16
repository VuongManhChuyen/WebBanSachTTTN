<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
       if(Auth::user() && Auth::user()->role_id ==2){
        return view('admin.layout');
        }
        else{
            return redirect()->route('login');
        }
}
}