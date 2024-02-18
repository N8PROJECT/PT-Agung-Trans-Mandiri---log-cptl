<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function add_user(Request $request){
        $rules = [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'status' => 'required',
            'role' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return back()->withErrors($validator);
        }
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->status = $request->status;
        $user->role = $request->role;

        $user->save();

        return redirect()->back();
    }

    public function edit_user(Request $request){
        $request->validate([
            'id' => 'required|exists:users,id',
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|string',
            'status' => 'required|in:active,inactive',
            'role' => 'required|in:admin,courier',
            'permissions' => 'array'
        ]);

        $user = User::findOrFail($request->id);

        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->has('password')) {
            $user->password = bcrypt($request->password);
        }
        $user->status = $request->status;
        $user->role = $request->role;
        $user->permissions = json_encode($request->permissions);

        $user->save();

        return redirect()->back()->with('success', 'User updated successfully!');
    }

    public function delete_user($id){
        $user = User::find($id);
        $user->delete();

        return redirect()->back();
    }
}
