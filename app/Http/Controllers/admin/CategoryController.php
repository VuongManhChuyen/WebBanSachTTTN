<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;


use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class CategoryController extends Controller
{
    public function index()
    {
        // if(Auth::user()->role_id==2){
            $category = Category::get();
            return view('admin.category.list',['category' => $category]);
        
    }
    public function create()
    {
        return view('admin.category.create');
    }
    public function store(Request $request)
    {
        $name_category = $request->input('name_category');
        $data = [
            'name_category' => $name_category,
        ];
        Category::create($data);
        
        return redirect()->route('category.index')
            ->with('success','Category has been created successfully.');
    }
    public function show(string $id)
    {
        
    }
    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }
    public function update(Request $request, Category $category)
    {
        $name_category = $request->input('name_category');
        $category->fill([
            'name_category' => $name_category,
        ])->save();
        return redirect()->route('category.index')
            ->with('success', 'Category update successfully');
    }
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('category.index')
        ->with('success', 'Delete category successfully');
    }
}