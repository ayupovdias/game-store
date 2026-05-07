<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Genre;
class UserController extends Controller
{
    public function index(){
        $users=User::with("role")->get();
        $roles=Role::all();
        $genres=Genre::all();
        return view("admin.users.index", compact("users", "roles", "genres"));
    }
    public function changeRole(Request $request, User $user){
        $request->validate([
            "role_id"=>"integer|exists:roles,id"
        ]);
        $user->update([
            "role_id"=>$request->input("role_id")
        ]);
        return redirect(route('admin.users.index'))->with("updated", "The user's role was changed successfully");
    }
}
