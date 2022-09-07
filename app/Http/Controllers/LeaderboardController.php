<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LeaderboardController extends Controller
{
    public function index()
    {
        $users = User::orderByDesc('xp')
            ->limit(10)
            ->get();

        return view('leaderboard', compact('users'));
    }
}
