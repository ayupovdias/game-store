@extends("admin.layouts.yield")
@section("title","Admin Panel: all games")

@section("content")
@include('admin.layouts.header')
    <table class="table table-striped mt-3">
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Description</th>
            <th>Genre</th>
            <th>Price</th>
            <th>Author</th>
            <th>Functions</th>
        </tr>
        @foreach($games as $game)
          <tr>
              <td>{{$game->id}}</td>
              <td>{{$game->title}}</td>
              <td>{{\Illuminate\Support\Str::limit($game->description, $limit=35)}}</td>
              <td>{{$game->genre->name}}</td>
              <td>${{$game->price}}</td>
              <td>{{$game->user->name}}</td>
              <td>
                  <a href="{{route('games.show', $game->id)}}" class="btn btn-primary">Show more...</a>
                  <a href="{{route('games.edit', $game->id)}}" class="btn btn-warning">Edit</a>
                  <form method="post" action="{{route('games.destroy', $game->id)}}" class="d-inline" onSubmit="return onDelete('game')">
                      @method("DELETE")
                      @csrf
                      <button class="btn btn-danger">Delete</button>
                  </form>
              </td>
          </tr>
        @endforeach
    </table>
@endsection
