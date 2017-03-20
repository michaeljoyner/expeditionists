<?php

namespace App\Http\Controllers\Admin;

use App\Blog\ImageGallery;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BlogImagesController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, ['file' => 'required|image']);

        $image = ImageGallery::addImage($request->file('file'));

        return response()->json(['location' => $image->getUrl('web')]);
    }
}
