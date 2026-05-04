<nav class="navbar navbar-expand-lg mt-3 p-3 position-relative bg-body-tertiary rounded">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold" href="#">Game Store</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarContent">
            <div class="navbar-nav me-auto mb-2 mb-lg-0">
                <a href="{{ route('games.index','changelocale='.app()->getLocale()) }}" class="nav-link">{{__('header.home_page')}}</a>
                <a href="{{ route('statistics','changelocale='.app()->getLocale()) }}" class="nav-link">{{__("header.statistics")}}</a>
                <a href="{{ route('news') }}" class="nav-link">{{__('header.news')}}</a>
                @auth
                    @can("create", \App\Models\Game::class)
                    <a href="{{route('games.create','changelocale='.app()->getLocale())}}" class="nav-link">{{__("header.create_game")}}</a>
                    @endcan
                    <a href="{{route('dashboard')}}" class="nav-link">{{__("header.dashboard")}}</a>
                    <a href="{{route('profile.edit','changelocale='.app()->getLocale())}}" class="nav-link">{{__("header.profile")}}</a>
                    @if(auth()->user()->role_id==\App\Models\Role::ADMIN)
                        <a href="{{route('admin.games.index')}}" class="nav-link">Admin Panel</a>
                    @endif
                @endauth
            </div>

            <div class="d-flex align-items-center gap-2 mt-3 mt-lg-0">
                @auth
                    <form action="{{route('logout')}}" method="POST" class="m-0">
                        @csrf
                        <button class="btn btn-outline-primary btn-sm">{{__('header.logout')}}</button>
                    </form>
                @endauth
                @guest
                    <a href="{{route('login')}}" class="btn btn-outline-primary btn-sm">{{__('header.login')}}</a>
                    <a href="{{route('register')}}" class="btn btn-primary btn-sm">{{__('header.register')}}</a>
                @endguest
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle btn-sm" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{strtoupper(app()->getLocale())}}
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        @foreach(config('app.languages') as $lang=>$language)
                            <li><a class="dropdown-item" href="{{url()->current()}}?changelocale={{$lang}}">{{strtoupper($lang)}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>
