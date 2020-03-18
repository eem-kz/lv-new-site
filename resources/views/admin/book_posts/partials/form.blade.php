<div class="row">
    <div class="col-lg-8">
        <div class="form-group">
            <label for="title">Мақала тақырыбы</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Тақырыбы..."
                   value="{{ $category->title ?? '' }}" autofocus>
        </div>

        <div class="form-group">
            <label for="post_content">Контент</label>
            <textarea style="width: 100%; resize: none;" name="post_content" id="post_content" rows="10"></textarea>
        </div>

    </div>
    <div class="col-lg-4">
        <div class="form-group">
            <label for="parent_id">Кітап (бөлім) атауы</label>
            <select name="parent_id" id="parent_id" class="form-control select2" style="width: 100%;">
                @include('admin.book_posts.partials.book_category',[ 'books_list' => $book_list, $dd = 0 ])
            </select>
        </div>

        <div class="form-group">
            <label>Салынған күн</label>
            <div class="input-group">
                <input name="post_modified" type="text" class="form-control float-left" id="datepicker" value="{{ date("d-m-Y") ?? '' }}">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="far fa-calendar-alt"></i>
                    </span>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="post_author">Автор</label>
            <select name="post_author" id="post_author" class="form-control select2" style="width: 100%;">
                @include('admin.book_posts.partials.author',[ 'books_list' => $author_list ])
            </select>
        </div>

    </div>
</div>
</div>
