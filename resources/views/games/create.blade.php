@extends("layouts.yield")
@section("title", "Add a new page")
@section("content")
    <div class="row">
        <div class="col-12 col-md-8 col-lg-6 mx-auto mt-5">
            <form method="post" action="{{route('games.store')}}" class="border rounded-4 p-4 shadow-sm bg-body-tertiary">
                <h3 class="fw-bold text-center mb-4">Create a game</h3>
                @csrf
                @if($errors->has('title'))
                    <div class="alert alert-danger">{{$errors->first()}}</div>
                @endif
                <div class="mb-3">
                    <label class="form-label w-100">{{__("game.title")}}
                        <input class="form-control mt-1" name="title">
                    </label>
                </div>

                @if($errors->has("description"))
                    <div class="alert alert-danger">{{$errors->first('description')}}</div>
                @endif
                <div class="mb-3">
                    <label class="form-label w-100">{{__("game.description")}}
                        <textarea rows="6" class="form-control mt-1" name="description"></textarea>
                    </label>
                </div>

                @if($errors->has("genre_id"))
                    <div class="alert alert-danger">{{$errors->first('genre_id')}}</div>
                @endif
                <div class="mb-3">
                    <label class="form-label w-100">{{__("game.genre")}}
                        <select class="form-select mt-1" name="genre_id">
                            @foreach($genres as $genre)
                                <option value="{{$genre->id}}">{{$genre->name}}</option>
                            @endforeach
                        </select>
                    </label>
                </div>

                @if($errors->has("price"))
                    <div class="alert alert-danger">{{$errors->first("price")}}</div>
                @endif
                <div class="mb-4">
                    <label class="form-label w-100">{{__("game.price")}}
                        <input class="form-control mt-1" name="price">
                    </label>
                </div>

                <div class="d-flex justify-content-between align-items-center">
                    <button class="btn btn-success">{{__("game.create")}}</button>
                    <a href="{{route('games.index')}}" class="btn btn-primary">{{__("game.back")}}</a>
                </div>
            </form>
        </div>
    </div>
@endsection
