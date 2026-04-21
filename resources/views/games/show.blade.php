<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="fw-bold col-1">
            Id
        </div>
        <div class="fw-bold col-3">
            Title
        </div>
        <div class="fw-bold col-4">
            Description
        </div>
        <div class="fw-bold col-3">
            Genres
        </div>
        <div class="fw-bold col-1">
            Price
        </div>
    </div>
    <div class="row">
        <div class="col-1">{{$game->id}}</div>
        <div class="col-3">{{$game->title}}</div>
        <div class="col-4">{{$game->description}}</div>
        <div class="col-3">{{$game->genres}}</div>
        <div class="col-1">{{$game->price}}</div>
    </div>
    <a href="{{route('games.index')}}" class="btn btn-secondary">All Games</a>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>
</html>
