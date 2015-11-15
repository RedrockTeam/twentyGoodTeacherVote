<?php

namespace App\Http\Controllers;

use App\Model\Candidate;
use App\Model\Nominate;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class NominateController extends Controller {

    public function candidate() {
        if(!Auth::check()) {
            return redirect()->back()->withErrors('请先登录', 'info');
        }
        $input = Input::all();
        $num = Candidate::where('name', '=', $input['norm_name'])->where('unit', '=', $input['norm_part'])->count();
        if(!$num) {
            $data = [
                'name'      => $input['norm_name'],
                'introduce' => $input['norm_rea'],
                'unit'      => $input['norm_part']
            ];
            $candidate = Candidate::Create($data);
            $nominate = [
                'candidate_id' => $candidate->id,
                'username'     => $input['name'],
                'unit'         => $input['part'],
                'usernum'      => Session::get('uid')
            ];
            Nominate::Create($nominate);
            return redirect()->back()->withErrors('提名成功', 'info');
        } else {
            return redirect()->back()->withErrors('已有提名', 'info');
        }

    }
}
