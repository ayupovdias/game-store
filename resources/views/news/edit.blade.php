@extends("layouts.yield")
@section("title", "Edit news")
@section("content")
    <div class="row">
        <div class="col-12 col-md-8 col-lg-6 mx-auto mt-5">
            <form method="post" action="{{route('news.update', $news->id)}}" class="border rounded-4 p-4 shadow-sm bg-body-tertiary" enctype="multipart/form-data">
                <h3 class="fw-bold text-center mb-4">Edit news</h3>
                @csrf
                @method("PUT")
                @if($errors->has('title'))
                    <div class="alert alert-danger">{{$errors->first()}}</div>
                @endif
                <div class="mb-3">
                    <label class="form-label w-100">Title
                        <input class="form-control mt-1" name="title" value="{{$news->title}}">
                    </label>
                </div>

                @if($errors->has("content"))
                    <div class="alert alert-danger">{{$errors->first('content')}}</div>
                @endif
                <div class="mb-3">
                    <label class="form-label w-100">Content
                        <textarea rows="6" class="form-control mt-1" name="content">{{$news->content}}</textarea>
                    </label>
                </div>
                @if($errors->has("image"))
                    <div class="alert alert-danger">{{$errors->first("image")}}</div>
                @endif
                <div class="row mb-3">
                    <label class="label-control">Select an image
                        <input type="file" name="image" class="form-control">
                    </label>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <button class="btn btn-success">Add</button>
                    <a href="{{route('news.index')}}" class="btn btn-secondary">{{__("game.back")}}</a>
                </div>
            </form>
        </div>
    </div>
@endsection

