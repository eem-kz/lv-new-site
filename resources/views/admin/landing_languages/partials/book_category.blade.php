@foreach ($books_list as $item)

    <option value="{{$item->id ?? ""}}"

            @isset($category->id)

            @if ($category->parent_id == $item->id)
            selected=""
            @endif

            @if ($category->id == $item->id || $item->parent_id == $dd)
                @php
                    $dd = $category->id;
                @endphp
            hidden=""
            @endif

            @endisset

    >
        {!! $delimiter ?? "" !!}{{$item->title ?? ""}}
    </option>

    @if ($item->children)

        @include('admin.book_categories.partials.book_category', [
          'books_list' => $item->children,
          'delimiter'  => ' - ' . $delimiter
        ])

    @endif
@endforeach