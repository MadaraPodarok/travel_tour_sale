<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto mr-3">


        <div class="topbar-divider d-none d-sm-block"></div>
        <li class="nav-item mx-md-2">
            <a href="{{ route('home') }}" class="nav-link active">Главная страница</a>
        </li>
        <li class="nav-item mx-md-2">
            <a href="{{route('detail_list')}}" class="nav-link">Туристические путевки</a>
        </li>
        <li class="nav-item mx-md-2">
            <a href="{{route('user-dashboard')}}" class="nav-link">Доска</a>
        </li>
        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">

            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{Auth::user()->username}}</span>
                @if(empty(Auth::user()->avatar))
                    <img src="https://ui-avatars.com/api/?name={{ Auth::user()->username }}" height="60" class="rounded-circle" alt="">
                @else
                    <img
                        src="{{ Storage::url('avatars/'.Auth::user()->id .'/' .Auth::user()->avatar) }}"
                        class="img-profile rounded-circle" alt=""
                    />
                @endif
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Выход
                </a>
            </div>
        </li>

    </ul>

</nav>
<!-- End of Topbar -->
