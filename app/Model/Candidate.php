<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model {
    protected $table = 'candidate';
    protected $fillable = ['name', 'pc_vote', 'wechat_vote', 'student_vote', 'teacher_vote', 'introduce', 'status', 'unit'];

}