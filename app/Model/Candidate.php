<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model {
    protected $table = 'candidate';
    protected $fillable = ['avatar', 'name',
        'pc_vote', 'wechat_vote',
        'student_vote', 'teacher_vote',
        'introduce', 'status',
        'unit', 'gender',
    'birthday', 'worktime',
    'major_level',
    'level','degree', 'grade'];

}
