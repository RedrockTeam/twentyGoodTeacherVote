<?php

namespace App\Http\Controllers;

use App\Model\Ad;
use App\Model\Candidate;
use App\Model\Nominate;
use App\Model\UserVote;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Ixudra\Curl\Facades\Curl;

class IndexController extends Controller {

    private $verify_url = 'http://hongyan.cqupt.edu.cn/RedCenter/Api/Handle/login';

    //首页
    public function index() {
        $ad = Ad::orderBy('id', 'desc')->limit(10)->get();
        return view('index')->with('ad', $ad);
    }

    //提名页面
    public function norm() {
        if(Auth::check()) {
            $user = Auth::user();
            $candidate = Nominate::where('usernum', $user['user_id'])->join('candidate', 'nominate.candidate_id', '=', 'candidate.id')->select('nominate.unit as n_unit', 'nominate.username as n_name', 'candidate.name as c_name', 'candidate.unit as c_unit', 'introduce')->get();
        } else {
            $candidate = null;
        }
        return view('norm')->with('candidate', $candidate);
    }

    //排行榜
    public function rank() {
        $mo_online = DB::select("select (pc_vote + wechat_vote) AS vote from candidate
				where type = '1'
				ORDER BY
					vote DESC limit 10");
        $mo_first = isset($mo_online[2]->vote) ? $mo_online[2]->vote : 0;
        $mo_end = isset($mo_online[9]->vote) ? $mo_online[9]->vote : 100000;
        $mo =  DB::select("SELECT
	name,
	pc_vote,
	wechat_vote,
	online_score,
	student_score,
	teacher_score,
	student_vote,
	teacher_vote,
	(
		online_score + student_score + teacher_score
	) AS total_score
FROM
	(
		SELECT
			name,
			pc_vote,
			wechat_vote,
			student_vote,
			teacher_vote,
			(
				@score := CASE
				WHEN a.vote >= $mo_first THEN
					20
				ELSE
					CASE
				WHEN a.vote < $mo_end THEN
					16
				ELSE
					18
				END
				END
			) AS online_score,
			(student_vote / 34 * 30) AS student_score,
			(teacher_vote / 14 * 50) AS teacher_score
		FROM
			(
				SELECT
					name,
					(pc_vote + wechat_vote) AS vote,
					pc_vote,
					wechat_vote,
					student_vote,
					teacher_vote
				FROM
					candidate
				where type = '1'
				ORDER BY
					vote DESC
			) a,
			(SELECT(@score := 0)) AS b
	) c");
        $yo_online = DB::select("select (pc_vote + wechat_vote) AS vote from candidate
				where type = '2'
				ORDER BY
					vote DESC limit 10");
        $yo_first = isset($yo_online[2]->vote) ? $yo_online[2]->vote : 0;
        $yo_end = isset($yo_online[9]->vote) ? $yo_online[9]->vote : 10000000;
        $yo =  DB::select("SELECT
	name,
	pc_vote,
	wechat_vote,
	online_score,
	student_score,
	teacher_score,
	student_vote,
	teacher_vote,
	(
		online_score + student_score + teacher_score
	) AS total_score
FROM
	(
		SELECT
			name,
			pc_vote,
			wechat_vote,
			student_vote,
			teacher_vote,
			(
				@score := CASE
				WHEN a.vote >= $yo_first THEN
					20
				ELSE
					CASE
				WHEN a.vote < $yo_end THEN
					16
				ELSE
					18
				END
				END
			) AS online_score,
			(student_vote / 34 * 30) AS student_score,
			(teacher_vote / 14 * 50) AS teacher_score
		FROM
			(
				SELECT
					name,
					(pc_vote + wechat_vote) AS vote,
					pc_vote,
					wechat_vote,
					student_vote,
					teacher_vote
				FROM
					candidate
				where type = '2'
				ORDER BY
					vote DESC
			) a,
			(SELECT(@score := 0)) AS b
	) c");
        return view('rank')->with('mo', $mo)->with('yo', $yo);
    }

    //教师详细
    public function detail(Request $request) {
        $id = $request->id;
        $data = Candidate::find($id);
        $data['grade'] = str_replace("\n", '<br>', $data['grade']);
        $data['introduce'] = str_replace("\n", '<br>', $data['introduce']);
        return view('detail')->with('data', $data);
    }

    //投票页面
    public function vote() {
        $morality = Candidate::where('type', '1')->where('status', '1')->get();
        $youngth = Candidate::where('type', '2')->where('status', '1')->get();
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

    //移动端师德页面
    public function mmo(){
        $morality = Candidate::where('type', '1')->where('status', '1')->get();
        if(!Auth::check()) {
            return view('mobile')->with('morality', $morality)->with('morality_vote', 'NO')->with('type', 1);
        }
        $user = Auth::user();
        $morality_voted = UserVote::where('user_id', '=', $user->id)
            ->where('type', '=', '1')
            ->where('created_at', '=', date('Y-m-d', time()))
            ->where('candidate_type', '=', '1')
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
        return view('mobile')->with('morality', $morality)->with('morality_vote', 'YES')->with('type', 1);
    }

    //移动端师德页面
    public function myo(){
        $morality = Candidate::where('type', '2')->where('status', '2')->get();
        if(!Auth::check()) {
            return view('mobile')->with('morality', $morality)->with('morality_vote', 'NO')->with('type', 2);
        }
        $user = Auth::user();
        $morality_voted = UserVote::where('user_id', '=', $user->id)
            ->where('type', '=', '2')
            ->where('created_at', '=', date('Y-m-d', time()))
            ->where('candidate_type', '=', '2')
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
        return view('mobile')->with('morality', $morality)->with('morality_vote', 'YES')->with('type', 2);
    }
    public function weixinLogin($openid) {
        $result = $this->bindVerify($openid);
        if($result['status'] == 200) {
            $user = User::firstOrCreate(['user_id' => $result['stuId']]);
            Auth::loginUsingId($user->id);
            Session::put('uid', $result['stuId']);
        }
    }

    private function bindVerify($openid){
        $url = "http://Hongyan.cqupt.edu.cn/MagicLoop/index.php?s=/addon/Api/Api/bindVerify";
        $timestamp = time();
        $string = "";
        $arr = "abcdefghijklmnopqistuvwxyz0123456789ABCDEFGHIGKLMNOPQISTUVWXYZ";
        for ($i=0; $i<16; $i++) {
            $y = rand(0,41);
            $string .= $arr[$y];
        }
        $secret = sha1(sha1($timestamp).md5($string).'redrock');
        $post_data = array (
            "timestamp" => $timestamp,
            "string" => $string,
            "secret" => $secret,
            "openid" => $openid,
            "token" => "gh_68f0a1ffc303",
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // post数据
        curl_setopt($ch, CURLOPT_POST, 1);
        // post的变量
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
        $output = curl_exec($ch);
        curl_close($ch);
        return json_decode($output);
    }


    /**
     * 通过post方式获取数据
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
