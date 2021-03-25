<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Link;
use App\Http\Requests\LinkRequest;

class RssLinksController extends Controller
{
    public function index()
    {
        return view('admin.links.index')->with('links', Link::all());
    }

    public function create(Link $link)
    {
        return view('admin.links.addition')->with('link', $link);
    }

    public function store(LinkRequest $request, Link $link)
    {
        return $this->insertDataHelper($request, $link);
    }

    public function edit(Link $link)
    {
        return view('admin.links.addition')->with('link', $link);
    }

    public function update(LinkRequest $request, Link $link)
    {
        return $this->insertDataHelper($request, $link);
    }

    public function destroy(Link $link)
    {
        $link->delete();
        return redirect()->route('admin.links.index');
    }

    public function insertDataHelper($request, $link)
    {
        $request->validated();
        $link->fill($request->all())->save();
        return redirect()->route('admin.links.index');
    }
}
