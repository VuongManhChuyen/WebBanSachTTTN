<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

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
            $role = Role::get();
            return view('admin.role.list',['role' => $role]);       
    }
    public function create()
    {
        return view('admin.role.create');
    }
    public function store(RoleRequest $request)
    {
        
        $name_role = $request->input('name_role');
       
        $data = [
            'name_role' => $name_role,
        ];
        Role::create($data);
        
        return redirect()->route('role.index')
            ->with('success','Role has been created successfully.');
    }
    public function show(string $id)
    {
        //
    }
    public function edit(Role $role)
    {
        return view('admin.role.edit', compact('role'));
    }
    public function update(RoleRequest $request, Role $role)
    {
        $name = $request->input('name_role');
       
        $role->fill([
            'name_role' => $name,
        ])->save();
        return redirect()->route('role.index')
            ->with('success', 'Role update successfully');
    }
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('role.index')
        ->with('success', 'Delete Roles successfully');
    }
}