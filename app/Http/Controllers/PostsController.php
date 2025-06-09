<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $postPerPage = 3; // Número de posts por página
        $pageNumber = $request->input('page', 1);
        $categories = Category::all();
        // filtra los posts por categoría si se proporciona un parámetro de categoría
        if ($request->has('category_id')) {
            $categoryId = $request->input('category_id');
            $posts = Post::where('is_published', true)
                ->where('category_id', $categoryId)
                ->latest('id')
                ->paginate($postPerPage, ['*'], 'page', $pageNumber);
        } else {
            // Si no se proporciona categoría, muestra todos los posts publicados
            $posts = Post::where('is_published', true)->latest('id')->paginate($postPerPage, ['*'], 'page', $pageNumber);
        }
        return view('posts.index', compact('posts', 'categories'));
    }

    public function myPosts(Request $request)
    {
        $postPerPage = 6; // Número de posts por página
        $pageNumber = $request->input('page', 1);
        $posts = Post::where('user_id', Auth::id())->latest('id')->paginate($postPerPage, ['*'], 'page', $pageNumber);
        $categories = Category::all();
        return view('posts.myposts', compact('posts', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category' => 'required|exists:categories,id',
            'poster' => 'nullable|url', // Optional poster image validation
        ]);

        $post = new Post();
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->category_id = $request->input('category');
        $post->poster = $request->input('poster');
        $post->user_id = Auth::id();
        $post->is_published = true; // Automatically publish the post
        $post->save();

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::all();
        return view('posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category' => 'required|exists:categories,id',
            'poster' => 'nullable|url', // Optional poster image validation
        ]);

        $post = Post::findOrFail($id);
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->category_id = $request->input('category');
        $post->poster = $request->input('poster');
        $post->save();

        return redirect()->route('posts.show', ['id' => $post->id])
            ->with('success', 'Post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
    }
}
