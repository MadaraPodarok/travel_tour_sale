<!-- navbar -->
<div class="container">
    <nav class="row navbar navbar-expand-lg navbar-light bg-white">
        <a href="{{ route('home') }}" class="navbar-brand">
            <img src="{{ asset('images/logo/Logo_travel.svg') }}" alt="logo_travel" />
        </a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navb">
            <ul class="navbar-nav ml-auto mr-3">
                @if(Auth::check() && Auth::user()->roles === 'ADMIN')
                    <li class="nav-item mx-md-2">
                        <a href="{{ route('admin_dashboard') }}" class="nav-link active">Панель Администратора</a>
                    </li>
                @endif
                <li class="nav-item mx-md-2">
                    <a href="{{ route('home') }}" class="nav-link active">Главная страница</a>
                </li>
                <li class="nav-item mx-md-2">
                    <a href="{{route('detail_list')}}" class="nav-link">Туристические путевки</a>
                </li>
                <li class="nav-item mx-md-2">
                    <a href="{{route('user-dashboard')}}" class="nav-link">Доска</a>
                </li>
{{--                <li class="nav-item dropdown mx-md-2">--}}
{{--                    <a href="#" class="nav-link dropdown-toggle" id="navbardrop" data-toggle="dropdown">--}}
{{--                        Сервисы--}}
{{--                    </a>--}}
{{--                    <div class="dropdown-menu">--}}
{{--                        <a href="#" class="dropdown-item">Ссылка №1</a>--}}
{{--                        <a href="#" class="dropdown-item">Ссылка №2</a>--}}
{{--                        <a href="#" class="dropdown-item">Ссылка №3</a>--}}
{{--                    </div>--}}
{{--                </li>--}}
{{--                <li class="nav-item mx-md-2">--}}
{{--                    <a href="#" class="nav-link">Отзывы</a>--}}
{{--                </li>--}}
            </ul>
            @auth
                <a class="user-info" href="{{ route('user-edit',Auth::user()->id) }}">
                    <span>{{ Auth::user()->username }}</span>
                    <img
                        src="{{ Storage::url('avatars/'.Auth::user()->id .'/' .Auth::user()->avatar) }}"
                        class="rounded-circle mr-1" style="width: 50px" alt=""
                    />
                </a>
            @endauth

            @guest
                <!-- mobile button -->
                <form action="" class="form-inline d-sm-block d-md-none">
                    <button class="btn btn-login my-2 my-sm-0 px-4" type="button"
                            onclick="event.preventDefault(); location.href='{{ url('register') }}';">
                        Регистрация
                    </button>
                    <button class="btn btn-login my-2 my-sm-0 px-4" type="button"
                        onclick="event.preventDefault(); location.href='{{ url('login') }}';">
                        Вход
                    </button>
                </form>

                <!-- desktop button -->
                <form action="" class="form-inline my-2 my-lg-0 d-none d-md-block">
                    <button class="btn btn-login" type="button"
                            onclick="event.preventDefault(); location.href='{{ url('register') }}';">
                        Регистрация
                    </button>
                    <button class="btn btn-login" type="button"
                        onclick="event.preventDefault(); location.href='{{ url('login') }}';">
                        Вход
                    </button>
                </form>
            @endguest

            @auth
                <form class="form-inline d-sm-block d-md-none"
                    action="{{ url('logout') }}"
                    method="POST">
                    @csrf
                    <button class="btn btn-login my-2 my-sm-0 px-4" type="submit">
                        Выход
                    </button>
                </form>

                <!-- desktop button -->
                <form class="form-inline my-2 my-lg-0 d-none d-md-block"
                    action="{{ url('logout') }}" method="POST">
                    @csrf
                    <button class="btn btn-login" type="submit">
                        Выход
                    </button>
                </form>
            @endauth

        </div>
    </nav>
</div>
