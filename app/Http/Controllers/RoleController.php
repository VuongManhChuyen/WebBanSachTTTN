<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Http\Requests\RoleRequest;
use Illuminate\Support\Facades\Auth;
class RoleController extends Controller

{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::user()->role_id==2){
            $role = Role::get();
            return view('admin.role.list',['role' => $role]);
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
        return view('admin.role.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleRequest $request)
    {
        
        $name = $request->input('name');
        $display_name = $request->input('display_name');
       
        $data = [
            'name' => $name,
            'display_name' => $display_name,
        ];
        Role::create($data);
        
        return redirect()->route('role.index')
            ->with('success','Role has been created successfully.');
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
    public function edit(Role $role)
    {
        return view('admin.role.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoleRequest $request, Role $role)
    {
        $name = $request->input('name');
        $display_name = $request->input('display_name');
       
        $role->fill([
            'name' => $name,
            'display_name' => $display_name,
        ])->save();
        return redirect()->route('role.index')
            ->with('success', 'Role update successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('role.index')
        ->with('success', 'Delete Roles successfully');
    }
}