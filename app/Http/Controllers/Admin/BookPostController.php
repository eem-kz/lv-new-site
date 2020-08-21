<?php

namespace App\Http\Controllers\Admin;

use App\Facades\LocalizationService;
use App\Http\Controllers\Controller;
use App\Models\BookCategory;
use App\Models\BookPost;
use App\Models\Tag;
use App\User;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class BookPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function index(Request $request)
    {
//        DB::enableQueryLog();
//        dd(DB::getQueryLog()); // Show results of log

//        dd(BookPost::latest()->with(['user', 'bookCategory'])->get());
        if ($request->ajax()) {
//            $posts = BookPost::latest()->with(['user', 'bookCategory'])->get();

//            $posts = BookPost::latest()->get();
//            dd(DB::getQueryLog()); // Show results of log
            return DataTables::of(BookPost::latest()->with(['user', 'bookCategory']))
                    ->addColumn('post_content', function (BookPost $post) {
                        return Str::words($post->post_content, 500);
                    })
                    ->addColumn('action', function (BookPost $post) {
                        $button = '<a href="' . route("admin.book.edit", $post) . '" class="btn btn-info waves-effect"> <i class="fas fa-edit"></i></a>';
                        $button .= '&nbsp;&nbsp;&nbsp;<button class="btn btn-danger waves-effect" type="button" onclick="if(confirm(\'Are you sure? You want to delete this?\')){
                                              event.preventDefault();
                                              document.getElementById("delete-form-' . $post->id . '").submit();
                                              } else {
                                              event.preventDefault();
                                              }">
                                          <i class=\'fas fa-trash-alt\'></i>
                                      </button>
                                      <form id="delete-form-' . $post->id . '" action="' . route("admin.book.destroy", $post->id) . '" method="POST" style="display: none;">
                                          <input type="hidden" name="_token" value="' . csrf_token() . '" />
                                          <input type="hidden" name="_method" value="PUT">
                                      </form>';
                        return $button;
                    })
                    ->addColumn('category', function (BookPost $post) {
                        if ($post->bookCategory->parent_id):
                            return $post->bookCategory->parentOnChild->title . '<br>' . $post->bookCategory->title;
                        else:
                            return $post->bookCategory->title;
                        endif;
//                        $lm = BookCategory::find($post->bookCategory->parent_id);
//                            return $lm->title.'<br>'.$post->bookCategory->title;
                    })
                    ->addColumn('post_modified', function (BookPost $post) {
                        return LocalizationService::reverseConvertDate($post->post_modified) . 'ж.';
                    })
                    ->addColumn('is_approved', function (BookPost $post) {
                        if ($post->is_approved == true):
                            $html = '<span class="badge bg-success">Тексерілген</span>';
                        else:
                            $html = '<span class="badge bg-pink">Жоқ</span>';
                        endif;
                        return $html;
                    })
                    ->addColumn('post_status', function (BookPost $post) {

                        if ($post->post_status == true):
                            return '<span class="badge bg-success" > Жарияланған</span >';
                        else:
                            return '<span class="badge bg-pink" > Жоқ</span >';
                        endif;
                    })
                    ->rawColumns(['category', 'action', 'is_approved', 'post_status', 'post_content'])
//                    ->toJson();
                    ->make(true);
        }
        return view('admin.book_posts.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

//       $dh = Carbon::create(LocalizationService::convertDateToMysqlFormat(Carbon::now()));
//        var_dump($dh->toDateString());
//        dd(Carbon::now());
        return view('admin.book_posts.create', [
                'book_list' => BookCategory::with('children')->parent()->get(),
                'author_list' => User::select(['id', 'name'])->get(),
                'tags' => Tag::select('id', 'tag_title')->get(),
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
//        dd($request);

        $data = $request->validate([
                'post_title' => 'required|max:255|min:3',
                'post_content' => 'required|min:3',
                'post_author' => '',
                'book_category_id' => '',
                'post_modified' => '',
                'post_status' => '',
                'is_approved' => '',
        ]);

        $post = new BookPost();
        $post->post_title = $request->post_title;
        $post->post_content = $request->post_content;
        $post->post_author = $request->post_author;
        $post->book_category_id = $request->book_category_id;
        $post->post_status = isset($request->post_status) ? 1 : 0;
        $post->is_approved = isset($request->is_approved) ? 1 : 0;
        $post->post_modified = LocalizationService::convertDateToMysqlFormat($request->post_modified);
        $post->slug = LocalizationService::slugKazToLat($data['post_title']) . '-' . Carbon::now()->format('dmyHi');
        $post->save();

//        BookPost::create($data);
        $post->tags()->attach($request->tags);
//        return redirect('/admin/subdivision')->with('success', 'Show is successfully saved');
//        dd($data);
        return redirect()->route('admin.book.index')->with('successMsg', 'Post Successfully Saved');

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = BookPost::find($id);
        $book['post_modified'] = LocalizationService::reverseConvertDate($book['post_modified']);
//        dd($bookPost);
        return view('admin.book_posts.edit', [
                'book' => $book,
                'book_list' => BookCategory::with('children')->parent()->get(),
                'author_list' => User::select(['id', 'name'])->get(),
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
                'post_title' => 'required|max:255|min:3',
                'post_content' => 'required|min:3',
                'post_author' => '',
                'book_category_id' => '',
                'post_modified' => '',
                'post_status' => '',
                'is_approved' => '',
        ]);

        $data['post_status'] = isset($request->post_status) ? 1 : 0;
        $data['is_approved'] = isset($request->is_approved) ? 1 : 0;
        $data['post_modified'] = LocalizationService::convertDateToMysqlFormat($request->post_modified);
        $data['slug'] = LocalizationService::slugKazToLat($data['post_title']) . '-' . Carbon::now()->format('dmyHi');
        BookPost::whereId($id)->update($data);

//        return redirect('/admin/subdivision')->with('success', 'Show is successfully saved');
//        dd($data);
        return redirect()->route('admin.book.index')->with('successMsg', 'Post Successfully Saved');
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
        BookPost::find($id)->delete();
        return redirect()->back()->with('successMsg', 'Book Successfully Delete');
    }
}
