@extends("layouts.yield")


@section("title")
     {{$game->title}}
@endsection

@section("content")
    @include("layouts.header")
    @if(session()->has('updated'))
        <div class="alert alert-warning">{{session()->get('updated')}}</div>
    @endif
    <div></div>
<div class="row">
    <div class="col-1 fw-bold">
        Id
    </div>
    <div class="col-2 fw-bold">
        Title
    </div>
    <div class="col-5 fw-bold">
        Description
    </div>
    <div class="col-2 fw-bold">
        Genre
    </div>
    <div class="col-2 fw-bold">
        Price
    </div>
</div>
    <div class="row">
        <div class="col-1">{{$game->id}}</div>
        <div class="col-2">{{$game->title}}</div>
        <div class="col-5">{{$game->description}}</div>
        <div class="col-2">{{$game->genre->name}}</div>
        <div class="col-2">{{$game->price}}</div>
    </div>
    <a class="btn btn-secondary" href="{{route('games.index')}}">Back</a>
    @include("layouts.footer")
@endsection


