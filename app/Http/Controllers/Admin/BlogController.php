<?php

namespace App\Http\Controllers\Admin;

use App\Blog\Article;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class BlogController extends Controller
{
    public function index()
    {
        $articles = Article::orderBy('published_on', 'desc')->orderBy('created_at', 'desc')->paginate(10);

        return view('admin.blog.index')->with(compact('articles'));
    }

    public function create()
    {
        $article = new Article();
        return view('admin.blog.create')->with(compact('article'));
    }

    public function store(Request $request)
    {
        $article = Article::createForUser($request->user(), $request->all());

        return redirect('admin/blog');
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);

        return view('admin.blog.edit')->with(compact('article'));
    }

    public function update($id, Request $request)
    {
        $article = Article::findOrFail($id);

        if(Gate::denies('manage-article', $article)) {
            return abort('403');
        }

        $article->update($request->all());

        return redirect('admin/blog');
    }

    public function togglePublished($id, Request $request)
    {
        $article = Article::findOrFail($id);
        $newState = $article->togglePublishedStatus();

        return response()->json(['published' => $newState]);
    }

    public function editCoverImage($id)
    {
        $article = Article::findOrFail($id);

        return view('admin.blog.setimage')->with(compact('article'));
    }

    public function storeImage($id, Request $request)
    {
        $article = Article::findOrFail($id);

        $image = $article->setCoverImage($request->file('file'));

        return response()->json($image);
    }

    public function delete($id)
    {
        $article = Article::findOrFail($id);

        if(Gate::denies('manage-article', $article)) {
            return abort('403');
        }

        $article->delete();

        return redirect('admin/blog');
    }
}
