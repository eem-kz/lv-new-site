<?php

namespace App\Http\Controllers\Admin;

use App\Facades\LocalizationService;
use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.book_tags.index', [
                'tag_list' => Tag::get(),
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.book_tags.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
                'tag_title' => 'required|max:255|min:3',
                'tag_slug' => ''
        ]);
        $data['tag_slug'] = LocalizationService::slugKazToLat($data['tag_title']) . '-' . Carbon::now()->format('dmyHi');
        Tag::create($data);
        return redirect()->route('admin.tag.index')->with('successMsg', 'Tag Successfully Saved');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        return view('admin.book_tags.edit', compact('tag'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        $data = $request->validate([
                'tag_title' => 'required|max:255|min:3',
        ]);

        $tag->update($data);
//        return redirect('/admin/subdivision')->with('success', 'Show is successfully saved');
        return redirect()->route('admin.tag.index')->with('successMsg', 'Tag Successfully Saved');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->back()->with('successMsg', 'Tag Successfully Delete');
    }
}
