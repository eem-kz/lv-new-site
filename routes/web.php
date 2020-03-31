<?php

Auth::routes(['verify' => true,'register' => false]);

Route::group(
        [
                'as' => 'admin.',
                'prefix' => 'admin',
                'namespace' => 'Admin',
                'middleware' => ['verified','auth'],
        ],
        function () {
           /* Route::get('/', function () {
                return redirect('/dashboard');
            });*/
//            Route::redirect('/','/dashboard');
//            Route::get('/dashboard', 'DashboardController@index');

            Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
            Route::resource('/category', 'BookCategoryController');
            Route::resource('/book', 'BookPostController');

        }
);




Route::get('/', function () {
    return redirect(app()->getLocale());
});

Route::group(
        [
                'prefix' => '{locale}',
                'where' => ['locale' => '[a-zA-Z]{2}'],
                'middleware' => 'setLocale'
        ],
        function () {
            Route::get('/', 'Landing\LandingController@index')->name('landing');
            Route::get('/books', 'Books\BooksController@index')->name('books');
            Route::get('/book/{slug}', 'Books\BooksController@show')->name('book.detail');
        }
);






//Route::get('/bastyq/dashboard', 'Bastyq\DashboardController@index')->name('bastyq.index');
