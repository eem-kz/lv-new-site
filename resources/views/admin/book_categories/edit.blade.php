@extends('admin.layouts.app')

@section('title','Ата жолы')

@push('css')

@endpush

@section('content')
    @component('admin.components.breadcrumb')
        @slot('title') Кітап атын өзгерту @endslot
        @slot('parent') <i class="nav-icon fas fa-tachometer-alt"></i> @endslot
        @slot('active') Кітаптар @endslot
    @endcomponent
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-sm-12 col-lg-10">
                @include('admin.book_categories.partials.msg')
                <!-- general form elements -->
                    <div class="card card-primary">
                        <!-- form start -->
                        <form role="form" action="{{ route( 'admin.category.update', $category->id ) }}" method="post">
                            {{ csrf_field() }}
                            @method('PUT')
                            <div class="card-body">
                                @include('admin.book_categories.partials.form')
                            </div><!-- /.card-body -->
                            <div class="card-footer">
                                <div class="float-right">
                                    <a class="btn btn-dark" href="{{ route('admin.category.index') }}">Артқа</a>
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

@endpush