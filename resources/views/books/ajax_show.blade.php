<div class="card-header">
    <h3 class="card-title">{{ $book->post_title }}</h3>
</div>
<div class="card-body">
    {!! $book->post_content  !!}
</div>
<!-- /.card-body -->
<div class="card-footer">
    <small>Кітап атауы: {{ $book->bookCategory->title }}</small>
    <br>
    <small>Жарияланған күні: {{ $book->post_modified }}</small>
</div>
<!-- /.card-footer-->
