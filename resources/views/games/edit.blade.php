@extends("layouts.yield")
@section("title", "Edit game")
@section("content")
    <div class="row">
        <div class="col-12 col-md-8 col-lg-6 mx-auto mt-5">
            <form method="post" action="{{route('games.update',$game->id)}}" class="border rounded-4 p-4 shadow-sm bg-body-tertiary">
                <h3 class="fw-bold text-center mb-4">Edit game</h3>
                @csrf
                @method("PUT")

                @if($errors->has('title'))
                    <div class="alert alert-danger">{{$errors->first()}}</div>
                @endif
                <div class="mb-3">
                    <label class="form-label w-100">{{__("game.title")}}
                        <input class="form-control mt-1" value="{{$game->title}}" name="title">
                    </label>
                </div>

                @if($errors->has('description'))
                    <div class="alert alert-danger">{{$errors->first('description')}}</div>
                @endif
                <div class="mb-3">
                    <label class="form-label w-100">{{__("game.description")}}
                        <input class="form-control mt-1" value="{{$game->description}}" name="description">
                    </label>
                </div>

                @if($errors->has('genre_id'))
                    <div class="alert alert-danger">{{$errors->first('genre_id')}}</div>
                @endif
                <div class="mb-3">
                    <label class="form-label w-100">{{__("game.genre")}}
                        <select class="form-select mt-1" name="genre_id">
                            @foreach($genres as $genre)
                                <option value="{{$genre->id}}" @if($genre->id==$game->genre->id) selected @endif>{{$genre->name}}</option>
                            @endforeach
                        </select>
                    </label>
                </div>

                @if($errors->has('price'))
                    <div class="alert alert-danger">{{$errors->first('price')}}</div>
                @endif
                <div class="mb-4">
                    <label class="form-label w-100">{{__("game.price")}}
                        <input class="form-control mt-1" value="{{$game->price}}" name="price">
                    </label>
                </div>
                @if($errors->has("image"))
                    <div class="alert alert-danger">{{$errors->first("image")}}</div>
                @endif
                <div class="row mb-2">
                <label class="label-control">Select an image
                    <input type="file" class="form-control" name="image" value="{{$game->image}}">
                </label>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <button class="btn btn-warning">{{__("game.update")}}</button>
                    <a class="btn btn-secondary" href="{{route('games.index')}}">{{__("game.back")}}</a>
                </div>
            </form>
        </div>
    </div>
@endsection
