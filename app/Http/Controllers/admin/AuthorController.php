<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AuthorController extends Controller
{
    public function index()
    {
        if(Auth::user() && Auth::user()->role_id ==2){
            $author = Author::get();
            return view('admin.author.list',['author' => $author]);
        }else{
            return redirect()->route('login');
        }
        
    }
    public function create()
    {
        return view('admin.author.create');
    }

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
    public function show(string $id)
    {
        
    }

    public function edit(Author $author)
    {
        return view('admin.author.edit', compact('author'));
    }

    public function update(Request $request, Author $author)
    {
        $name_author = $request->input('name_author');
        $author->fill([
            'name_author' => $name_author,
        ])->save();
        return redirect()->route('author.index')
            ->with('success', 'author update successfully');
    }

    public function destroy(Author $author)
    {
        $author->delete();
        return redirect()->route('author.index')
        ->with('success', 'Delete author successfully');
    }
}