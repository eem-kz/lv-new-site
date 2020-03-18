<?php

namespace App\Http\Controllers\Books;

use App\Http\Controllers\Controller;
use App\Models\BookCategory;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function index(){
//        dd(__METHOD__);
        $books_names = BookCategory::with('children')->parent()->lang(app()->getLocale())->get();
        return view('books.index',compact('books_names'));
    }
}
