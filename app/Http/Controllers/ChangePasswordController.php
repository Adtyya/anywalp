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
}
