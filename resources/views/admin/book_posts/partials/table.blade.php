@foreach ($books_list as $item)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{!! $delimiter ?? "" !!} {{ $item->title }}</td>
        <td>{{ $item->slug }}</td>
        <td class="text-center" style="width: 30px;">

            <div class="btn-group-sm">
                <form action="{{ route('admin.category.destroy', [ 'category' => $item->id ])}}" method="post" style="display: flex;">
                    <a href="{{ route('admin.category.edit',$item->id ) }}" class="btn-sm btn-success" role="button"> <i class="fas fa-edit"></i></a>
                    @csrf
                    @method('DELETE')
                    <button class="btn-sm btn-danger" type="submit" style="margin-left: .5rem;">
                        <i class='fas fa-trash-alt'></i>
                    </button>
                </form>
            </div>
        </td>
    </tr>
    @if (count($item->children) > 0)
        @include('admin.book_categories.partials.table', [
          'books_list' => $item->children,
          'delimiter'  => ' - ' . $delimiter,
          'i'=>$i++
        ])

    @endif
@endforeach