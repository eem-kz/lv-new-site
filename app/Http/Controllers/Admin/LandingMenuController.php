<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LandingLanguages;
use App\Models\LandingMenu;
use Illuminate\Http\Request;

class LandingMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.menu.index', [
                'menu_list' => LandingMenu::with('languages')->get(),
                'lang_list' => LandingLanguages::get(),

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.menu.create', [
                'lang_list' => LandingLanguages::get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
                'title' => 'required|max:255|min:3',
                'link' => 'required|max:255|min:3',
                'lang_id' => ''
        ]);
//        dd($data);
//        $data['tag_slug'] = LocalizationService::slugKazToLat($data['tag_title']) . '-' . Carbon::now()->format('dmyHi');
        LandingMenu::create($data);
        return redirect()->route('admin.menu.index')->with('successMsg', 'Menu successfully saved');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LandingMenu $landingMenu
     * @return \Illuminate\Http\Response
     */
    public function show(LandingMenu $landingMenu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LandingMenu $landingMenu
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.menu.edit', [
                'link' => LandingMenu::find($id),
                'lang_list' => LandingLanguages::get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\LandingMenu $landingMenu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
                'title' => 'required|max:255|min:3',
                'link' => 'required|max:255|min:3',
                'lang_id' => ''
        ]);
//        dd($data);
//        $data['tag_slug'] = LocalizationService::slugKazToLat($data['tag_title']) . '-' . Carbon::now()->format('dmyHi');
        LandingMenu::whereId($id)->update($data);
        return redirect()->route('admin.menu.index')->with('successMsg', 'Menu successfully saved');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LandingMenu $landingMenu
     * @return \Illuminate\Http\Response
     */
    public function destroy(LandingMenu $landingMenu)
    {
        //
    }
}
