@foreach ($book_list as $item)

    <option value="{{$item->id ?? ""}}"

            @isset($book->id)

            @if ($book->book_category_id == $item->id)
            selected=""
            @endif

           {{-- @if ($book->id == $item->id || $item->parent_id == $dd)
                @php
                    $dd = $book->id;
                @endphp
            hidden=""
            @endif--}}

            @endisset

    >
        {!! $delimiter ?? "" !!}{{$item->title ?? ""}}
    </option>

    @if (count($item->children) > 0)

        @include('admin.book_posts.partials.book_category', [
          'book_list' => $item->children,
          'delimiter'  => ' - ' . $delimiter
        ])

    @endif
@endforeach