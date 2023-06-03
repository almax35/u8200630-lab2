<?php

namespace App\Http\Controllers;
use App\Models\Tag;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ArticleController extends Controller
{
    // ArticleController.php

public function index(Request $request)
{
    $slug = $request->input('slug');
    $title = $request->input('title');
    $tag = $request->input('tag');

    try {
        $query = Article::query();
        // Фильтр по символьному коду
        if ($slug) {
            $query->where('slug', $slug);
        }
        // Фильтрация по названию
        if ($title) {
            $query->where('title', 'like', '%' . $title . '%');
        }
        // Фильтр по тегу
        if ($tag) {
            $query->whereHas('tags', function ($q) use ($tag) {
                $q->where('name', $tag);
            });
        }
        $articles = $query->paginate(10);
        $tags = Tag::orderBy('name')->get();
        return view('articles.index', ['articles' => $articles, 'tags' => $tags]);
    } catch (ModelNotFoundException $e) {
        abort(404);
    }

    if ($articles->isEmpty()) {
        abort(404);
    }
}
}