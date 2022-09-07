<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use Illuminate\Support\Facades\Auth;


/*
TODO:
валидация ответов квиза не только на фронте но и контроллерах

*/
class QuizController extends Controller
{
    public function start_quiz() {
        $user_id = Auth::user()->id;
        $quiz = Quiz::where('user_id', $user_id)
                    ->where('completed', 0)
                    ->first();

        if ($quiz == null) {
            $quiz = Quiz::create(['user_id' => Auth::user()->id]);
            $questions = $quiz->createQuiz();
        } else {
            $questions = $quiz->getQuestions();
        }
        
        return view('quiz', compact('quiz','questions'));
    }

    public function end_quiz(Request $request) {
        if ($request->isMethod('get')) {
            return redirect('/')->withErrors("The wrong way. Be carefully");
        }
        // dd($request);
        //get quiz from DB
        $quiz = Quiz::where('id', $request->quiz)
                    ->get()
                    ->first();

        if ($quiz->completed == 1) {
            return redirect('/')->withErrors("wrong way");
        }

        $quiz->setCompleted();

        $results = $quiz->computation_result($request->all());

        $quiz->save();


        return view('result', ['results' => $results]);
    }


}
