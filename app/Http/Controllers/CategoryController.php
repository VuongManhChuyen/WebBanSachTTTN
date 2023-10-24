<?php

namespace App\Http\Controllers;


use App\Models\Category;
// use App\Http\Requests\StoreCategoryRequest;
// use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // if(Auth::user()->role_id==2){
            $category = Category::get();
            return view('admin.category.list',['category' => $category]);
        // }
        // else{
        //     return redirect()->route('login');
        // }
        
    }

    /**
     * Show the form for creating a new resource.
     * 
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     * 
     */
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
    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $name_category = $request->input('name_category');
        $category->fill([
            'name_category' => $name_category,
        ])->save();
        return redirect()->route('category.index')
            ->with('success', 'Category update successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('category.index')
        ->with('success', 'Delete category successfully');
    }
}