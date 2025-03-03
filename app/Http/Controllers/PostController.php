<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use Cviebrock\EloquentSluggable\Services\SlugService;

class PostController extends Controller
{
    public function index()
    {
        return view('mypost.index', [
            'title' => 'My Post',
            'posts' => Post::where('author_id', auth()->id())->latest()->paginate(5)
        ]);
    }
    
    public function create()
    {
        $categories = Category::all();
        return view('mypost.create', compact('categories'), [
            'title' => 'Create Post',
        ]);
    }

    public function store(Request $request)
    {   

        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:posts',
            'category_id' => 'required',
            'body' => 'required' 
        ]);

        $validatedData['author_id'] = auth()->user()->id;

        Post::create($validatedData);
        return redirect('/mypost')->with('success', 'You have created a new post!');
    }

    public function show(Post $post)
    {
        return view ('mypost.show', [
            'title' => 'Detail Post', 
            'post' => $post
        ]);   
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('mypost.edit', compact('categories'), [
            'title' => 'Edit Post',
            'post' => $post,
        ]);
    }

    public function update(Request $request, Post $post)
    {
        $rules = [
            'title' => 'required|max:255',
            'category_id' => 'required',
            'body' => 'required' 
        ];

        if ($request->slug != $post->slug){
            $rules['slug'] = 'required|unique:posts'; 
        }

        $validatedData = $request->validate($rules);

        $validatedData['author_id'] = auth()->user()->id;

        Post::where('id', $post->id)->update($validatedData);
        return redirect('/mypost')->with('success', 'Post updated successfully');
    }

    public function destroy(Post $post)
    {
        Post::destroy($post->id);
        return redirect('/mypost')->with('success', 'Post has been deleted');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }

}
