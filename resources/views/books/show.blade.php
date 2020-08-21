@extends('books.layouts.app')

@section('title','Ата жолы')

@section('content')

    <div id="page" style="max-width: 1200px;">

        <div class="mh-head Sticky mh-btns-left-2 ">
				<span class="mh-btns-left d-md-none">
					<a href="#menu" class="fas fa-bars"></a>
					<a href="#page" class="fas fa-times"></a>
				</span>
            <span class="mh-text">Ата жолы кітапханасы</span>
        </div>
        <div class="container-fluid book-content">
            <div class="row no-gutters">
                <div class="col-md-12 col-xs-12 my-lg-4 my-3">
                    <!-- Default box -->
                    <div class="card" id="response">
                       @include('books.ajax_show')
                    </div>
                    <!-- /.card-footer-->

                </div><!-- /.card -->
            </div><!-- /.col-lg-8 -->
        </div><!-- /.row -->
        <div class="row">
            <!-- Footer -->
            @include('layouts.footer')
        </div>
    </div><!-- /.container-fluid -->

    <nav id="menu">
        <ol id="panel-menu">
            @include('books.partials.list-books', ['book_names' => $book_names ?? null])
        </ol>
    </nav>

@endsection