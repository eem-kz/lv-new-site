<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\LandingSection;
use App\Models\BookCategory;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
//        dump(SlugKz::slugKazToLat('Жиналысқа қатысқан комиссия мүшелерінің саны'));
//        echo __("public.page_title");
//        echo '';
//        $section = LandingSection::lang(app()->getLocale())->get();
        $books_names = BookCategory::lang(app()->getLocale())->parent()->get();
//        dd($section);
        return view('landing.index', compact('books_names'));
    }
}
