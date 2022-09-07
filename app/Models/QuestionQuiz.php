<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionQuiz extends Model
{
    protected $fillable = ['question_id', 'quizzes_id'];

    use HasFactory;

    // public function question() {

    // }

    // public function quiz() {

    // }
}
