@isset($books_names)
    @php $l = 0; @endphp
    @foreach($books_names as $item)
        <li>
            @if (count($item->children) > 0)
                <span>{{ $item->title ?? '' }}</span>

                <ul>
                    @include('books.partials.list-books', [
                    'books_names' => $item->children,
                    'children'=>true
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
{{--
 <li><a href="#/work">Our work</a></li>
            <li><span>About us</span>
                <ul>
                    <li><a href="#/about/history">History</a></li>
                    <li><span>The team</span>
                        <ul>
                            <li><a href="#/about/team/management">Management</a></li>
                            <li><a href="#/about/team/sales">Sales</a></li>
                            <li><a href="#/about/team/development">Development</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
--}}