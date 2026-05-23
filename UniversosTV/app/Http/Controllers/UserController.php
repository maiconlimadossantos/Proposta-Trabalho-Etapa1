<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function store(Request $UserRequest)
    {
        User::create($UserRequest->validated());
        return redirect()->route('users.index')->with('success', 'Usuario criado com sucesso!');
    }
    public function Update(Request $UserRequest, $idUser)
    {
        $user = User::find($idUser);
        $user->Update(['User'=>$UserRequest->User]);
    }
    public function destroy($idUser)
    {
        $user = User::find($idUser);
        $user->delete();
    }
}
