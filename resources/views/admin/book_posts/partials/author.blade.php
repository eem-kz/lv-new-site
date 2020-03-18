@foreach ($author_list as $item)

    <option value="{{$item->id ?? ""}}"

            @isset($category->id)

            @if ($category->parent_id == $item->id)
            selected=""
            @endif

            @if ($category->id == $item->id )
            hidden=""
            @endif

            @endisset

    >
        {{$item->name ?? ""}}
    </option>


@endforeach