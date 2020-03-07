<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

//Route::redirect('/', '/kz');
/*Route::get('lang/{locale}', function ($locale) {
    session()->put('locale', $locale);
    return redirect()->back();
});*/
//Auth::routes();


Route::group(
/*[
        'prefix' => LocalizationService::locale(),
        'middleware' => 'setLocale'

],*/
        [
                'prefix' => '{locale}',
                'where' => ['locale' => '[a-zA-Z]{2}'],
                'middleware' => 'setLocale'
        ],

        function () {

//            dd(app()->getLocale());
            Route::get('/', function () {
                return redirect(app()->getLocale());
            });
//            Route::get('/', 'IndexController@index')->name('home');
//            Route::get('/page/{id}', 'PageController@show')->name('pages.show');
            Route::get('/', 'Pub\MainController@index')->name('main');
        }
);
//Route::get('/home', 'HomeController@index')->name('home');
//Переключение языков
/*Route::get('setlocale/{lang}', function ($lang) {

    $referer = Redirect::back()->getTargetUrl();
    $parse_url = parse_url($referer, PHP_URL_PATH);

    //разбиваем на массив по разделителю
    $segments = explode('/', $parse_url);

    if (in_array($segments[1], config('app')['locales'])) {
        unset($segments[1]); //удаляем метку
    }

    if ($lang != config('app')['locale']) {
        array_splice($segments, 1, 0, $lang);
    }

    $url = Request::root() . implode("/", $segments);

    //если были еще GET-параметры - добавляем их
    if (parse_url($referer, PHP_URL_QUERY)) {
        $url = $url . '?' . parse_url($referer, PHP_URL_QUERY);
    }
    return redirect($url);

})->name('setlocale');*/