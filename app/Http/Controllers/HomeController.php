<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $postPerPage = 12; // Número de posts por página
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
            $posts = Post::where('is_published', true)
                ->latest('id')
                ->paginate($postPerPage, ['*'], 'page', $pageNumber);
        }

        return view('home', ['posts' => $posts, 'categories' => $categories]);
    }
}
