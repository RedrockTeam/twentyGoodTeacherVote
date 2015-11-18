<?php

namespace App\Http\Controllers;

use App\Model\Candidate;
use App\Model\UserVote;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class VoteController extends Controller
{

    public function update() {
        $data = Input::all();
        $user = Auth::user();
        $vote = UserVote::where('user_id', $user->id)
                ->where('type', '1')
                ->where('created_at', date('Y-m-d', time()))
                ->where('candidate_type', $data)//todo
                ->count();
        if($vote) {
            return ['status' => 403, 'info' => '你今天已经在网站投过票了'];
        }
        if(count($data['data']) < 7 || count($data['data']) > 10) {
            return ['status' => 403, 'info' => '候选人必须7-10人'];
        }
        //键值键名反转去重
        foreach($data['data'] as $key => $value) {
            $tmp[$value] = $key;
        }
        foreach($tmp as $key => $value) {
            $result[$value] = $key;
        }
        if(count($result) < 7) {
            return ['status' => 403, 'info' => '候选人必须7-10人'];
        }
        Candidate::whereIn('id', $result)->increment('pc_vote');

        UserVote::create(['user_id' => $user->id, 'type' => '1']);
        return ['status' => 200, 'info' => '投票成功'];
    }

    public function weixinUpdate() {
        $data = Input::all();
        $user = Auth::user();
        $vote = UserVote::where('user_id', $user->id)
            ->where('type', '1')
            ->where('created_at', date('Y-m-d', time()))
            ->where('candidate_type', $data)//todo
            ->count();
        if($vote) {
            return ['status' => 403, 'info' => '你今天已经在小帮手投过票了'];
        }
        if(count($data['data']) < 7 || count($data['data']) > 10) {
            return ['status' => 403, 'info' => '候选人必须7-10人'];
        }
        //键值键名反转去重
        foreach($data['data'] as $key => $value) {
            $tmp[$value] = $key;
        }
        foreach($tmp as $key => $value) {
            $result[$value] = $key;
        }
        if(count($result) < 7) {
            return ['status' => 403, 'info' => '候选人必须7-10人'];
        }
        Candidate::whereIn('id', $result)->increment('pc_vote');
        return ['status' => 200, 'info' => '投票成功'];
    }
}
