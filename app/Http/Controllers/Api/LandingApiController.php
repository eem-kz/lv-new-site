<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BookCategory;
use App\Models\BookPost;
use App\Models\LandingLanguages;
use App\Models\LandingMenu;
use Illuminate\Http\Request;

class LandingApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getMenuList($lang = 'KZ')
    {

        $languages = LandingLanguages::with('menu', 'text')->where('name', $lang)->get();
        if (empty($languages->toArray())) {
            return response()->json(null, 404);

        }


        if ($languages !== null) {
//            return response()->json(LandingMenu::lang($lang)->active()->select('id','title','link')->get(),200);
            $menu['menu'] = $languages[0]->menu;
            $menu['text'] = $this->convertArray($languages[0]->text, 'slug', true);
            $menu['books'] = BookCategory::whereNull('parent_id')->select('id', 'parent_id', 'title', 'slug')->get();
            $menu['posts'] = BookPost::select('post_title', 'slug', 'view_count')->orderByDesc('view_count')->limit(10)->get();

//            return $menu;
            return response()->json($menu, 200);
        }
        return response()->json(null, 404);
    }


    /**
     * @param string $lang
     * @return \Illuminate\Http\JsonResponse
     */
    public function getSectionText($lang)
    {

        $text = LandingLanguages::where('name', $lang)->with('text')->get();


        if ($text !== null) {
//            return response()->json(LandingMenu::lang($lang)->active()->select('id','title','link')->get(),200);
//            $menu = $text[0]->text->toArray();
//            return response()->json($text[0]['text']);
//            $data[] = $this->convertArray($text[0]['text'], 'slug', true);
//           return $data;
            return response()->json($this->convertArray($text[0]['text'], 'slug', true), 200);

        }
        return response()->json(null, 404);

    }


    /**
     * @param $array
     * @param $k
     * @param bool $unset
     * @return array
     */
    protected function convertArray($array, $k, $unset = false)
    {
        $converted = array();   // declaring some clean array, just to be sure

        foreach ($array as $row) {
            $converted[$row[$k]] = $row;        // entire row (for example $response[1]) is copied
            if ($unset)
                unset($converted[$row[$k]][$k]);  // deleting element with key 'id' as we don't need it anymore inside
        }
        return $converted;
    }


}
