<header class="mt-3 p-5 position-relative bg-body-tertiary">
    <h2 class="d-inline">Game Store</h2>

    <a href="{{ route('games.index') }}" class="ms-5 text-decoration-none">Home page</a>
    <a href="{{ route('statistics') }}" class="ms-3 text-decoration-none">Statistics</a>
    <a href="{{ route('news') }}" class="ms-3 text-decoration-none">News</a>
    <a href="{{route('games.create')}}" class="ms-3 text-decoration-none">Add a game</a>
    <nav class="navbar bg-body-tertiary w-25 d-inline-block float-end">
        <div class="container-fluid">
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </nav>
</header>
