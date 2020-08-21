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
        $book_names = BookCategory::with('posts')->lang(app()->getLocale())->get()->toTree();
        return view('books.index', compact('book_names'));
    }


    /**
     * @param $slug
     */
    public function show($lang = 'KZ', $slug)
    {
        $book = BookPost::where('slug', $slug)
                ->lang($lang)
                ->approved()
                ->published()
                ->with('bookCategory')->first();

        if (!$book) abort(404);
        views($book)->record();

//        $book->timestamps = false;
//        $book->increment('view_count');

        if (request()->ajax()) {
            return view('books.ajax_show', compact('book'));
        }

        $book_names = BookCategory::with('posts')->lang(app()->getLocale())->get()->toTree();
        return view('books.show', compact('book', 'book_names'));

    }
}
