{{--{{ var_dump($link) }}--}}
<div class="form-group">
    <label for="section_content">Текст</label>
    <textarea  class="form-control" style="resize: none;" rows="10" id="section_content" name="text" placeholder="Текст ..." >{{ $link->title ?? '' }}</textarea>
</div>
<div class="form-group">
    <label for="slug">Slug</label>
    <input type="text" class="form-control" id="slug" name="slug" placeholder="Сілтеме..." value="{{ $link->link ?? '' }}">
</div>
<div class="form-group">
    <label>Тіл атауы</label>
    <select name="lang_id" class="form-control select2" style="width: 100%;">
        <option selected="selected" value="0">--  Түбір  --</option>
        @include('admin.section.partials.language',[ $lang_list ])

    </select>
</div>
