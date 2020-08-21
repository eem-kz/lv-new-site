@isset($lang_list)
    @foreach($lang_list as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->description }}</td>
            <td>{{ $item->slug }}</td>
            <td class="text-center" style="width: 30px;">
                <div class="btn-group-sm">
                    <form action="{{ route('admin.languages.destroy', $item) }}" method="post"
                          style="display: flex;">
                        <a href="{{ route('admin.languages.edit',$item ) }}" class="btn-sm btn-success"
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

    @endforeach
@endisset