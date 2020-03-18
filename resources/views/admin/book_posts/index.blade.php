@extends('admin.layouts.app')

@section('title','Ата жолы')

@push('css')
    <link rel="stylesheet" href="{{ asset('bastyq/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
@endpush

@section('content')
    @component('admin.components.breadcrumb')
        @slot('title') Список книг @endslot
        @slot('parent') <i class="nav-icon fas fa-tachometer-alt"></i> @endslot
        @slot('active') Книги @endslot
    @endcomponent
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    @include('admin.book_categoryes.partials.msg')
                    <div class="card" style="width: 100%">
                        <div class="card-body">
                            <a href="{{ route('admin.book.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus"></i>
                                <span class="add-btn">Мақала қосу</span>
                            </a>
                            <table id="books-list" class="table table-bordered table-striped">
                                <thead>
                                    <tr role="row">
                                        <th width="30px">№</th>
                                        <th>Тақырыбы</th>
                                        <th>Автор</th>
                                        <th>Қаралған саны</th>
                                        <th>Мәртебесі</th>
                                        <th>Тексерілген</th>
                                        <th>Пікірлер саны</th>
                                        <th>Құрылған күні</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($posts as $key=>$post)
                              <tr>
                                  <td>{{ ++$key }}</td>
                                  <td>{{ $post->post_title }}</td>
                                  <td>{{ $post->user->name }}</td>
                                  <td class="text-center">{{ $post->view_count }}</td>
                                  <td class="text-center">
                                      @if($post->is_approved == true)
                                          <span class="badge bg-blue">Тексерілген</span>
                                      @else
                                          <span class="badge bg-pink">Жоқ</span>
                                      @endif
                                  </td>
                                  <td class="text-center">
                                      @if($post->status == true)
                                          <span class="badge bg-blue">Жарияланған</span>
                                      @else
                                          <span class="badge bg-pink">Жоқ</span>
                                      @endif
                                  </td>
                                  <td class="text-center">{{ $post->comment_count }}</td>
                                  <td>{{ $post->created_at }}</td>
                                  <td class="text-center">

                                      <a href="{{ route('admin.book.edit',$post->id) }}" class="btn btn-info waves-effect">
                                          <i class="fas fa-edit"></i>
                                      </a>
                                      <button class="btn btn-danger waves-effect" type="button" onclick="deletePost({{ $post->id }})">
                                          <i class='fas fa-trash-alt'></i>
                                      </button>
                                      <form id="delete-form-{{ $post->id }}" action="{{ route('admin.book.destroy',$post->id) }}" method="POST" style="display: none;">
                                          @csrf
                                          @method('DELETE')
                                      </form>
                                  </td>
                              </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div><!-- /.card-body -->
                    </div>
                </div><!-- /.col-sm-12 -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section><!-- /.content -->
@endsection

@push('js')
    <script src="{{ asset('bastyq/plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('bastyq/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
    <!-- page script -->
    <script>
        $(function () {
            $('#books-list').DataTable({
                "lengthChange": false,
                columnDefs: [
                    {
                        "targets": [0,8],
                        "orderable": false,
                        "searchable": false
                    }
                ]
            });


        });
    </script>
@endpush