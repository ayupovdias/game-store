@extends("layouts.yield")


@section("title")
     {{$game->title}}
@endsection

@section("content")
    @include("layouts.header")
    @if(session()->has('updated'))
        <div class="alert alert-warning">{{session()->get('updated')}}</div>
    @endif
    @if(session()->has("created"))
        <div class="alert alert-success">{{session()->get('created')}}</div>
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
    <hr>
    @if(sizeof($comments)==0)
        <h3 class="fw-bold text-secondary">No comments</h3>
    @else
        <div class="row">
            <h3>All comments from users</h3>
            <div class="col-1 fw-bold">Id</div>
            <div class="col-7 fw-bold">Comment</div>
            <div class="col-4 fw-bold">Author</div>
        </div>
        @foreach($comments as $comment)
          <div class="row">
              <div class="col-1">{{$comment->id}}</div>
              <div class="col-7">{{$comment->text}}</div>
              <div class="col-4">{{$comment->user->name}}</div>
          </div>
        @endforeach
    @endif
    <hr>
    <h4 class="text-secondary fw-bold">Add a new comment</h4>
    <form method="post" action="{{route('comments.store')}}">
        @csrf
        <input type="hidden" value="{{$game->id}}" name="game_id">
        @if($errors->has("text"))
            <div class="alert alert-danger">{{$errors->first()}}</div>
        @endif
        <div class="row">
        <label class="label-control">Comment
            <textarea class="form-control" rows="5" name="text"></textarea>
        </label>
        </div>
        <button class="btn btn-success">Send</button>
    </form>
    <a class="btn btn-secondary" href="{{route('games.index')}}">Back</a>
    @include("layouts.footer")
@endsection


