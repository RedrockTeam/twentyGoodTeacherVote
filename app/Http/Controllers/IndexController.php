<?php

namespace App\Http\Controllers;

use App\Model\Ad;
use App\Model\Candidate;
use App\Model\UserVote;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Ixudra\Curl\Facades\Curl;

class IndexController extends Controller {

    private $verify_url = 'http://hongyan.cqupt.edu.cn/RedCenter/Api/Handle/login';

    //首页
    public function index() {
        $ad = Ad::all();
        $test = 'dsaf';
        return view('index')->with('ad', $ad)->with('test', $test);
    }

    //提名页面
    public function norm() {
        return view('norm');
    }

    //
    public function detail(Request $request) {
        $id = $request->id;
        $data = Candidate::find($id);
        return view('detail')->with('data', $data);
    }

    //投票页面
    public function vote() {
        $morality = Candidate::where('type', '1')->get();
        $youngth = Candidate::where('type', '2')->get();
        if(!Auth::check()) {
            return view('vote')->with('morality', $morality)->with('youngth', $youngth)->with('morality_vote', '')->with('youngth_vote', '');
        }
        $user = Auth::user();
        $morality_voted = UserVote::where('user_id', '=', $user->id)
                            ->where('type', '=', '1')
                            ->where('created_at', '=', date('Y-m-d', time()))
                            ->where('candidate_type', '=', '1')
                            ->lists('candidate_id')
                            ->toArray();
        $youngth_voted = UserVote::where('user_id', $user->id)
                            ->where('type', '1')
                            ->where('created_at', date('Y-m-d', time()))
                            ->where('candidate_type', '2')
                            ->lists('candidate_id')
                            ->toArray();
        foreach($morality as $value) {
            if(in_array($value->id, $morality_voted)){
                $value->vote = 1;
                $morality_voted_peo[] = $value->id;
            } else {
                $value->vote = 0;
            }
        }
        if(!isset($morality_voted_peo))  {
           $morality_voted_peo = "";
        } else {
           $morality_voted_peo = json_encode($morality_voted_peo);
        }
        if(!$morality_voted_peo) {
            $morality_voted_peo = "";
        }
        foreach($youngth as $value) {
            if(in_array($value->id, $youngth_voted)){
                $value->vote = 1;
                $youngth_voted_peo[] = $value->id;
            } else {
                $value->vote = 0;
            }
        }
        if(!isset($youngth_voted_peo))  {
            $youngth_voted_peo = "";
        } else {
            $youngth_voted_peo = json_encode($youngth_voted_peo);
        }
        return view('vote')->with('morality', $morality)->with('youngth', $youngth)->with('morality_vote', $morality_voted_peo)->with('youngth_vote', $youngth_voted_peo);
    }

    //
    public function talk() {
        return view('talk');
    }

    //登录
    public function login() {
        $data = Input::all();
        $result = $this->__CurlPost($this->verify_url, ['user' => $data['user'], 'password' => $data['password']]);
        if($result['status'] == 200) {
            $user = User::firstOrCreate(['user_id' => $result['userInfo']['id']]);
            Auth::loginUsingId($user->id);
            Session::put('uid', $result['userInfo']['id']);
        } else {
            return redirect('/')->withInput(['user' => $data['user']])->withErrors(['info' => '账号或密码错误!'], 'login');
        }
        if(Auth::check()) {
            return redirect()->back();
        } else
            return 'error';
    }

    public function logout() {
        Auth::logout();
        return redirect(route('index'));
    }
    /**
     * 通过post方式获取数据, 未测试233
     * @param string $url
     * @param array $data
     * @return array|mixed
     */
    private function __CurlPost($url, $data = array()){

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // post数据
        curl_setopt($ch, CURLOPT_POST, 1);
        // post的变量
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

        //运行curl，结果以json形式返回
        $res = curl_exec($ch);
        curl_close($ch);
        //取出openid
        return json_decode($res, true);
    }
}
