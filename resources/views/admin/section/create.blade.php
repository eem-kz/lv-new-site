@extends('admin.layouts.app')

@section('title','Ата жолы')

@push('css')
    <link rel="stylesheet" href="{{ asset('bastyq/plugins/summernote/summernote-bs4.css') }}">

@endpush

@section('content')
    @component('admin.components.breadcrumb')
        @slot('title') Текст қосу @endslot
        @slot('parent') <i class="nav-icon fas fa-tachometer-alt"></i> @endslot
        @slot('active') Текст @endslot
    @endcomponent
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 col-lg-10">
                    @include('admin.menu.partials.msg')
                    <!-- general form elements -->
                        <div class="card card-primary">
                            <!-- form start -->
                            <form role="form" action="{{ route('admin.section.store') }}" method="post">
                                {{ csrf_field() }}
                                <div class="card-body">
                                @include('admin.section.partials.form')
                                </div><!-- /.card-body -->
                                <div class="card-footer">
                                    <div class="float-right">
                                        <a class="btn btn-dark" href="{{ route('admin.section.index') }}">Артқа</a>
                                        <button type="submit" class="btn btn-primary">Сақтау</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                </div><!-- /.row -->
            </div><!-- /.col-sm-12 -->


        </div><!-- /.container-fluid -->

    </section><!-- /.content -->
@endsection

@push('js')
    <script src="{{ asset('bastyq/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('bastyq/plugins/summernote/lang/summernote-ru-RU.min.js') }}"></script>
    <script>
        $('#section_content').summernote({
            height: 300,                 // set editor height
            minHeight: null,             // set minimum height of editor
            maxHeight: null,             // set maximum height of editor
            lang: 'ru-RU',
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
    </script>
@endpush