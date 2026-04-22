@extends("layouts.app")
@section("content")
    @include("layout.header")

    @if(session()->has("updated"))
        <div class="alert alert-warning my-2">{{session()->get("updated")}}</div>
    @endif

<div class="row">
        <div class="fw-bold col-1">
            Id
        </div>
        <div class="fw-bold col-3">
            Title
        </div>
        <div class="fw-bold col-4">
            Description
        </div>
        <div class="fw-bold col-3">
            Genres
        </div>
        <div class="fw-bold col-1">
            Price
        </div>

</div>
    <div class="row">
        <div class="col-1">{{$game->id}}</div>
        <div class="col-3">{{$game->title}}</div>
        <div class="col-4">{{$game->description}}</div>
        <div class="col-3">{{$game->genre->name}}</div>
        <div class="col-1">{{$game->price}}</div>
        @if($game->image)
            <img src="{{asset('storage/'.$game->image)}}" alt="{{$game->title}}" width="100">
        @else
            <p>No image</p>
        @endif
    </div>
    <a href="{{route('games.index')}}" class="btn btn-secondary">All Games</a>
    @include("layout.footer")
@endsection
