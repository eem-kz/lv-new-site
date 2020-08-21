@isset($tag_list)
    @foreach($tag_list as $item)
        <tr>
            <td></td>
            <td>{{ $item->tag_title }}</td>
            <td>{{ $item->tag_slug }}</td>
            <td class="text-center" style="width: 30px;">
                <div class="btn-group-sm">
                    <form id="delete-form-{{ $item->id }}" action="{{ route('admin.tag.destroy', $item)}}" method="post"
                          style="display: flex;">
                        <a href="{{ route('admin.tag.edit',$item) }}" class="btn-sm btn-success"
                           role="button">
                            <i class="fas fa-edit"></i>
                        </a>
                        @csrf
                        @method('DELETE')
                        <button class="btn-sm btn-danger btn-delete" data-id="{{$item->id}}" type="submit" style="margin-left: .5rem;">
                            <i class='fas fa-trash-alt'></i>
                        </button>
                    </form>
                </div>
            </td>
        </tr>
    @endforeach
@endisset