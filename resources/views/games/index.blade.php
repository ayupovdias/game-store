<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Advertisement</title>
    <script
        src="https://code.jquery.com/jquery-4.0.0.js"
        integrity="sha256-9fsHeVnKBvqh3FB2HYu7g2xseAZ5MlN6Kz/qnkASV8U="
        crossorigin="anonymous">

    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
<div class="container">

    @include("layout.header")

    <div class="mt-3 d-flex align-items-center">
        <img src="images/poster.png" class="w-25 h-50">
        <button style="margin-top:-450px" class="btn btn-outline-danger x">X</button>
        <div>
            <div class="row mt-3">
                <h3 class="fw-bold col-1">ID</h3>
                <h3 class="fw-bold col-2">Title</h3>
                <h3 class="fw-bold col-6">Description</h3>
                <h3 class="fw-bold col-2">Genres</h3>
                <h3 class="fw-bold col-1">Price</h3>
            </div>
            @foreach($games as $game)
                <div class="row my-2">
                    <h4 class="col-1">{{$game->id}}</h4>
                    <h4 class="col-2">{{$game->title}}</h4>
                    <h4 class="col-6">{{$game->description}}</h4>
                    <h4 class="col-2">{{$game->genres}}</h4>
                    <h4 class="col-1">{{$game->price}}</h4>
                </div>
            @endforeach
        </div>
    </div>
    @include("layout.footer")
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous">
</script>
<script>
    $(document).ready(function () {
        $(".x").click(function () {
            $("img").hide("fast")
            $(this).slideUp("fast")
        })
    })
</script>

</body>
</html>
