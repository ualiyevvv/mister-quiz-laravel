<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function rank()
    {
        $max = 1500;
        $xp = $this->xp;
        $rank = "rank";
        if ($xp < 1500 ) {
            $rank = "Quiz Aprentice";
        } else if ($xp >= 1500 && $xp < 5000) {
            $max = 5000;
            $rank = "Average Quizer";
        } else if ($xp >= 5000 && $xp < 10000) {
            $max = 10000;
            $rank = "Epic Quizer";
        } else {
            $max = -1;
            $rank = "Quiz Master";
        }
        return [$rank, $max];
    }

    public function stats($category) {
        $answers = explode("/", $category);
        $correct_ans = $answers[0];
        $total_ans = $answers[1];

        if ($total_ans == 0 || $total_ans < $correct_ans) {
            $perc = 0;
        } else {
            $perc = ($correct_ans / $total_ans) * 100;
            $perc = number_format($perc, 2, '.', ''); 
        }

        return [$answers, $perc];
    }

    public function getCorrectAnswers() {
        $correct[0] = $this->stats($this->art)[0][0];
        $correct[1] = $this->stats($this->geography)[0][0];
        $correct[2] = $this->stats($this->history)[0][0];
        $correct[3] = $this->stats($this->science)[0][0];
        $correct[4] = $this->stats($this->sports)[0][0];

        $sum = 0;
        for($i=0; $i<sizeof($correct); $i++) {
            $sum += $correct[$i];
        }
        return $sum;
    }

    public function quizes()
    {
        return $this->hasMany(Quiz::class);
    }
}
