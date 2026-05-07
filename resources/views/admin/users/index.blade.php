@extends("admin.layouts.yield")
@section("title", "All users")

@section("content")
    @include("admin.layouts.header")
    @if(session()->has("updated"))
    <div class="alert alert-warning">
        {{session()->get("updated")}}
    </div>
    @endif
    @if(sizeof($users)==0)
        <h3 class="text-secondary text-center">No users</h3>
    @else
        <table class="table table-striped">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Change role</th>
            </tr>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role->name}}</td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Change role
                            </button>
                            <ul class="dropdown-menu">
                                @foreach($roles as $role)
                                    <li>
                                        <form method="post" action="{{route('admin.users.change-role', $user->id)}}">
                                            @csrf
                                            @method("PUT")
                                            <input type="hidden" value="{{$role->id}}" name="role_id">
                                            <button class="dropdown-item">{{$role->name}}</button>
                                        </form>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </td>
                </tr>
            @endforeach
        </table>
    @endif
@endsection
