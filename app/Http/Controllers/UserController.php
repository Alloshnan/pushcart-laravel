<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('type')->get()->toArray();
        return $users;
    }

    public function store(Request $request)
    {
        $user = new User([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'user_type_id' => $request->input('user_type_id'),
        ]);
        $user->save();

        return response()->json('User created!');

    }

    public function show(User $user)
    {
        return response()->json($user);
    }

    public function update(Request $request, User $user)
    {
        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'user_type_id' => $request->input('user_type_id'),
        ]);

        return response()->json('User updated!');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return response()->json('User deleted!');
    }
}
