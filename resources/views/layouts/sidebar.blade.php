<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="#">
            <img src="{{ asset('images/icon/dsk.png') }}" alt="Cool Admin" />
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                <li>
                    <a class="js-arrow" href="/dashboard">
                        <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                </li>
                @can('admin')
                    <li>
                        <a class="js-arrow" href="/dashboard/fakultas">
                            <i class="fas fa-tachometer-alt"></i>Fakultas</a>
                    </li>
                    <li>
                        <a class="js-arrow" href="/dashboard/soal">
                            <i class="fas fa-tachometer-alt"></i>Soal Ujian</a>
                    </li>
                    <li>
                        <a class="js-arrow" href="/dashboard/seleksi">
                            <i class="fas fa-tachometer-alt"></i>Seleksi</a>
                    </li>
                @endcan
            </ul>
        </nav>
    </div>
</aside>
