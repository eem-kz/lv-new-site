{{ dd($tag) }}
@extends('admin.layouts.app')

@section('title','Ата жолы')

@push('css')

@endpush

@section('content')
    @component('admin.components.breadcrumb')
        @slot('title') Ілмекті өзгерту @endslot
        @slot('parent')<a href="{{ route('admin.tag.index') }}">Ілмектер тізімі</a> @endslot
        @slot('active')Ілмекті өзгерту@endslot

    @endcomponent
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-sm-12 col-lg-10">
                @include('admin.book_tags.partials.msg')
                <!-- general form elements -->
                    <div class="card card-primary">
                        <!-- form start -->
                        <form role="form" action="{{ route( 'admin.tag.update', $tag ) }}" method="post">
                            {{ csrf_field() }}
                            @method('PUT')
                            <div class="card-body">
                                @include( 'admin.book_tags.partials.form',$tag )
                            </div><!-- /.card-body -->
                            <div class="card-footer">
                                <div class="float-right">
                                    <a class="btn btn-dark"
                                       href="{{ route( 'admin.tag.index' ) }}"
                                    >
                                        Артқа
                                    </a>
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