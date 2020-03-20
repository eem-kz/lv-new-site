<?php

namespace App\Http\Controllers\Books;

use App\Http\Controllers\Controller;
use App\Models\BookCategory;
use App\Models\BookPost;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
//        dd(__METHOD__);
        $books_names = BookCategory::with('children', 'posts')->parent()->lang(app()->getLocale())->get();
//        $posts = BookCategory::with('children','posts')->noParent()->get();

//        dd($posts);
        return view('books.index', compact('books_names'));
    }


    /**
     * @param $slug
     */
    public function show($lang = 'KZ', $slug)
    {
        $book = BookPost::where('slug', $slug)->with('bookCategory')->first();
        if (!$book) abort(404);
        if (request()->ajax()) {
            return view('books.ajax_show', compact('book'));
        }else{
            $books_names = BookCategory::with('children', 'posts')->parent()->lang(app()->getLocale())->get();

            return view('books.show', compact('book','books_names'));
        }

//        dd($book);
    }
}
