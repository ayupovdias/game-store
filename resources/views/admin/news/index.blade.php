@extends("admin.layouts.yield")
@section("title", "News management")

@section("content")
    @include("admin.layouts.header")
    @if(session()->has("deleted"))
        <div class="alert alert-danger">{{session()->get("deleted")}}</div>
    @endif
    @if($news->isEmpty())
        <h3 class="text-center text-secondary">No news</h3>
    @else
        <table class="table table-striped">
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Content</th>
                <th>Author</th>
                <th>Added at</th>
                <th>Changed at</th>
                <th>Delete button</th>
            </tr>
            @foreach($news as $one)
                <tr>
                    <td>{{$one->id}}</td>
                    <td>{{$one->title}}</td>
                    <td>{{\Illuminate\Support\Str::limit($one->content, 75)}}</td>
                    <td>{{$one->user->name}}</td>
                    <td>{{$one->created_at}}</td>
                    <td>{{$one->updated_at}}</td>
                    <td>
                        <form method="post" action="{{route("admin.news.destroy", $one->id)}}" onsubmit="return onDelete('news')">
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
