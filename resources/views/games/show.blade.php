@extends("layouts.yield")
@section("title")
    {{$game->title}}
@endsection

@section("content")
    @include("layouts.header")

    <div class="mt-4 container-fluid px-0">
        @if(session()->has('updated'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{session()->get('updated')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if(session()->has("created"))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{session()->get('created')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if(session()->has("deleted"))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{session()->get('deleted')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card mb-5 shadow-sm">
            <div class="card-body">
                <div class="row mb-3 border-bottom pb-2 d-none d-md-flex text-muted">
                    <div class="col-md-2 fw-bold">Avatar</div>
                    <div class="col-md-2 fw-bold">{{__("game.title")}}</div>
                    <div class="col-md-3 fw-bold">{{__("game.description")}}</div>
                    <div class="col-md-2 fw-bold">{{__("game.genre")}}</div>
                    <div class="col-md-2 fw-bold">{{__("game.price")}}</div>
                    <div class="col-md-1 fw-bold">Author</div>
                </div>

                <div class="row align-items-center gy-3 gy-md-0">
                    <div class="col-12 col-md-2 text-center text-md-start">
                        <img src="{{asset('storage/images/games/'.$game->image)}}" alt="{{$game->title}}" class="img-fluid rounded" style="max-height: 150px; object-fit: cover;">
                    </div>
                    <div class="col-12 col-md-2 text-center text-md-start fw-bold fs-5 fs-md-6">
                        {{$game->title}}
                    </div>
                    <div class="col-12 col-md-3">
                        <span class="d-md-none text-muted fw-bold">Desc: </span>
                        {{$game->description}}
                    </div>
                    <div class="col-12 col-sm-6 col-md-2">
                        <span class="d-md-none text-muted fw-bold">Genre: </span>
                        <span class="badge bg-primary">{{$game->genre->name}}</span>
                    </div>
                    <div class="col-12 col-sm-6 col-md-2">
                        <span class="d-md-none text-muted fw-bold">Price: </span>
                        <span class="text-success fw-bold">${{$game->price}}</span>
                    </div>
                    <div class="col-12 col-md-1">
                        <span class="d-md-none text-muted fw-bold">Author: </span>
                        {{$game->user->name}}
                    </div>
                </div>
            </div>
        </div>

        @if(sizeof($comments) == 0)
            <h3 class="fw-bold text-secondary mb-4 fs-4">{{__("comment.no_comment")}}</h3>
        @else
            <h3 class="mb-3 fs-4">{{__('comment.comments')}}</h3>
            <div class="list-group mb-4 shadow-sm">
                @foreach($comments as $comment)
                    <div class="list-group-item p-3">
                        <div class="d-flex w-100 justify-content-between align-items-start">
                            <div>
                                <h6 class="mb-1 fw-bold">{{$comment->user->name}} <small class="text-muted fw-normal ms-2">#{{$comment->id}}</small></h6>
                                <p class="mb-0 mt-2">{{$comment->text}}</p>
                            </div>

                            @can("delete", $comment)
                                <form method="post" action="{{route('comments.destroy', $comment->id)}}" onsubmit="return agreement()">
                                    @csrf
                                    @method("DELETE")
                                    <button type="submit" class="btn btn-close" aria-label="Delete comment"></button>
                                </form>
                            @endcan
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        <div class="card bg-body-tertiary shadow-sm">
            <div class="card-body">
                <h5 class="card-title fw-bold mb-3">{{__("comment.add_comment")}}</h5>
                <form method="post" action="{{route('comments.store')}}">
                    @csrf
                    <input type="hidden" value="{{$game->id}}" name="game_id">

                    @if($errors->has("text"))
                        <div class="alert alert-danger">{{$errors->first()}}</div>
                    @endif

                    <div class="mb-3">
                        <textarea class="form-control" rows="4" name="text" placeholder="Write your comment here..." required></textarea>
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-between">
                        <button type="submit" class="btn btn-success">{{__('comment.send')}}</button>
                        <a class="btn btn-secondary" href="{{route('games.index')}}">{{__("game.back")}}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @include("layouts.footer")
@endsection

