<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Nominate extends Model {
    protected $table = 'nominate';
    protected $fillable = ['candidate_id', 'username', 'usernum', 'unit'];
}
