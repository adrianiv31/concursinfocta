<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentAnswer extends Model
{
    //

    protected $fillable = [
        'user_id', 'quiz_id', 'question_id', 'answer_id', 'answer'

    ];

    public function stdent()
    {

        return $this->belongsTo('App\User');

    }
    public function quiz()
    {

        return $this->belongsTo('App\Quiz');

    }
    public function question()
    {

        return $this->belongsTo('App\Question');

    }
    public function raspuns()
    {

        return $this->belongsTo('App\Answer');

    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
