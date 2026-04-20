<!DOCTYPE html>
<html>
<head>
    <title>Create a game Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
<div class="container">

    <form method="post" action="{{route('games.store')}}" class="w-50 mx-auto border rounded-5 mt-5 p-3">
        <h3 class="fw-bold text-center">Create a game</h3>
        @if($errors->any())
            @foreach($errors->all() as $error)
                <div class="alert alert-danger">
                    {{$error}}
                </div>
            @endforeach
        @endif
        @csrf
        <div class="row">
        <label class="label-control">Title
            <input class="form-control my-1" name="title">
        </label>
        </div>
        <div class="row">
            <label class="label-control">Description
                <textarea rows="6" class="form-control my-1" name="description"></textarea>
            </label>
        </div>
        <div class="row">
            <label class="label-control">Genres
                <input class="form-control my-1" name="genres">
            </label>
        </div>
        <div class="row">
            <label class="label-control">Price
                <input class="form-control my-1" name="price">
            </label>
        </div>

        <button class="btn btn-success mt-2">Create</button>
        <a href="{{route('games.index')}}" class="btn btn-primary mt-2 float-end">Back</a>

    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>
</html>
