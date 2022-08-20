<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link @yield('index')" aria-current="page" href="/dashboard/parkir/">
                    <span data-feather="home"></span>
                    Kendaraan Terparkir
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @yield('arsip')" href="/dashboard/arsip/">
                    <span data-feather="archive"></span>
                    Arsip Parkir
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="user"></span>
                    My Account
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link text-danger" href="#">
                    <span data-feather="log-out"></span>
                    Logout
                </a>
            </li>
        </ul>
    </div>
</nav>
