<?php

namespace App\Http\Controllers\Admin;

use App\FileResource;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class FileResourcesController extends Controller
{
    public function index()
    {
        $files = FileResource::all();

        return view('admin.fileresources.index')->with(compact('files'));
    }

    public function storeFile(Request $request, $resourceId)
    {
        $this->validate($request, [
            'file' => 'required|mimes:pdf'
        ]);

        FileResource::findOrFail($resourceId)->setFile($request->file('file'));

        return response()->json('ok');
    }
}
