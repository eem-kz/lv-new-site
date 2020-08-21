<div class="row">
    <div class="col-lg-8">
        <div class="form-group">
            <label for="post_title">Мақала тақырыбы</label>
            <input type="text" class="form-control" id="post_title" name="post_title" placeholder="Тақырыбы..."
                   value="{{ $book->post_title ?? '' }}" autofocus>
        </div>

        <div class="form-group">
            <label for="post_content">Контент</label>
            <textarea style="width: 100%; resize: none;" name="post_content" id="post_content"
                      rows="10">{{ $book->post_content ?? '' }}</textarea>
        </div>

    </div>
    <div class="col-lg-4">
        <div class="form-group">
            <label for="book_category_id">Кітап (бөлім) атауы</label>
            <select name="book_category_id" id="book_category_id" class="form-control custom-select"
                    style="width: 100%;">
                @include('admin.book_posts.partials.book_category',[ 'books_list' => $book_list, 'dd' => 0, 'book'=>$book ?? null ])
            </select>
        </div>

        <div class="form-group">
            <label for="datepicker">Салынған күн</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="far fa-calendar-alt"></i>
                    </span>
                </div>
                <input name="post_modified" type="text" class="form-control float-right" id="datepicker"
                       value="@isset($book){{ $book->post_modified }}@else{{ date("d-m-Y") }}@endisset ">
            </div>
        </div>

        <div class="form-group">
            <label for="post_author">Автор</label>
            <select name="post_author" id="post_author" class="form-control custom-select" style="width: 100%;">
                @include('admin.book_posts.partials.author',[ 'author_list' => $author_list ])
            </select>
        </div>
        <hr class="my-4" style="height: 3px; background-color: darkgrey;">
        <div class="row ">
            <div class="form-group col-6">
                <label for="post_status">Жариялау мәртебесі</label>
                <input type="checkbox" name="post_status" id="post_status"
                       @isset($book)
                           @if($book->post_status == true)
                                checked
                           @endif
                        @endisset
                       data-bootstrap-switch>
            </div>
            <div class="form-group col-6">
                <label for="is_approved">Тексеру мәртебесі</label>
                <input type="checkbox" name="is_approved" id="is_approved"
                       @isset($book)
                           @if($book->is_approved == true)
                                checked
                           @endif
                       @endisset

                       data-bootstrap-switch>
            </div>

        </div><!-- /.row -->
        <div class="row">
            <div class="form-group w-100">
                <label>Ілмектер</label>
                <div class="select2-purple">
                    <select class="select2" multiple="multiple" name="tags[]" data-placeholder="Select a State" data-dropdown-css-class="select2-purple" style="width: 100%;">
                      @foreach($tags as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->tag_title }}</option>
                      @endforeach
                    </select>
                </div>
            </div>
            <!-- /.form-group -->
        </div><!-- /.row -->

    </div>
</div>
