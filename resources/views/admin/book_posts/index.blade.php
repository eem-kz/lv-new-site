@extends('admin.layouts.app')

@section('title','Ата жолы')

@push('css')
    {{--<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">--}}
    <link rel="stylesheet" href="{{ asset('bastyq/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
    {{--
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css"/>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/fixedheader/3.1.6/css/fixedHeader.bootstrap4.min.css"/>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/rowgroup/1.1.1/css/rowGroup.bootstrap4.min.css"/>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/searchpanes/1.0.1/css/searchPanes.bootstrap4.min.css"/>--}}
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
                    @include('admin.book_categories.partials.msg')
                    <div class="card" style="width: 100%">
                        <div class="card-body">
                            <a href="{{ route('admin.book.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus"></i>
                                <span class="add-btn">Мақала қосу</span>
                            </a>
                            <table id="books-list" class="table table-bordered table-striped">
                                <thead>
                                <tr role="row">
                                    <th width="15px"></th>
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
    <script>
        $(function () {
            let table = $('#books-list').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('admin.book.index') }}",

                },
                columns: [
                    {
                        "className": 'details-control',
                        "orderable": false,
                        "data": null,
                        "defaultContent": ''
                    },
                    {data: 'id', name: 'id', "searchable": false},
                    {data: 'post_title', name: 'post_title'},
                    {data: 'category', name: 'category'},
                    {data: 'view_count', name: 'view_count', "searchable": false},
                    {data: 'is_approved', name: 'is_approved', orderable: false, "searchable": false},
                    {data: 'post_status', name: 'post_status', orderable: false, "searchable": false},
                    {data: 'comment_status', name: 'comment_status', "searchable": false},
                    {data: 'post_modified', name: 'post_modified', "searchable": false},
                    {data: 'action', name: 'action', orderable: false, "searchable": false}
                ],
                "lengthChange": false,
                // "order": [[ 1, "desc" ]],
                /* columnDefs: [
                     {
                         "targets": "_all",
                         "orderable": false
                     }
                 ],
                columnDefs: [
                    {
                        "targets": [0,1,4,5,6,7,8],
                        "searchable": false,
                    }
                ]*/
            });

            // Add event listener for opening and closing details
            $('#books-list tbody').on('click', 'td.details-control', function () {
                let tr = $(this).closest('tr');
                let row = table.row(tr);

                if (row.child.isShown()) {
                    // This row is already open - close it
                    row.child.hide();
                    tr.removeClass('shown');
                }
                else {
                    // Open this row
                    row.child(format(row.data())).show();
                    tr.addClass('shown');
                }
            });
        });

        /* Formatting function for row details - modify as you need */
        function format(d) {
            {{--d.post_content = {!! d.post_content !!}--}}
            // `d` is the original data object for the row
            // console.log( d );
            return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">' +
                '<tr>' +
                '<td>Slug:</td>' +
                '<td>' + d.slug + '</td>' +
                '</tr>' +
                '<tr>' +
                '<td>Контент:</td>' +
                '<td>' + d.post_content + '</td>' +
                '</tr>' +
                '</table>';
        }
    </script>

@endpush