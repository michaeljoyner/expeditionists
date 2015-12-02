<?php

namespace App\Http\Controllers;

use App\Blog\Article;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    public function index()
    {
        $articles = Article::where('published', 1)->orderBy('updated_at', 'desc')->simplePaginate(10);

        return view('front.blog.index')->with(compact('articles'));
    }

    public function show($slug)
    {
        $article = Article::where('slug', $slug)->firstOrFail();

        return view('front.blog.show')->with(compact('article'));
    }
}
