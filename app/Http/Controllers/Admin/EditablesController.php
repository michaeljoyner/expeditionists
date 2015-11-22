<?php

namespace App\Http\Controllers\Admin;

use App\Content\EditableArea;
use App\Content\Page;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class EditablesController extends Controller
{
//    public function showHomePageContent()
//    {
//        $page = Page::with('editableAreas')->where('name', 'home')->firstOrFail();
//
//        return view('admin.content.showpage')->with(compact('page'));
//    }
//
//    public function showAboutPageContent()
//    {
//        $page = Page::with('editableAreas')->where('name', 'about')->firstOrFail();
//
//        return view('admin.content.showpage')->with(compact('page'));
//    }
//
//    public function showExpeditionistsPageContent()
//    {
//        $page = Page::with('editableAreas')->where('name', 'expeditionists')->firstOrFail();
//
//        return view('admin.content.showpage')->with(compact('page'));
//    }
//
//    public function showExpeditionsPageContent()
//    {
//        $page = Page::with('editableAreas')->where('name', 'expeditions')->firstOrFail();
//
//        return view('admin.content.showpage')->with(compact('page'));
//    }

    public function showEditablePage($page)
    {
        $page = Page::with('editableAreas')->where('name', $page)->firstOrFail();

        return view('admin.content.showpage')->with(compact('page'));
    }

    public function edit($id)
    {
        $editable = EditableArea::findOrFail($id);

        return view('admin.content.editable')->with(compact('editable'));
    }

    public function update($id, Request $request)
    {
        $editable = EditableArea::findOrFail($id);

        if(! $request->user()->hasRole('admin')) {
            return abort(403);
        }

        $editable->update($request->all());

        return redirect('admin/content/pages/'.$editable->page->name);
    }


}
