@extends("layouts.yield")
@section("title", "All games")
@section("content")
    @include("layouts.header")

    <div class="my-4">
        @if(session()->has("created"))
            <div class="alert alert-success">{{session()->get("created")}}</div>
        @endif
        @if(session()->has("deleted"))
            <div class="alert alert-danger">{{session()->get("deleted")}}</div>
        @endif

        <div>
            @if(sizeof($games)==0)
                <h2 class="fw-bold text-center text-secondary">There is no game in the main page</h2>
            @else
                <div class="row mt-3 d-none d-lg-flex bg-light p-2 rounded fw-bold">
                    <div class="col-1">#</div>
                    <div class="col-2">{{__('game.title')}}</div>
                    <div class="col-3">{{__('game.description')}}</div>
                    <div class="col-1">{{__('game.genre')}}</div>
                    <div class="col-1">{{__('game.price')}}</div>
                    <div class="col-4 text-center">{{__('game.buttons')}}</div>
                </div>

                @foreach($games as $game)
                    <div class="row align-items-center my-3 p-3 p-lg-2 border rounded border-lg-0 shadow-sm shadow-lg-none">
                        <div class="col-12 col-lg-1 mb-2 mb-lg-0"><span class="fw-bold d-lg-none">ID: </span>{{$game->id}}</div>
                        <div class="col-12 col-lg-2 mb-2 mb-lg-0 fw-bold fs-5 fs-lg-6">{{$game->title}}</div>
                        <div class="col-12 col-lg-3 mb-2 mb-lg-0 text-truncate"><span class="fw-bold d-lg-none">Desc: </span>{{$game->description}}</div>
                        <div class="col-6 col-lg-1 mb-3 mb-lg-0"><span class="badge bg-secondary">{{$game->genre->name}}</span></div>
                        <div class="col-6 col-lg-1 mb-3 mb-lg-0 fw-bold text-success text-end text-lg-start">${{$game->price}}</div>

                        <div class="col-12 col-lg-4 d-flex flex-wrap gap-2 justify-content-lg-center">
                            <a class="btn btn-sm btn-primary flex-fill flex-lg-grow-0" href="{{route('games.show',$game->id)}}">{{__('game.more_details')}}</a>
                            @can("update",$game)
                            <a class="btn btn-sm btn-warning flex-fill flex-lg-grow-0" href="{{route('games.edit',$game->id)}}">{{__('game.edit')}}</a>
                            @endcan
                            @can("delete", $game)
                            <form class="d-inline flex-fill flex-lg-grow-0" action="{{route('games.destroy', $game->id)}}" method="post" onsubmit="return agreement()">
                                @method("DELETE")
                                @csrf
                                <input type="submit" value="{{__("game.delete")}}" class="btn btn-sm btn-danger w-100">
                            </form>
                            @endcan
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
    @include("layouts.footer")
@endsection
@section("script")
    function agreement(){
    return confirm("Are you sure you want to delete this game?")
    }
@endsection
