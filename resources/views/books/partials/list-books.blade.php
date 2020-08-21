@isset($book_names)
    @php $l = 0; @endphp
    @foreach($book_names as $item)
        <li>
            @if (count($item->children)>0)
                <span>{{ $item->title ?? '' }}</span>

                <ul>
                    @include('books.partials.list-books', [
                    'book_names' => $item->children,
                    ])
                </ul>
            @else
                @if(count($item->posts) > 0)
                    <span>{{ $item->title ?? '' }}</span>
                    <ul>
                        @foreach($item->posts as $post)
                            <li>
                                <a href="{{ route('book.detail',[app()->getLocale(),$post->slug,] ) }}"
                                   data-slug="{{ $post->slug }}" class="get-book">{{ $post->post_title ?? ''}}</a>
                            </li>
                        @endforeach
                    </ul>

                @else
                    <a href="#/">{{ $item->title ?? ''}}</a>

                @endif

            @endif


        </li>
    @endforeach
@endisset
