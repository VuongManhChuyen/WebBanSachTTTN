<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // if(Auth::user()->role_id==2){
            $taikhoan = User::get();
            $role=Role::get();
            $taikhoan->load('role');
            return view('admin.user.list',['taikhoan'=>$taikhoan,'role'=>$role]);
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(User $user)
    {
        $role = Role::get();
        $user->load('role');
        return view('admin.user.edit', compact('user'),['role' => $role]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        // $password = $request->input('password');
        $role_id = $request->input('role_id');
       
        $user->fill([
            'name' => $name,
            'email' => $email,
            // 'password' => $password,
            'role_id' => $role_id,
        ])->save();
        return redirect()->route('user.index')
            ->with('success', 'Tai Khoan update successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index')
        ->with('success', 'Delete Tai Khoan successfully');
    }
}