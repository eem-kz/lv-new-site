<div class="form-group">
    <label for="name">Атауы</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="Атауы..." value="{{ $language->name ?? '' }}">
</div>

<div class="form-group">
    <label for="description">Түсініктемесі</label>
    <input type="text" class="form-control" id="description" name="description" placeholder="Түсініктемесі..." value="{{ $language->description ?? '' }}">
</div>

