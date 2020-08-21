@extends('admin.layouts.app')

@section('title','Ата жолы')

@push('css')
    <link rel="stylesheet" href="{{ asset('bastyq/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
@endpush

@section('content')
    @component('admin.components.breadcrumb')
        @slot('title') Список ссылок @endslot
        @slot('parent') <i class="nav-icon fas fa-tachometer-alt"></i> @endslot
        @slot('active') Ссылки @endslot
    @endcomponent
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    @include('admin.menu.partials.msg')
                    <div class="card w-100">
                    {{-- <div class="card-header">
                         <h3 class="card-title">DataTable with minimal features &amp; hover style</h3>
                     </div>--}}
                    <!-- /.card-header -->
                        <div class="card-body">
                            <a href="{{ route('admin.menu.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus"></i>
                                <span class="add-btn">Сілтемелер қосу</span>
                            </a>
                            <table id="books-list" class="table table-bordered table-striped">
                                <thead>
                                <tr role="row">
                                    <th width="30px">№</th>
                                    <th>Атауы</th>
                                    <th>Сілтеме</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @include('admin.menu.partials.table',['menu_list' => $menu_list])
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
                        "targets": "_all",
                        "orderable": false,
                        "searchable": false
                    }
                ]
            });
        });
    </script>
@endpush