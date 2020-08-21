@foreach ($lang_list as $item)

    <option value="{{$item->id ?? ""}}"

            @isset($link->id)

                @if ($link->lang_id == $item->id)
                selected=""
                @endif

               {{-- @if ($link->lang_id == $item->id || $item->parent_id == $dd)
                    @php
                        $dd = $category->id;
                    @endphp
                hidden=""
                @endif--}}

            @endisset

    >
        {{$item->name ?? ""}}
    </option>


@endforeach