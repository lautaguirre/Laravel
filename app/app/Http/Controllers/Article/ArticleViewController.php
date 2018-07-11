<?php

namespace App\Http\Controllers\Article;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Article;

class ArticleViewController extends Controller
{
    public function view($slug)
    {
        $article = Article::where('slug', $slug)->first();

        $article->category;
        $article->user;
        $article->tags;

        return view('article/articleView', ['article' => $article]);
    }
}

