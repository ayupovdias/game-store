
@extends("layouts.yeild")
@section("title", "All games")
@section("content")
    @include("layouts.header")

    <div class="m-3">
       <!-- <img src="images/poster.png" class="w-25 h-50">
        <button style="margin-top:-450px" class="btn btn-outline-danger x">X</button>-->
        <div>
            @if(sizeof($games)==0)
                <h2 class="fw-bold text-center text-secondary">There is no game in the main page</h2>
            @else
            <div class="row mt-3">
                <h3 class="fw-bold col-1">ID</h3>
                <h3 class="fw-bold col-2">Title</h3>
                <h3 class="fw-bold col-6">Description</h3>
                <h3 class="fw-bold col-2">Genre</h3>
                <h3 class="fw-bold col-1">Price</h3>
            </div>
            @foreach($games as $game)
                <div class="row my-2">
                    <h4 class="col-1">{{$game->id}}</h4>
                    <h4 class="col-2">{{$game->title}}</h4>
                    <h4 class="col-6">{{$game->description}}</h4>
                    <h4 class="col-2">{{$game->genre->name}}</h4>
                    <h4 class="col-1">{{$game->price}}</h4>
                </div>
            @endforeach
            @endif
        </div>
    </div>
    @include("layouts.footer")
@endsection
<!--<script>
    $(document).ready(function () {
        $(".x").click(function () {
            $("img").hide("fast")
            $(this).slideUp("fast")
        })
    })-->

