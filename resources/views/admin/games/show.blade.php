@extends("admin.layouts.yield")
@section("title")
    {{$game->title}}
@endsection

@section("content")
    @include("admin.layouts.header")

    <div class="mt-4">
        @if(session()->has('updated'))
            <div class="alert alert-warning">{{session()->get('updated')}}</div>
        @endif
        @if(session()->has("created"))
            <div class="alert alert-success">{{session()->get('created')}}</div>
        @endif
        @if(session()->has("deleted"))
            <div class="alert alert-danger">{{session()->get('deleted')}}</div>
        @endif
        <div class="card mb-5">
            <div class="card-body">
                <div class="row mb-2 border-bottom pb-2 d-none d-md-flex">
                    <div class="col-1 fw-bold">#</div>
                    <div class="col-2 fw-bold">{{__("game.title")}}</div>
                    <div class="col-4 fw-bold">{{__("game.description")}}</div>
                    <div class="col-2 fw-bold">{{__("game.genre")}}</div>
                    <div class="col-2 fw-bold">{{__("game.price")}}</div>
                    <div class="col-1">Author</div>
                </div>
                <div class="row align-items-center">
                    <div class="col-1"><span class="d-md-none fw-bold">ID: </span>{{$game->id}}</div>
                    <div class="col-2 fw-bold">{{$game->title}}</div>
                    <div class="col-4"><span class="d-md-none fw-bold">Desc: </span>{{$game->description}}</div>
                    <div class="col-2"><span class="badge bg-primary">{{$game->genre->name}}</span></div>
                    <div class="col-2">${{$game->price}}</div>
                    <div class="col-1"><span class="d-md-none fw-bold">Author </span>{{$game->user->name}}</div>
                </div>
            </div>
        </div>

        @if(sizeof($comments)==0)
            <h3 class="fw-bold text-secondary mb-4">{{__("comment.no_comment")}}</h3>
        @else
            <h3 class="mb-3">{{__('comment.comments')}}</h3>
            <div class="list-group mb-4">
                @foreach($comments as $comment)
                    <div class="list-group-item">
                        <div class="d-flex w-100 justify-content-between">
                            <h6 class="mb-1 fw-bold">{{$comment->user->name}}</h6>
                            <small class="text-muted">#{{$comment->id}}</small>
                        </div>
                        @can("delete", $comment)
                            <form class="d-inline float-end" method="post"
                                  action="{{route('comments.destroy', $comment->id)}}"
                                  onsubmit="return onDelete('comment')">
                                @csrf
                                @method("DELETE")
                                <button class="btn btn-close"></button>
                            </form>
                        @endcan
                        <p class="mb-1">{{$comment->text}}</p>

                    </div>
                @endforeach
            </div>
        @endif

        <div class="card bg-body-tertiary">
            <div class="card-body">
                <h5 class="card-title fw-bold">{{__("comment.add_comment")}}</h5>
                <form method="post" action="{{route('comments.store')}}">
                    @csrf
                    <input type="hidden" value="{{$game->id}}" name="game_id">
                    @if($errors->has("text"))
                        <div class="alert alert-danger">{{$errors->first()}}</div>
                    @endif
                    <div class="mb-3">
                        <textarea class="form-control" rows="4" name="text"></textarea>
                    </div>
                    <div class="d-flex justify-content-between">
                        <button class="btn btn-success">{{__('comment.send')}}</button>
                        <a class="btn btn-secondary" href="{{route('admin.games.index')}}">{{__("game.back")}}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @include("layouts.footer")
@endsection
