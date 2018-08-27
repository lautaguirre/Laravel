<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Tag;
use App\Article;
use App\Image;
use App\Http\Requests\ArticleRequest;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $articles = Article::Search($request->title)->orderBy('id', 'ASC')->paginate(5);
        $articles->each(function ($articles) {
            $articles->category;
            $articles->user;
        });

        return view('admin.articles.index')->with('articles', $articles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('name', 'ASC')->pluck('name', 'id');
        $tags = Tag::orderBy('name', 'ASC')->pluck('name', 'id');

        return view('admin.articles.create')
            ->with('categories', $categories)
            ->with('tags', $tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        if ($request->file('image')) {
            $file = $request->file('image');
            $name = 'imagen_' . time() . '.' . $file->getClientOriginalExtension();

            $path = public_path() . '/images/articles/';

            $file->move($path, $name);
        }

        $article = new Article($request->all());

        $article->user_id = \Auth::user()->id;
        $article->save();

        $article->tags()->sync($request->tags);

        $image = new Image();
        $image->name = $name;
        $image->article()->associate($article);
        $image->save();

        flash('El Articulo ' . $article->title . ' ha sido creado')->success();

        return redirect()->route('articles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::find($id);

        $article->category;

        $categories = Category::orderBy('name', 'DESC')->pluck('name', 'id');
        $tags = Tag::orderBy('name', 'DESC')->pluck('name', 'id');

        $my_tags = $article->tags->pluck('id')->ToArray();

        return view('admin.articles.edit')
            ->with('categories', $categories)
            ->with('article', $article)
            ->with('tags', $tags)
            ->with('my_tags', $my_tags);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $article = Article::find($id);
        $article->fill($request->all());
        $article->save();

        $article->tags()->sync($request->tags);

        flash('Se edito el articulo ' . $article->title . ' de forma exitosa')->success();

        return redirect()->route('articles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::find($id);

        $article->delete();

        flash('Se elimino el articulo ' . $article->title . ' de forma exitosa')->error();

        return redirect()->route('articles.index');
    }
}
