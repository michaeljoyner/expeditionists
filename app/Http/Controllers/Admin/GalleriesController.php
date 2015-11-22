<?php

namespace App\Http\Controllers\Admin;

use App\Gallery;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Spatie\MediaLibrary\Media;

class GalleriesController extends Controller
{
    public function deleteImage($galleryId, $imageId)
    {
        $image = Media::findOrFail($imageId);
        $image->delete();

        return response('ok');
    }

    public function storeImage($id, Request $request)
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

        $set =  $gallery->getMedia();

        $next = $set->map(function($item) {
            return [
                'image_id' => $item->id,
                'src' => $item->getUrl(),
                'thumb_src' => $item->getUrl('thumb')
            ];
        });

        return response()->json($next);
    }
}
