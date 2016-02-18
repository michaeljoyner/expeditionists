<?php

namespace App\Http\Controllers\Admin;

use App\Gallery;
use App\Http\Requests\ImageUploadRequest;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Spatie\MediaLibrary\Media;

class GalleriesController extends Controller
{

    public function showOrder($id)
    {
        $gallery = Gallery::findOrFail($id);
        $images = $gallery->getOrdered();

        return view('admin.galleries.order')->with(compact('gallery', 'images'));
    }

    public function postOrder(Request $request, $id)
    {
        $this->validate($request, ['order' => 'required|array']);
        $gallery = Gallery::findOrFail($id);
        $gallery->setOrder($request->order);

        return response()->json('ok');

    }

    public function deleteImage($galleryId, $imageId)
    {
        $image = Media::findOrFail($imageId);
        $image->delete();

        return response('ok');
    }

    public function storeImage($id, ImageUploadRequest $request)
    {
        $gallery = Gallery::findOrFail($id);

        $image = $gallery->addImage($request->file('file'));

        return response()->json([
            'image_id' => $image->id,
            'src' => $image->getUrl(),
            'thumb_src' => $image->getUrl('thumb')
        ]);
    }

    public function getGalleryImages($galleryId)
    {
        $gallery = Gallery::findOrFail($galleryId);

        $set =  $gallery->getOrdered()->map(function($item) {
            return [
                'image_id' => $item->id,
                'src' => $item->getUrl(),
                'thumb_src' => $item->getUrl('thumb')
            ];
        });

        return response()->json($set);
    }
}
