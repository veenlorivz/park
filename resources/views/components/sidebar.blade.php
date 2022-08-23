<style>
    .logout-button {
        outline: none;
        border: none;
        background-color: transparent;
        padding: 0 0 0 2px;
    }

    .logout-button:hover {
        color: red;
    }
</style>
<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link @yield('index')" aria-current="page" href="/dashboard">
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
                <a class="nav-link @yield('account')" href="/dashboard/account/">
                    <span data-feather="user"></span>
                    My Account
                </a>
            </li>
            <li class="nav-item">
                <form class="nav-link text-danger logout" action="/logout" method="POST" style="cursor: pointer"
                    id="myForm">
                    @method('POST')
                    @csrf
                    <button class="d-flex flex-row align-items-center logout-button" onclick="submitForm()">
                        <span data-feather="log-out"></span>
                        Logout
                    </button>
                </form>
            </li>
        </ul>
    </div>
</nav>
<script type="text/javascript">
    // function submitForm(){
    //     document.querySelector("myform").submit();
    // }
</script>
