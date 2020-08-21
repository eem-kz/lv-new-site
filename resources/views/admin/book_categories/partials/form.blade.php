<div class="form-group">
    <label for="title">Тақырыбы</label>
    <input type="text" class="form-control" id="title" name="title" placeholder="Тақырыбы..." value="{{ $category->title ?? '' }}">
</div>
<div class="form-group">
    <label>Кітап атауы</label>
    <select name="parent_id" class="form-control select2" style="width: 100%;">
        <option selected="selected" value="0">--  Түбір  --</option>
        @include('admin.book_categories.partials.book_category',[ 'books_list' => $books_list, $dd = 0 ])

    </select>
</div>
