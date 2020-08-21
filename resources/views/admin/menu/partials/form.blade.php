{{--{{ var_dump($link) }}--}}
<div class="form-group">
    <label for="title">Атауы</label>
    <input type="text" class="form-control" id="title" name="title" placeholder="Атауы..." value="{{ $link->title ?? '' }}">
</div>
<div class="form-group">
    <label for="link">Сілтеме</label>
    <input type="text" class="form-control" id="link" name="link" placeholder="Сілтеме..." value="{{ $link->link ?? '' }}">
</div>
<div class="form-group">
    <label>Тіл атауы</label>
    <select name="lang_id" class="form-control select2" style="width: 100%;">
        <option selected="selected" value="0">--  Түбір  --</option>
        @include('admin.menu.partials.language',[ $lang_list ])

    </select>
</div>
