<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function show(string $id)
    {
        $user = User::where('id', $id)->first()
            ->load(['recruits.user']);
        $recruits = $user->recruits->sortByDesc('created_at');

        return view('users.show', [
            'user' => $user,
            'recruits' => $recruits,
        ]);
    }
}