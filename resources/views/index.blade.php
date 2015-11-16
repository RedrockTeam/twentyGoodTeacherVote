@extends('layout')

@section('css')
    <link rel="stylesheet" href="{{asset('css/index.css')}}"/>
@stop

@section('index')
    data-main="1"
@stop

@section('content')
        <div class="content">
                <h1 class="title_1">第二届</h1>
                <img class="title_mor" src="{{asset('img/moral.png')}}" alt="moral"/>
                <img class="title_yth" src="{{asset('img/youngth.png')}}" alt="youngth"/>
                <h3 class="title_2">评选表彰活动专题网</h3>
                <h3 class="title_3">
                    <span>塑高尚师德模范</span>
                    <span>做敬业爱生教师</span>
                </h3>

            <div class="container">
                <div class="news shadow">
                    <div class="news_title">
                        <a href="#">更多 >></a>
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
                                <a href="#">{{$value->title}}</a>
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
                        @if(!$errors->login->isEmpty())

                            {{$errors->login->all()[0]}}
                        @endif
                        <form action="{{route('login')}}" method="POST" id="log_form">
                            <label>
                                <input id="user" class="log_info" type="text" value="{{old('user')}}" name="user" placeholder="用户名"/>
                            </label>
                            <label>
                                <input id="password" class="log_info" type="password" placeholder="密   码" name="password"/>
                            </label>
                            {{--csrf--}}
                            {{csrf_field()}}
                            <input class="log_sub" type="submit" value="登录"/>
                        </form>
                        <a class="log_forget" href="#">忘记密码</a>
                    @else
                      lalala
                    @endif
                </div>
            </div>
            <a class="bu_nav_link" href="{{route('norm')}}">
                <button class="bu_nav shadow"><img src="{{asset('img/write.png')}}" alt="write"/>我来提名</button>
            </a>
            <a class="bu_nav_link" href="#">
                <button class="bu_nav shadow bu_nav_mar"><img src="{{asset('img/drafts.png')}}" alt="write"/>网络投票</button>
            </a>
            <a class="bu_nav_link" href="#">
                <button class="bu_nav shadow"><img src="{{asset('img/mark.png')}}" alt="write"/>排行榜</button>
            </a>
        </div>
@stop