<?php

namespace App\Http\Controllers\Admin;

use App\Http\FlashMessaging\Flasher;
use App\Videos\Video;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class VideosController extends Controller
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
        $videos = Video::all();

        return view('admin.videos.index')->with(compact('videos'));
    }

    public function show($id)
    {
        $video = Video::findOrFail($id);

        return view('admin.videos.show')->with(compact('video'));
    }

    public function create()
    {
        $video = new Video();
        return view('admin.videos.create')->with(compact('video'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'source' => 'required|max:255',
        ]);

        Video::create($request->only(['title', 'source', 'description']));

        $this->flasher->success('Video Added!', 'Content is king (or queen)!');

        return redirect('admin/videos');
    }

    public function edit($id)
    {
        $video = Video::findOrFail($id);

        return view('admin.videos.edit')->with(compact('video'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'source' => 'required|max:255',
        ]);

        $video = Video::findOrFail($id);

        $video->update($request->only(['title', 'source', 'description']));

        $this->flasher->success('Done', 'The video has been updated');

        return redirect('admin/videos/' . $video->id);
    }

    public function delete(Request $request, $id)
    {
        $video = Video::findOrFail($id);

        $video->delete();

        $this->flasher->success('Success', 'The video has been deleted.');

        return redirect('admin/videos');
    }

    public function storePoster(Request $request, $id)
    {
        $this->validate($request, ['file' => 'required']);

        $poster = Video::findOrFail($id)->setPoster($request->file('file'));

        return response()->json($poster);
    }
}
