@extends('admin.layouts.app')

@section('title','Ата жолы')

@push('css')
    <!-- JQuery DataTable Css -->
    {{--    <link href="{{ asset('assets/backend/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}" rel="stylesheet">--}}

    {{--<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">--}}
    <!-- DataTables -->
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
                    @include('admin.book_categoryes.partials.msg',$books_list)
                    <div class="card" style="width: 100%">
                    {{-- <div class="card-header">
                         <h3 class="card-title">DataTable with minimal features &amp; hover style</h3>
                     </div>--}}
                    <!-- /.card-header -->
                        <div class="card-body">
                            <a href="{{ route('admin.category.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus"></i>
                                <span class="add-btn">Кітаптар қосу</span>
                            </a>
                            <table id="books-list" class="table table-bordered table-striped">
                                <thead>
                                    <tr role="row">
                                        <th width="30px">№</th>
                                        <th>Наименование</th>
                                        <th>Slug</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                @include('admin.book_categoryes.partials.table',[
                                    'books_list' => $books_list
                                ])
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
                        "targets": [2, 3],
                        "orderable": false,
                        "searchable": false
                    }
                ]
            });


        });
    </script>
@endpush