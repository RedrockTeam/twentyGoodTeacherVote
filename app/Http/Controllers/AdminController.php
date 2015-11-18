<?php

namespace App\Http\Controllers;

use App\Model\Candidate;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{

    public function index() {
        $candidate = Candidate::all();
        return view('admin.index')->with('candidate', $candidate);
    }

    public function edit() {
        $data = Input::all();
        $validator = Validator::make(
            $data['data'],
            [
                'name' => 'required',
                'pc_vote' => 'required|numeric',
                'wechat_vote' => 'required|numeric',
                'student_vote' => 'required|numeric',
                'teacher_vote' => 'required|numeric',
                'introduce' => 'required',
                'unit' => 'required',
            ]
        );
        if($validator->fails()) {
            return ['status' => 403, 'info' => '数据不合理'];
        }
        Candidate::where('id', '=', $data['id'])->update($data['data']);
        return ['status' => 200, 'info' => '成功'];
    }

    public function operationCandidate() {
        $data = Input::all();
        Candidate::where('id', '=', $data['id'])->update($data['data']);
        return ['status' => 200, 'info' => '成功'];
    }

    public function addCandidate() {
        $data = Input::all();
        $photo = Request::file('file');
        if (!$photo->isValid()) {
            return redirect()->back()->withErrors('info', '图片不存在');
        }
        $filename = time().'jpg';
        $photo->move(public_path(), $filename);
        $data['avatar'] = $filename;
        Candidate::create($data);
        return redirect()->back()->withErrors('info', '成功');
    }

}
