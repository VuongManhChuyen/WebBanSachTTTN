<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class StatusController extends Controller
{

    public function index()
    {
        if(Auth::user() && Auth::user()->role_id ==2){
        $status = Status::get();
        return view('admin.status.list',['status' => $status]);
        }else{
            return redirect()->route('login');
        }
    }

    public function create()
    {
        return view('admin.status.create');
    }

    public function store(Request $request)
    {
        
        $name_status = $request->input('name_status');
       
        $data = [
            'name_status' => $name_status,
        ];
        Status::create($data);
        
        return redirect()->route('status.index')
            ->with('success','Status has been created successfully.');
    }

    public function show(string $id)
    {
        //
    }
    public function edit(Status $status)
    {
        return view('admin.status.edit', compact('status'));
    }
    public function update(Request $request, Status $status)
    {
        $name_status = $request->input('name_status');
       
        $status->fill([
            'name_status' => $name_status,
        ])->save();
        return redirect()->route('status.index')
            ->with('success', 'status update successfully');
    }
    public function destroy(Status $status)
    {
        $status->delete();
        return redirect()->route('status.index')
        ->with('success', 'Delete Status successfully');
    }
}