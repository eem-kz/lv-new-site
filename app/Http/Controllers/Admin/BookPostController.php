<?php

namespace App\Http\Controllers\Admin;

use App\Facades\LocalizationService;
use App\Http\Controllers\Controller;
use App\Models\BookCategory;
use App\Models\BookPost;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class BookPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = BookPost::with('user')->latest()->get();
//        dd($posts);
        return view('admin.book_posts.index',
                compact('posts')
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     *
     */
    public function create()
    {
       $dh = Carbon::create(LocalizationService::convertDateToMysqlFormat(Carbon::now()));
        var_dump($dh->toDateString());
        dd(Carbon::now());
        return view('admin.book_posts.create',[
                'book_list' => BookCategory::with('children')->parent()->get(),
                'author_list'=> User::select(['id','name'])->get(),
                'delimiter' => '',

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BookPost  $bookPost
     * @return \Illuminate\Http\Response
     */
    public function show(BookPost $bookPost)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BookPost  $bookPost
     * @return \Illuminate\Http\Response
     */
    public function edit(BookPost $bookPost)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BookPost  $bookPost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BookPost $bookPost)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BookPost  $bookPost
     * @return \Illuminate\Http\Response
     */
    public function destroy(BookPost $bookPost)
    {
        //
    }
}
