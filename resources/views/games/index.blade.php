@extends("layouts.app")
@section("content")
    @include("layout.header")

    @if(session()->has("created"))
        <div class="alert alert-success my-2">{{session()->get("created")}}</div>
    @endif

    @if(session()->has("deleted"))
        <div class="alert alert-danger my-2">{{session()->get("deleted")}}</div>
    @endif

    <div class="row mt-3">
        <h3 class="fw-bold col-1">ID</h3>
        <h3 class="fw-bold col-2">Title</h3>
        <h3 class="fw-bold col-4">Description</h3>
        <h3 class="fw-bold col-2">Genres</h3>
        <h3 class="fw-bold col-1">Price</h3>
        <h3 class="fw-bold col-2">Buttons</h3>
    </div>
    @foreach($games as $game)
        <div class="row my-2">
            <h4 class="col-1">{{$game->id}}</h4>
            <h4 class="col-2">{{$game->title}}</h4>
            <h4 class="col-4">{{$game->description}}</h4>
            <h4 class="col-2">{{$game->genre->name}}</h4>
            <h4 class="col-1">{{$game->price}}</h4>
            <div class="col-2">
                <a href="{{route('games.show', $game->id)}}" class="btn btn-primary">Details</a>
                <a href="{{route('games.edit', $game->id)}}" class="btn btn-warning">Edit</a>
                <form method="post" class="d-inline" action="{{route('games.destroy', $game)}}" onsubmit="return agreement()">
                    @method("DELETE")
                    @csrf
                    <input type="submit" value="Delete" class="btn btn-danger"  >
                </form>
            </div>
            @if($game->image)
                <img src="{{asset('storage/'.$game->image)}}" alt="{{$game->title}}">
            @else
        <p>No image</p>
            @endif
        </div>
    @endforeach

    @include("layout.footer")
    @endsection
