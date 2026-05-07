<nav class="navbar navbar-expand-lg bg-body-tertiary p-3 my-3">
    <div class="container-fluid">

        <a class="navbar-brand active fw-bold" href="{{route('games.index')}}">Home page</a>

        <ul class="navbar-nav fs-6 me-auto mb-2 mb-lg-0">
            <li class="nav-item"><a class="nav-link active" href="{{route('admin.games.index')}}">Game management</a></li>
            <li class="nav-item"><a class="nav-link active" href="{{route('admin.games.create')}}">Create a game</a></li>
            <li class="nav-item"><a class="nav-link active" href="{{route('admin.comments.index')}}">Comment management</a></li>
            <li class="nav-item"><a class="nav-link active" href="{{route('admin.users.index')}}">User management</a></li>
            <li class="nav-item"><a class="nav-link active" href="{{route('admin.news.index')}}">News management</a></li>
        </ul>

        <div class="d-flex align-items-center gap-3">

            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    Select a genre
                </button>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="{{route('admin.games.index')}}">All genres</a></li>
                    @foreach($genres as $genre)
                        <li><a class="dropdown-item" href="{{route('admin.games.genre.genre', $genre->id)}}">{{$genre->name}}</a></li>
                    @endforeach
                </ul>
            </div>

            <form method="post" action="{{route('logout')}}" class="m-0">
                @csrf
                <button class="btn btn-outline-primary">Logout</button>
            </form>

        </div>
    </div>
</nav>
