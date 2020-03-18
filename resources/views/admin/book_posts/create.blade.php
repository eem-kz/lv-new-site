@extends('admin.layouts.app')

@section('title','Ата жолы')

@push('css')
    <link rel="stylesheet" href="{{ asset('bastyq/plugins/summernote/summernote-bs4.css') }}">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <style>
        .ui-datepicker-trigger{
            border:none;
            background:none;
        }
    </style>
@endpush

@section('content')
    @component('admin.components.breadcrumb')
        @slot('title') Кітап қосу @endslot
        @slot('parent') <i class="nav-icon fas fa-tachometer-alt"></i> @endslot
        @slot('active') Кітаптар @endslot
    @endcomponent
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                @include('admin.book_posts.partials.msg')
                    <div class="card card-primary">
                        <form role="form" method="post"
                            @isset($post)
                                action="{{ route('admin.book.update', $post) }}"
                            @else
                                action="{{ route('admin.book.store') }}"
                            @endisset
                        >
                            @isset($post)
                                @method('PUT')
                            @endisset
                            {{ csrf_field() }}
                            <div class="card-body">
                                @include('admin.book_posts.partials.form')
                                <div class="card-footer">
                                    <div class="float-right">
                                        <a class="btn btn-dark" href="{{ route('admin.book.index') }}">Артқа</a>
                                        <button type="submit" class="btn btn-primary">Сақтау</button>
                                    </div>
                                </div>
                            </div><!-- /.card-body -->
                        </form>
                    </div><!-- /.card -->
                </div><!-- /.col-sm-12 -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section><!-- /.content -->
@endsection

@push('js')
    <script src="{{ asset('bastyq/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('bastyq/plugins/summernote/lang/summernote-ru-RU.min.js') }}"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
            integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
            crossorigin="anonymous"></script>
    <script>
        $(function () {
            $('#post_content').summernote({
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
            $.datepicker.regional['ru'] = {
                closeText: 'Закрыть',
                prevText: 'Предыдущий',
                nextText: 'Следующий',
                currentText: 'Сегодня',
                monthNames: ['Январь','Февраль','Март','Апрель','Май','Июнь','Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь'],
                monthNamesShort: ['Янв','Фев','Мар','Апр','Май','Июн','Июл','Авг','Сен','Окт','Ноя','Дек'],
                dayNames: ['воскресенье','понедельник','вторник','среда','четверг','пятница','суббота'],
                dayNamesShort: ['вск','пнд','втр','срд','чтв','птн','сбт'],
                dayNamesMin: ['Вс','Пн','Вт','Ср','Чт','Пт','Сб'],
                weekHeader: 'Не',
                dateFormat: 'dd.mm.yy',
                firstDay: 1,
                isRTL: false,
                showMonthAfterYear: false,
                yearSuffix: ''
            };
            $.datepicker.setDefaults($.datepicker.regional['ru']);

            $("#datepicker").datepicker({
                dateFormat: "dd-mm-yy",
                maxDate: 0
            });
            // $("#datepicker").datetimepicker();


        })


    </script>

@endpush