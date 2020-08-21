@isset($book_list)
    @foreach($book_list as $k=>$item)
        <tr>
            <td></td>
            <td>{!! $delimiter !!}{{ $item->title }}</td>
            <td>{{ $item->slug }}</td>
            <td class="text-center" style="width: 30px;">
                <div class="btn-group-sm">
                    <form action="{{ route('admin.category.destroy', [ 'category' => $item->id ])}}" method="post"
                          style="display: flex;">
                        <a href="{{ route('admin.category.edit',$item->id ) }}" class="btn-sm btn-success"
                           role="button"> <i class="fas fa-edit"></i></a>
                        @csrf
                        @method('DELETE')
                        <button class="btn-sm btn-danger" type="submit" style="margin-left: .5rem;">
                            <i class='fas fa-trash-alt'></i>
                        </button>
                    </form>
                </div>
            </td>
        </tr>
        @if ($item->children)
            @include('admin.book_categories.partials.table', [
              'book_list' => $item->children,
              'delimiter'  => ' - ' . $delimiter,
            ])
        @endif
    @endforeach
@endisset