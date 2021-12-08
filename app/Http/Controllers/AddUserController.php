<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AddUserController extends Controller
{
    public function index()
    {
        $data = User::where('role', 0)->paginate(10);
        return view ('post.user', [
            'user' => $data
        ]);
    }
    public function store(Request $request)
    {
        $userValidated = $request->validate([
            'name' => 'required|max:120',
            'role' => 'required',
            'password' => 'required|confirmed|min:7',
            'email' => 'required|email:dns'
        ]);
        $userValidated['password'] = bcrypt($userValidated['password']);
        User::create($userValidated);
        return redirect ('/add');
        
    }
    public function destroy($id)
    {
        $user = User::findOrfail($id);
        $user->delete();
        return redirect ('/add');
    }
}
