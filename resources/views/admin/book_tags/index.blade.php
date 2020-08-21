@extends('admin.layouts.app')

@section('title','Ілмектер тізімі')

@push('css')
    <link rel="stylesheet" href="{{ asset('bastyq/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('bastyq/plugins/jquery-confirm/jquery-confirm.min.css') }}">
@endpush

@section('content')
    @component('admin.components.breadcrumb')
        @slot('title') Ілмектер тізімі @endslot
        @slot('parent')Ілмектер тізімі @endslot
    @endcomponent
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    @include('admin.book_tags.partials.msg')
                    <div class="card" style="width: 100%">
                        <div class="card-body">
                            <a href="{{ route('admin.tag.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus"></i>
                                <span class="add-btn">Ілмек қосу</span>
                            </a>
                            <table id="tag-list" class="table table-bordered table-striped">
                                <thead>
                                <tr role="row">
                                    <th width="30px">№</th>
                                    <th>Ілмектер атауы</th>
                                    <th>Slug</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @include('admin.book_tags.partials.table',['tag_list' => $tag_list])
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
    <script src="{{ asset('bastyq/plugins/jquery-confirm/jquery-confirm.min.js') }}"></script>
    <script src="{{ asset('bastyq/js/main.js') }}"></script>
    <!-- page script -->
    <script>
        $(function () {
            $('#tag-list').DataTable({
                "lengthChange": false,
                columnDefs: [
                    {
                        "targets": "_all",
                        "orderable": false,
                        "searchable": false
                    }
                ]
            });

           /* $('.btn-delete').on('click', function () {
                event.preventDefault();
                let id = $(this).data('id');
                $.confirm({
                    title: 'Are you sure?',
                    content: 'You want to delete this?',
                    closeIcon: true,
                    closeIconClass: 'far fa-window-close',
                    type: 'blue',
                    icon: 'fas fa-question',
                    escapeKey: 'Cancel',
                    buttons: {
                        formSubmit: {
                            text: 'Удалить',
                            btnClass: 'btn-blue',
                            action: function () {
                                document.getElementById('delete-form-' + id).submit();
                            }
                        },
                        Cancel: {
                            text: 'Отмена',
                            action: function () {
                            }
                        },
                    }
                });

            });*/

        });
    </script>
@endpush