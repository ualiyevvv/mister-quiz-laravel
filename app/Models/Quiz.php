<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Quiz extends Model
{
    use HasFactory;

    protected $fillable = ['completed', 'user_id', 'score'];

    public function questions()
    {
        return $this->belongsToMany(Question::class);
    }

    public function getQuestions()
    {
        $questions_quiz = QuestionQuiz::where('quizzes_id', $this->id)->get()->toArray();
        $result = [];
        foreach ($questions_quiz as $q) {
            array_push($result, Question::where('id', $q['question_id'])->first());
        }
        return $result;
    }

    public function createQuiz() {
        $categories = ['History', 'Art', 'Geography', 'Science', 'Sports'];
        $questions = [];

        //getting 4 random questions from each category
        foreach ($categories as $cat) {
            $query_questions = Question::inRandomOrder()
                                        ->where('category', $cat)
                                        ->limit(4)
                                        ->with('answers')
                                        ->get();
            foreach ($query_questions as $qq) {
                array_push($questions, $qq);

                $question_quiz = QuestionQuiz::create([
                    'question_id' => $qq->id,
                    'quizzes_id' => $this->id
                ]);
            }
        }

        shuffle($questions);

        return $questions;
    }

    public function setCompleted() {
        //makes quiz completed
        $this->completed = 1;
    }

    public function computation_result($request) {
        $results = array('overall' => 0, 'art' => 0, 'geography' => 0, 'history' => 0, 'science' => 0, 'sports' => 0);
        $xp = 0;

        //figuring out which answers are correct
        foreach ($request as $key => $value) {
            if (is_numeric($key)) {
                $correct_answer = Answer::where('question_id', $key)->where('correct', 1)->get()->first()['id'];
                if ($correct_answer == $value) {
                    $question = Question::where('id', $key)->get()->first();
                    $cat = strtolower($question->category);
                    $results["$cat"]++;
                    $results['overall']++;
                    $xp += $question->xp;
                }
            }
        }

        //adding categories score to the user
        foreach ($results as $key => $value) {
            if ($key != 'overall') {
                [$correct, $total] = [explode("/", Auth::user()[$key])[0], explode("/", Auth::user()[$key])[1]];
                Auth::user()[$key] = ($correct + $value) . "/" . ($total + 4);
            }
        }

        //adding xp to the user
        Auth::user()['xp'] += $xp;

        //save changes in DB
        Auth::user()->save();
        
        return $results;
    }
}
