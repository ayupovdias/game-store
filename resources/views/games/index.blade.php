@extends("layouts.yield")
@section("title", "All games")
@section("content")
    @include("layouts.header")

    <div class="m-3">
        @if(session()->has("created"))
            <div class="alert alert-success">{{session()->get("created")}}</div>
        @endif
        @if(session()->has("deleted"))
           <div class="alert alert-danger">{{session()->get("deleted")}}</div>
        @endif
        <!-- <img src="images/poster.png" class="w-25 h-50">
         <button style="margin-top:-450px" class="btn btn-outline-danger x">X</button>-->
        <div>
            @if(sizeof($games)==0)
                <h2 class="fw-bold text-center text-secondary">There is no game in the main page</h2>
            @else
                <div class="row mt-3">
                    <h3 class="fw-bold col-1">ID</h3>
                    <h3 class="fw-bold col-2">Title</h3>
                    <h3 class="fw-bold col-3">Description</h3>
                    <h3 class="fw-bold col-2">Genre</h3>
                    <h3 class="fw-bold col-1">Price</h3>
                    <h3 class="fw-bold col-3">Buttons</h3>
                </div>
                @foreach($games as $game)
                    <div class="row my-2">
                        <h4 class="col-1">{{$game->id}}</h4>
                        <h4 class="col-2">{{$game->title}}</h4>
                        <h4 class="col-3">{{$game->description}}</h4>
                        <h4 class="col-2">{{$game->genre->name}}</h4>
                        <h4 class="col-1">{{$game->price}}</h4>
                        <div class="col-3">
                            <a class="btn btn-primary"
                                href="{{route('games.show',$game->id)}}">
                                More details
                            </a>
                            <a class="btn btn-warning"
                                href="{{route('games.edit',$game->id)}}">
                                Edit
                            </a>
                            <form class="d-inline" action="{{route('games.destroy', $game->id)}}" method="post" onsubmit="return agreement()">
                                @method("DELETE")
                                @csrf
                            <input type="submit" value="Delete" class="btn btn-danger">
                            </form>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
    @include("layouts.footer")
@endsection
@section("script")
function agreement(){
    return confirm("Are you sure you want to delete this game?")
}
@endsection
<!--<script>
    $(document).ready(function () {
        $(".x").click(function () {
            $("img").hide("fast")
            $(this).slideUp("fast")
        })
    })-->

