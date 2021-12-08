<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class SettingController extends Controller
{
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view ('user.edit', compact('user'));
    }
    public function update(Request $request,$id)
    {
        $user = User::findOrFail($id);
        $data = $request->validate([
            'name' => 'required|max:120',
            'email' => 'required|email:dns'
        ]);
        $user->update($data);
        return redirect ('/setting/'.auth()->user()->id)->with('succes','Profile berhasil diupdate');
    }
}
