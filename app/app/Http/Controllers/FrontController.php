<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use Carbon\Carbon;
use App\Category;
use App\Tag;

class FrontController extends Controller
{
    public function __construct()
    {
        Carbon::setLocale('es');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::orderBy('id', 'DESC')->paginate(3);

        $articles->each(function ($articles){
            $articles->category;
            $articles->images;
        });

        return view('welcome')->with('articles', $articles);
    }

    public function searchCategory($name)
    {
        $category = Category::SearchCategory($name)->first();

        $articles = $category->articles()->paginate(4);
        $articles->each(function($articles){
            $articles->category;
            $articles->images;
        });

        return view('welcome')->with('articles', $articles);
    }

    public function searchTag($name)
    {
        $tag = Tag::Search($name)->first();

        $articles = $tag->articles()->paginate(4);
        $articles->each(function($articles){
            $articles->category;
            $articles->images;
        });

        return view('welcome')->with('articles', $articles);
    }
}
