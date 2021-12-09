<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class ChangePasswordController extends Controller
{
    public function index($id){
        
        $user = User::findOrFail($id);
        return view ('user.pass', compact('user'));
    }
    
    public function change(Request $request, $id){
        $user = User::findOrFail($id);
        $validation = $request->validate([
            'oldPass' => 'required',
            'password' => 'min:8|different:oldPass',
        ]);
        if(Hash::check($request->oldPass, $user->password)){
            $user->fill([
                'password' => Hash::make($request->password)
            ])->save();
            return redirect ('/setting/'.$user->id)->with('succes','Password berhasil diupdate');
        }
        // if(Hash::check($request->password, $user->password)){
        //     $user->fill([
        //         'oldPass' => Hash::make($request->password)
        //     ])->save();
        //     $request->session()->flash('succes','Password berhasil diupdate');
        //     return redirect('/');
        // }else{
        //     return redirect('/');
        // }
        
    }
}
