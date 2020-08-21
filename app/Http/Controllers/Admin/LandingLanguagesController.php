<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LandingLanguages;
use Illuminate\Http\Request;
use App\Facades\LocalizationService;

class LandingLanguagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.landing_languages.index',[
                'lang_list'=>LandingLanguages::get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.landing_languages.create');
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
                'name' => 'required|max:2|min:2',
                'description' => 'required',
                'slug' => ''
        ]);
        $data['slug'] = LocalizationService::slugKazToLat($data['name']);
        LandingLanguages::create($data);
//        return redirect('/admin/subdivision')->with('success', 'Show is successfully saved');
        return redirect()->route('admin.languages.index')->with('successMsg', 'Language Successfully Saved');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LandingLanguages  $landingLanguages
     * @return \Illuminate\Http\Response
     */
    public function show(LandingLanguages $landingLanguages)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LandingLanguages  $landingLanguages
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $language = LandingLanguages::find($id);
        return view('admin.landing_languages.edit', compact('language'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LandingLanguages  $landingLanguages
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
                'name' => 'required|max:2|min:2',
                'description' => 'required',
                'slug' => ''
        ]);
        $data['slug'] = LocalizationService::slugKazToLat($data['name']);
        LandingLanguages::whereId($id)->update($data);
//        return redirect('/admin/subdivision')->with('success', 'Show is successfully saved');
        return redirect()->route('admin.languages.index')->with('successMsg', 'Language successfully saved');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LandingLanguages  $landingLanguages
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
//        dd($landingLanguages);
        LandingLanguages::find($id)->delete();
        return redirect()->back()->with('successMsg', 'Language successfully delete');

    }
}
