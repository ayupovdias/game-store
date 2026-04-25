@extends("layouts.yield")
@section("title", "Edit game")
@section("content")
    <form method="post" action="{{route('games.update',$game->id)}}">
        @csrf
        @method("PUT")
        @if($errors->has('title'))
           <div class="alert alert-danger">{{$errors->first()}}</div>
        @endif
        <div class="row">
            <label class="label-control">Title
                <input class="form-control" value="{{$game->title}}" name="title">
            </label>
        </div>
        @if($errors->has('description'))
            <div class="alert alert-danger">{{$errors->first('description')}}</div>
        @endif
        <div class="row">
            <label class="label-control">Description
                <input class="form-control" value="{{$game->description}}" name="description">
            </label>
        </div>
        @if($errors->has('genre_id'))
            <div class="alert alert-danger">{{$errors->first('genre_id')}}</div>
        @endif
        <div class="row">
            <label class="label-control">Genre
                 <select class="form-control" name="genre_id">
                     @foreach($genres as $genre)
                     <option value="{{$genre->id}}" @if($genre->id==$game->genre->id) selected @endif>{{$genre->name}}</option>
                         @endforeach
                 </select>
            </label>
        </div>
        @if($errors->has('price'))
            <div class="alert alert-danger">{{$errors->first('price')}}</div>
        @endif
        <div class="row">
            <label class="label-control">Price
                <input class="form-control" value="{{$game->price}}" name="price">
            </label>
        </div>
        <button class="btn btn-warning">Update</button>
        <a class="btn btn-secondary" href="{{route('games.index')}}">Back</a>
    </form>

@endsection
