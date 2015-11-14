<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Ixudra\Curl\Facades\Curl;

class IndexController extends Controller {

    private $verify_url = 'http://hongyan.cqupt.edu.cn/RedCenter/Api/Handle/login';

    public function index() {
        return view('index');
    }

    public function norm() {
        return view('norm');
    }

    public function login() {
        $data = Input::all();
        $result = $this->__CurlPost($this->verify_url, ['user' => $data['user'], 'password' => $data['password']]);
        return $result;
    }

    /**
     * 通过post方式获取数据, 支持https, 未测试233
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
