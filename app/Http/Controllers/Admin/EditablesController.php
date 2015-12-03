<?php

namespace App\Http\Controllers\Admin;

use App\Content\EditableArea;
use App\Content\Page;
use App\Http\Requests\EditableContentFormRequest;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class EditablesController extends Controller
{
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

    public function update($id, EditableContentFormRequest $request)
    {
        $editable = EditableArea::findOrFail($id);

        $editable->update($request->all());

        return redirect('admin/content/pages/'.$editable->page->name);
    }


}
