<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function index() {
        $quiz = "";
        if (Auth::check()) {
            $user_id = Auth::user()->id;
            $quiz = Quiz::where('user_id', $user_id)
                        ->where('completed', 0)
                        ->first();
            if ($quiz == null) {
                $quiz = "Start ";
            } else {
                $quiz = "Continue ";
            }
        }
        
        return view('index', compact('quiz'));
    }

}
