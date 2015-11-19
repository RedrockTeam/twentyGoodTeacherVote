@extends('layout')

@section('css')
    <link rel="stylesheet" href="{{asset('css/index.css')}}"/>
@stop

@section('index')
    data-main="1"
@stop

@section('content')
        <div class="content">
            <div class="container">
                <div class="news shadow">
                    <div class="news_title">
                        <img src="{{asset('img/info.png')}}" alt="information"/>
                        <h3 class="news_h">最新公告</h3>

                    </div>
                    <ul class="news_list">
                        @forelse($ad as $key => $value)
                            <li class="news_li {{$key%2 ? '' : 'news_li_even'}}">
                                <span class="news_tip">
                                    @if($key < 3)
                                    <img src="{{asset('img/new.png')}}" alt="new"/>
                                    @endif
                                </span>
                                <a href="{{route('ad.show', $value->id)}}" target="_blank">{{$value->title}}</a>
                                <span class="news_time">{{$value->updated_at->format('Y-m-d')}}</span>
                            </li>
                            @empty
                            <li class="news_li">
                                <span class="news_tip">
                                </span>
                                <a href="#">暂无公告</a>
                                <span class="news_time"></span>
                            </li>
                        @endforelse
                    </ul>
                </div>
                <div class="log shadow">
                    @if(!Auth::check())
                        <h3 class="log_title">重邮通行证</h3>
                        <!--登录前-->
                        <div class="log_be">
	                        @if(!$errors->login->isEmpty())

	                            {{$errors->login->all()[0]}}
	                        @endif
	                        <form action="{{route('login')}}" method="POST" id="log_form">
	                        	<!-- 报错 -->
	                        	<span class="log_err"></span>
	                            <label>*学号（学生）/一卡通（教师）
	                                <input id="user" class="log_info" type="text" value="{{old('user')}}" name="user" placeholder="用户名"/>
	                            </label>
	                            <label>*默认重邮通行证密码
	                                <input id="password" class="log_info" type="password" placeholder="密   码" name="password"/>
	                            </label>
	                            {{--csrf--}}
	                            {{csrf_field()}}
	                            <input class="log_sub" type="submit" value="登录"/>
	                        </form>
	                        <a class="log_teacher" target="_blank" href="http://redrock.cqupt.edu.cn/RedCenter/index.php/Home/TeacherRegister/index.html">教师注册入口</a>
	                        <a class="log_forget" href="javascript:alert('请联系红岩网校工作站~')">忘记密码</a>
	                    </div>
                    @else
                            <!--登陆后-->
                        <div class="log_aft">
                            <div class="log_suc">
                                <img src="img/login.png" alt="success"/>
                            </div>
                            <a class="log_out" href="{{route('logout')}}">退出登录</a>
                        </div>
                    @endif
                </div>
            </div>
            <a class="bu_nav_link" href="{{route('norm')}}">
                <button class="bu_nav shadow"><img src="{{asset('img/write.png')}}" alt="write"/>我来提名</button>
            </a>
            <a class="bu_nav_link" href="{{route('vote')}}">
                <button class="bu_nav shadow bu_nav_mar"><img src="{{asset('img/drafts.png')}}" alt="write"/>网络投票</button>
            </a>
            <a class="bu_nav_link" href="#">
                <button class="bu_nav shadow"><img src="{{asset('img/mark.png')}}" alt="write"/>排行榜</button>
            </a>
        </div>
@stop
