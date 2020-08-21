<!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column nav-flat nav-legacy nav-compact" data-widget="treeview" role="menu" data-accordion="false">
        {{--nav nav-pills nav-sidebar flex-column nav-compact nav-legacy nav-flat--}}
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Кансоль
                </p>
            </a>
        </li>
            <li class="nav-item {{
                    Request::is('admin/landing*') ? 'menu-open' : ''
        }}">
                <a href="#" class="nav-link">
                    <i class="fas fa-landmark"></i>
                    <p>
                        Басқы бет
                        <i class="fas fa-angle-left right"></i>

                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('admin.languages.index') }}" class="nav-link {{ Request::is('admin/book*') ? 'active' : '' }}">
                            <i class="fas fa-angle-right nav-icon"></i>
                            <p>Тілдер</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.menu.index') }}" class="nav-link {{ Request::is('admin/book*') ? 'active' : '' }}">
                            <i class="fas fa-angle-right nav-icon"></i>
                            <p>Сілтемелер</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.section.index') }}" class="nav-link {{ Request::is('admin/book*') ? 'active' : '' }}">
                            <i class="fas fa-angle-right nav-icon"></i>
                            <p>Секция мәтіндері</p>
                        </a>
                    </li>
                </ul>
            </li>
        <li class="nav-item {{
                    Request::is('admin/category*') ? 'menu-open' :
                    Request::is('admin/book*') ? 'menu-open' :
                    Request::is('admin/tag*') ? 'menu-open' :
                    ''
        }}">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                    Кітапхана
                    <i class="fas fa-angle-left right"></i>

                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('admin.book.index') }}" class="nav-link {{ Request::is('admin/book*') ? 'active' : '' }}">
                        <i class="fas fa-angle-right nav-icon"></i>
                        <p>Кітаптар</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.category.index') }}" class="nav-link {{ Request::is('admin/category*') ? 'active' : '' }}">
                        <i class="fas fa-angle-right nav-icon"></i>
                        <p>Бөлімдер</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.tag.index') }}" class="nav-link {{ Request::is('admin/tag*') ? 'active' : '' }}">
                        <i class="fas fa-angle-right nav-icon"></i>
                        <p>Ілмектер</p>
                    </a>
                </li>
            </ul>

        </li>

    </ul>
</nav>
<!-- /.sidebar-menu -->