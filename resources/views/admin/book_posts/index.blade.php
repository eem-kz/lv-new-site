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
                                <div id="err" class="small"></div>
                                <thead>
                                <tr role="row">
                                    <th width="30px">№</th>
                                    <th>Тақырыбы</th>
                                    <th>Кітап атауы</th>
                                    <th>Қаралған саны</th>
                                    <th>Тексерілген</th>
                                    <th>Мәртебесі</th>
                                    <th>Пікірлер саны</th>
                                    <th>Құрылған күні</th>
                                    <th></th>
                                </tr>
                                </thead>
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
            /*$.ajax({
                success: function (data) {
                   $('#err').html(data);

                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                }
            });*/


             $('#books-list').DataTable({
                 processing: true,
                 serverSide: true,
                 ajax: {
                     url: "{{ route('admin.book.index') }}",
                },
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'post_title', name: 'post_title'},
                    {data: 'category', name: 'category'},
                    {data: 'view_count', name: 'view_count'},
                    {data: 'is_approved', name: 'is_approved'},
                    {data: 'post_status', name: 'post_status'},
                    {data: 'comment_status', name: 'comment_status'},
                    {data: 'post_modified', name: 'post_modified'},
                    { data: 'action', name: 'action', orderable: false }
                ],
                "lengthChange": false,
                // "order": [[ 0, "desc" ]],
                columnDefs: [
                    {
                        // "targets": [8],
                        "orderable": false,
                        "searchable": false,
                        "defaultContent": "-",
                        "targets": "_all"
                    }
                ]
            });
        });
    </script>
@endpush