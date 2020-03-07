<?php

namespace App\Http\Controllers\Pub;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use SlugKz;

class MainController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
//        dump(SlugKz::slugKazToLat('Жиналысқа қатысқан комиссия мүшелерінің саны'));
//        echo __("public.page_title");
//        echo '';

        return view('pub.index');
    }
}
