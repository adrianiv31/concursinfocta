<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
//    trebuie adaugat camp pentru utilizatorul care a creat intrebarea
    public $directory = '/images/';
    //
    protected $fillable = ['intrebare', 'grade_id', 'section_id', 'path', 'type'];

    public function section()
    {

        return $this->belongsTo('App\Section');

    }

    public function grade()
    {

        return $this->belongsTo('App\Grade');

    }

    public function answers()
    {

        return $this->hasMany('App\Answer');
    }


    public function getPathAttribute($value)
    {
        return $this->directory . $value;
    }

    public function quizzes(){

        return $this->belongsToMany('App\Quiz');

    }
}
