<section id="books" class="books-section ">
    <div class="container">
        <h2 class="text-center books-header">Кітаптар</h2>
        <p class="small books-description text-center mt-lg-4 mt-3">
            Тылсым тапсырмасымен бүгінге дейін хатқа түсірілген 11 атаумен, 33 кітап болып басылып шығатын кітаптар
            жүйесі
            тұр. Бұл кітаптарда ата-бабаларымыз меңгерген жаратылыс ілімі мен құпия сырлар баяндалады. Математикалық,
            астрономиялық есептер мен геометриялық сызбалар, әлі де айтуға болмайтын, бүгінгі Ғылым әлі жете қоймаған
            құпия
            ақпараттар тұр.
        </p>
        <p class="books-description text-center mb-3 mb-lg-5">
            Жалпы аманат бойынша 49 кітап жазылып, сол кітаптармен тылсымның 1001 есігі ашылады екен. Кітаптар
            ілім арқылы Құран үнімен жазылғандықтан белгілі бір тазалықты, тақуалықты талап етеді.
        </p>
        <!--<hr class="divider my-3 my-lg-4">-->
        <div class="row books-block">
            <div class="col-12">
                <ol>
                    @forelse($books_names ?? '' as $item)
                        <li class="books-item">
                            <a class="books-link"
                               href="{{ '/'.app()->getLocale().'/'.(trim($item->link)==''?'#':$item->link) }}"><i class="fas fa-book-open"></i> {{ $item->title ?? '' }}</a>
                        </li>
                    @empty
                        <p style="color: red;">{{ __('landing.books_not_translated') }}</p>
                    @endforelse
                </ol>
            </div>
        </div>
        <div class="text-center mt-lg-4 mt-3 mb-3 mb-lg-0">
            <a class="btn btn-amber text-white" style="font-size: 1rem; font-weight: 600;" target="_blank" href="http://atazholy.kz/kz/books">Жаңа кітапхана<i
                        class="fas fa-graduation-cap ml-2"></i></a>
        </div>
    </div>
</section>