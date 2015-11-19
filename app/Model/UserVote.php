<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserVote extends Model
{
    protected $table = 'user_vote';
    protected $fillable = ['user_id', 'type', 'candidate_id', 'candidate_type'];
}
