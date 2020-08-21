@isset($menu_list)
    @foreach($menu_list as $item)
        <tr>
            <td class="text-center">{{$item->id}}</td>
            <td>{{ $item->title }}</td>
            <td>{{ $item->link }}</td>
            <td>{{ $item->languages->name }}</td>
            <td class="text-center" style="width: 30px;">
                <div class="btn-group-sm">
                    <form action="{{ route('admin.menu.destroy', [ $item->id ])}}" method="post"
                          style="display: flex;">
                        <a href="{{ route('admin.menu.edit',$item->id ) }}" class="btn-sm btn-success"
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