<?php

namespace App\Http\Controllers\Admin;

use App\Blog\Article;
use App\Http\FlashMessaging\Flasher;
use App\Http\Requests\BlogFormRequest;
use App\Http\Requests\ImageUploadRequest;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class BlogController extends Controller
{

    /**
     * @var Flasher
     */
    private $flasher;

    public function __construct(Flasher $flasher)
    {
        $this->flasher = $flasher;
    }

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

    public function store(BlogFormRequest $request)
    {
        Article::createForUser($request->user(), $request->all());

        $this->flasher->success('Blog Post Created!', 'Remember to publish when ready.');

        return redirect('admin/blog');
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);

        return view('admin.blog.edit')->with(compact('article'));
    }

    public function update($id, BlogFormRequest $request)
    {
        $article = Article::findOrFail($id);

        if(Gate::denies('manage-article', $article)) {
            return abort('403');
        }

        $article->update($request->all());

        $this->flasher->success('Post Updated', 'Your changes have been saved.');

        return redirect('admin/blog');
    }

    public function togglePublished($id)
    {
        $article = Article::findOrFail($id);

        if(Gate::denies('manage-article', $article)) {
            return abort('403');
        }

        $newState = $article->togglePublishedStatus();

        return response()->json(['published' => $newState]);
    }

    public function editCoverImage($id)
    {
        $article = Article::findOrFail($id);

        return view('admin.blog.setimage')->with(compact('article'));
    }

    public function storeImage($id, ImageUploadRequest $request)
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

        $this->flasher->success('Post Deleted', 'That post has been permanently removed');

        return redirect('admin/blog');
    }
}
