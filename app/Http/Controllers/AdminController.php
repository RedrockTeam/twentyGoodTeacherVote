<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Model\Candidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller {
    public function login() {
        return view('admin.login');
    }
    public function verify() {
        $username = Input::only('username');
        $pwd = Input::only('pwd');
        if($username['username'] == 'admin' && $pwd['pwd'] == '&nD$.cOgI.') {
            Session::put('role', 'admin');
        } else {
            return redirect()->back();
        }
        return redirect(route('admin/index'));
    }

    public function index() {
        if(Session::get('role') != 'admin') {
            return redirect(route('admin/login'));;
        }
        $candidate = Candidate::all();
        return view('admin.index')->with('candidate', $candidate);
    }

    public function edit() {
        if(Session::get('role') != 'admin') {
            return redirect(route('admin/login'));;
        }
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
        if(Session::get('role') != 'admin') {
            return redirect(route('admin/login'));;
        }
        $data = Input::all();
        Candidate::where('id', '=', $data['id'])->update($data['data']);
        return ['status' => 200, 'info' => '成功'];
    }

    public function add() {
        if(Session::get('role') != 'admin') {
            return redirect(route('admin/login'));;
        }
        return view('admin.add');
    }

    public function addCandidate(Request $request) {
        if(Session::get('role') != 'admin') {
            return redirect(route('admin/login'));;
        }
        $data = Input::all();
        if (!$request->hasFile('photo')) {
            return redirect()->back()->withErrors('图片不存在', 'info');
        }
        $photo = $request->file('photo');
        $filename = time().'.jpg';
        $photo->move(public_path('upload'), $filename);
        $data['avatar'] = $filename;
        Candidate::create($data);
        return redirect()->back()->withErrors('成功', 'info');
    }

}
