{{ __METHOD__ }}
@extends('books.layouts.app')

@section('title','Ата жолы')

@section('content')
    <div id="page">

        <div class="mh-head Sticky mh-btns-left-2 ">
				<span class="mh-btns-left d-md-none">
					<a href="#menu" class="fas fa-bars"></a>
					<a href="#page" class="fas fa-times"></a>
				</span>
            <span class="mh-text">Ата жолы кітапханасы</span>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-9 col-md-8 col-12">
{{--                    {{ dd($books_names) }}--}}
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur corporis cum eveniet
                        facilis ipsam
                        laudantium, molestiae numquam possimus! At expedita facere id iusto magnam mollitia nemo quod,
                        repellat
                        reprehenderit totam?</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur corporis cum eveniet
                        facilis ipsam
                        laudantium, molestiae numquam possimus! At expedita facere id iusto magnam mollitia nemo quod,
                        repellat
                        reprehenderit totam?</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur corporis cum eveniet
                        facilis ipsam
                        laudantium, molestiae numquam possimus! At expedita facere id iusto magnam mollitia nemo quod,
                        repellat
                        reprehenderit totam?</p>
                </div>
                <!-- /.col-lg-8 -->
                <div class="col-lg-3 col-md-4 col-12" style="color: red;">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A accusamus blanditiis deserunt
                        doloremque dolores
                        eaque esse et explicabo hic, iusto modi neque, obcaecati, omnis pariatur perspiciatis porro quam
                        ullam
                        vitae!</p>
                    <p>Aperiam architecto eum incidunt tempora ut! Accusamus assumenda aut consequuntur doloribus
                        ducimus eum
                        eveniet fugiat inventore ipsa necessitatibus nemo nihil porro provident quas, quasi quis quos
                        sapiente sunt
                        veniam veritatis.</p>
                    <p>Aliquam amet assumenda consequatur corporis culpa cumque est ex in laboriosam magnam magni
                        molestias nemo
                        nihil nobis odio odit perspiciatis reiciendis suscipit, tempore vero? Expedita laboriosam libero
                        quae quasi
                        quia.</p>


                </div>
                <!-- /.col-lg-8 -->
            </div><!-- /.row -->
            <div class="row">
                <!-- Footer -->
                @include('layouts.footer')
            </div>
        </div><!-- /.container-fluid -->

    </div>{{--/#page--}}

    <nav id="menu">
        <ol type="1" id="panel-menu">
          {{--  @php $l = 0;
            @endphp
            @foreach($books_names as $item)

                <li><a href="#/">{{ ++$l.'. '. $item->title }}</a></li>
            @endforeach--}}
            @include('books.partials.list-books', ['books_names' => $books_names, 'children'=>false])

        </ol>
    </nav>

@endsection