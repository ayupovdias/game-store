<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Edit page</title>
</head>
<body>
<div class="container">
    <form method="post" action="{{route('games.update', $game->id)}}">
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
            @error("genres")
            <div class="alert alert-danger mt-4">{{$errors->first('genres')}}</div>
            @enderror
            <label class="label-control">Genres
                <input class="form-control" value="{{$game->genres}}" name="genres">
            </label>
        </div>
        <div class="row">
            @error("price")
            <div class="alert alert-danger mt-4">{{$errors->first('price')}}</div>
            @enderror
            <label class="label-control">Price
                <input class="form-control" value="{{$game->price}}" name="price">
            </label>
        </div>
        <div class="mt-2">
        <input type="submit" value="Update" class="btn btn-warning">
        <a href="{{route('games.index')}}" class="btn btn-secondary">Back</a>
        </div>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>
</html>
