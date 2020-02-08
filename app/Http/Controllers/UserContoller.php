<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\User;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this>middleware('auth');
    }

    public function profile()
    {
        return response()->json(['user' => Auth::user()], 200);
    }

    public function allUsers()
    {
        return response()->json(['users' => User::all()], 200);
    }

    public function singleUser($id)
    {
        try {
            $user = User::findOrFail($id);

            return response()->json(['user' => $user], 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Usuário não encontrado!']);
        }
    }

    //
}
