@extends("layouts.yeild")
@section("title", "Add a new page")
@section("content")
    <form method="post" action="{{route('games.store')}}" class="w-50 mx-auto border rounded-5 mt-5 p-3">
        <h3 class="fw-bold text-center">Create a game</h3>
        @csrf
        @if($errors->has('title'))

            <div class="mt-3 alert alert-danger">{{$errors->first()}}</div>

        @endif
        <div class="row">
        <label class="label-control">Title
            <input class="form-control my-1" name="title">
        </label>
        </div>
        @if($errors->has("description"))

            <div class="mt-3 alert alert-danger">{{$errors->first('description')}}</div>

        @endif
        <div class="row">
            <label class="label-control">Description
                <textarea rows="6" class="form-control my-1" name="description"></textarea>
            </label>
        </div>
        @if($errors->has("genre_id"))
            <div class="mt-3 alert alert-danger">{{$errors->first('genre_id')}}</div>
        @endif
        <div class="row">
            <label class="label-control">Genre
                <select class="form-control" name="genre_id">
                @foreach($genres as $genre)
                   <option value="{{$genre->id}}">{{$genre->name}}</option>
                @endforeach
                </select>
            </label>
        </div>
        @if($errors->has("price"))
            <div class="mt-3 alert alert-danger">{{$errors->first("price")}}</div>
        @endif
        <div class="row">

            <label class="label-control">Price
                <input class="form-control my-1" name="price">
            </label>
        </div>

        <button class="btn btn-success mt-2">Create</button>
        <a href="{{route('games.index')}}" class="btn btn-primary mt-2 float-end">Back</a>

    </form>
@endsection
