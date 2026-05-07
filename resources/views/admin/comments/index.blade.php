@extends("admin.layouts.yield")
@section("title", "All comments")

@section("content")
    @include('admin.layouts.header')

    @if(session()->has("deleted"))
        <div class="alert alert-danger">{{session()->get("deleted")}}</div>
    @endif
    @if(sizeof($comments)==0)
        <h3 class="text-center text-secondary">No comments</h3>
    @else
        <table class="table table-striped">
            <tr>
                <th>#</th>
                <th>Contents</th>
                <th>Game title</th>
                <th>Author</th>
                <th>Function</th>
            </tr>
            @foreach($comments as $comment)
                <tr>
                <td>{{$comment->id}}</td>
                <td>{{$comment->text}}</td>
                <td>{{$comment->game->title}}</td>
                <td>{{$comment->user->name}}</td>
                <td>
                    <form action="{{route('admin.comments.destroy', $comment->id)}}" onSubmit="return onDelete('comment')" method="post" class="d-inline">
                        @csrf
                        @method("DELETE")
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </td>
                </tr>
            @endforeach
        </table>
    @endif
@endsection
