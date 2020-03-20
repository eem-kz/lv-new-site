@foreach ($author_list as $item)

    <option value="{{$item->id ?? ""}}"

            @isset($book->id)

                @if ($book->post_author == $item->id)
                    selected=""
                @endif

            @endisset

    >
        {{$item->name ?? ""}}
    </option>


@endforeach