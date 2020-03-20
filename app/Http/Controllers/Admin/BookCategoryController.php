<?php

namespace App\Http\Controllers\Admin;

use App\Facades\LocalizationService;
use App\Http\Controllers\Controller;
use App\Models\BookCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;


class BookCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.book_categoryes.index', [
                'books_list' => $books_names = BookCategory::with('children')->parent()->get(),
                'delimiter' => '',
                'i' => 0
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.book_categoryes.create', [
                'book' => [],
                'books_list' => BookCategory::with('children')->parent()->get(),
                'delimiter' => '',
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
                'parent_id' => 'required',
                'slug' => ''
        ]);
        $data['slug'] = LocalizationService::slugKazToLat($data['title']) . '-' . Carbon::now()->format('dmyHi');
        BookCategory::create($data);
//        return redirect('/admin/subdivision')->with('success', 'Show is successfully saved');
        return redirect()->route('admin.category.index')->with('successMsg', 'Category Successfully Saved');

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.book_categoryes.show', [
                'category' => BookCategory::find($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.book_categoryes.edit', [
                'category' => BookCategory::find($id),
                'books_list' => BookCategory::with('children')->parent()->get(),
                'delimiter' => '',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
                'title' => 'required|max:255|min:3',
                'parent_id' => 'required'
        ]);

        BookCategory::whereId($id)->update($data);
//        return redirect('/admin/subdivision')->with('success', 'Show is successfully saved');
        return redirect()->route('admin.category.index')->with('successMsg', 'Category Successfully Saved');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy($id)
    {
        BookCategory::find($id)->delete();
        return redirect()->back()->with('successMsg', 'Category Successfully Delete');
    }
}
