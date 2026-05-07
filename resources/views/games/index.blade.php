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
                <h2 class="fw-bold text-center text-secondary">No game</h2>
            @else
                <div class="row">
                @foreach($games as $game)
                        <div class="col-lg-3 col-md-6 col-sm-12">
                 <div class="card mt-2">
                     <img src="{{asset("storage/images/games/".$game->image)}}" alt="not loaded" class="card-img-top">
                     <div class="card-header fw-bold fs-4">
                         {{$game->title}}
                     </div>
                     <div class="card-body fs-5">
                          {{\Illuminate\Support\Str::limit($game->description, 150)}}
                         <span class="d-block"><span class="fw-bold">Genre:</span> {{$game->genre->name}}</span>
                         <span class="d-block fw-bold">Price: <span class="text-success">{{$game->price}} тг</span></span>
                         <span><span class="fw-bold">Author:</span> {{$game->user->name}}</span>
                         <div class="mt-2">
                             <a href="{{route('games.show', $game->id)}}" class="btn btn-primary">More details</a>
                             @can("update", $game)
                             <a href="{{route('games.edit', $game->id)}}" class="btn btn-warning">Edit</a>
                             @endcan
                             @can("delete", $game)
                             <form method="post" action="{{route('games.destroy', $game->id)}}" class="d-inline" onsubmit="return onDelete('game')">
                                 @csrf
                                 @method("DELETE")
                                 <button class="btn btn-danger">Delete</button>
                             </form>
                             @endcan
                         </div>
                     </div>
                 </div>
                        </div>
                @endforeach
                </div>
            @endif
        </div>
    </div>
    @include("layouts.footer")
@endsection

