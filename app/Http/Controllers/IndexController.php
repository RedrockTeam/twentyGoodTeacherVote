<?php

namespace App\Http\Controllers;

use App\Model\Ad;
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
    public function detail() {
        return view('detail');
    }

    //投票页面
    public function vote() {
        if(!Auth::check()) {
            return view('vote');
        }
        $user = Auth::user();
        $morality = UserVote::where('user_id', '=', $user->id)
                            ->where('type', '=', '1')
                            ->where('created_at', '=', date('Y-m-d', time()))
                            ->where('candidate_type', '=', '1')
                            ->get();
        $youngth = UserVote::where('user_id', $user->id)
                            ->where('type', '1')
                            ->where('created_at', date('Y-m-d', time()))
                            ->where('candidate_type', '2')
                            ->get();
        return view('vote')->with('morality', $morality)->with('youngth', $youngth);
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
