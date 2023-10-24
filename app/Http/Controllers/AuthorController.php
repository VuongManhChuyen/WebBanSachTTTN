<?php

namespace App\Http\Controllers;


use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     * * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // if(Auth::user()->role_id==2){
            $author = Author::get();
            return view('admin.author.list',['author' => $author]);
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
        return view('admin.author.create');
    }

    /**
     * Store a newly created resource in storage.
     * 
     */
    public function store(Request $request)
    {
        $name_author = $request->input('name_author');
        $data = [
            'name_author' => $name_author,
        ];
        Author::create($data);
        
        return redirect()->route('author.index')
            ->with('success','author has been created successfully.');
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
    public function edit(Author $category)
    {
        return view('admin.author.edit', compact('author'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Author $author)
    {
        $name_author = $request->input('name_author');
        $author->fill([
            'name_category' => $name_author,
        ])->save();
        return redirect()->route('author.index')
            ->with('success', 'author update successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
        $author->delete();
        return redirect()->route('author.index')
        ->with('success', 'Delete author successfully');
    }
}