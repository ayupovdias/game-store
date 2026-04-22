@extends("layouts.app")
@section("content")
    <form method="post" action="{{route('games.update', $game->id)}}" enctype="multipart/form-data">
        @csrf
        @method("PUT")
        <div class="row">
            @error("title")
            <div class="alert alert-danger mt-4">{{$errors->first()}}</div>
            @enderror
            <label class="label-control">Title
                <input class="form-control" value="{{$game->title}}" name="title">
            </label>
        </div>
        <div class="row">
            @error("description")
            <div class="alert alert-danger mt-4">{{$errors->first("description")}}</div>
            @enderror
            <label class="label-control">Description
                <textarea class="form-control" rows="5" name="description">{{$game->description}}</textarea>
            </label>
        </div>
        <div class="row">
            @error("genre_id")
            <div class="alert alert-danger mt-4">{{$errors->first('genre_id')}}</div>
            @enderror
            <label class="label-control">Genre
                 <select name="genre_id" class="form-control">
                     @foreach($genres as $genre)
                         <option value="{{$genre->id}}" @if($genre->id==$game->genre->id) selected @endif>{{$genre->name}}</option>
                     @endforeach
                 </select>
            </label>
        </div>
        <div class="row">
            @error("price")
            <div class="alert alert-danger mt-4">{{$errors->first('price')}}</div>
            @enderror
            <label class="label-control">Price
                <input class="form-control" value="{{$game->price}}" name="price">
            </label>
            <div class="row">
                @if($game->image)
                    <div class="mb-2">
                        <img src="{{asset('storage/'.$game->image)}}" width="500px" alt="Game cover">
                    </div>
                 @endif
            <label class="label-control">File
                <input class="form-control" type="file" name="image" value="{{$game->image}}" required >
            </label>
            </div>
        </div>

        <div class="mt-2">
        <input type="submit" value="Update" class="btn btn-warning">
        <a href="{{route('games.index')}}" class="btn btn-secondary">Back</a>
        </div>
    </form>
 @endsection
