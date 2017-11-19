@extends('layout')
@section('css')
    <link rel="stylesheet" href="css/index.css"/>
    <link rel="stylesheet" href="css/vote.css"/>
@stop
@section('vote')
    data-main="1"
@stop
@section('content')
    <div class="vote_sus">
        <img src="img/xbs.png" alt="小帮手"/>
        <div class="vote_sus_xbs">扫描二维码关注”重邮小帮手“进行投票</div>
    </div>
    <div class="vote">

        <ul class="vote_nav">
            <a href="#rule"><li class="vote_nav_li vote_nav_li_sel">投票规则</li></a>
            <a href="#nor"><li class="vote_nav_li">十佳师德标兵</li></a>
            <a href="#yth"><li class="vote_nav_li">十佳青年教师</li></a>
        </ul>
        <div id="rule" class="vote_container" style="height:450px">
            <h3 class="vote_rule_title">投票规则</h3>
            <p class="vote_rule_p">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.网站投票学生需用学号登陆投票，教师需注册后登陆投票；微信端投票需绑定后方可投票；</p>
            <p class="vote_rule_p">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.每个账号每天只能投一次（网站及微信端合计），每次投票投给7-10个不同的候选人，该次投票才有效，否则投票无效；</p>
            <p class="vote_rule_p">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3.此次活动旨在了解“双十佳”候选人在师生中的认可度与支持度，为保证测评效果真实性，严禁通过商业手段或其他不正当途径进行拉票、投票等行为，一经发现并认定，将取消其评选资格。监督举报电话62460133，62461685；</p>
            <p class="vote_rule_p">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;4.投票时间：2017年11月20日9时0分0秒-2017年11月24日21时0分0秒；</p>
            <p class="vote_rule_p">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;5.点击“ <span class="heart">&#xe651;</span> ”可选择候选人进行投票。</p>
        </div>
        <div id="nor" class="vote_container vote_container_hide">
            <!--voted已投票-->
            <h3 class="vote_h">重庆邮电大学第三届“十佳师德标兵”候选人</h3>
            <p class="vote_p">（按姓氏笔画排序）</p>
            <form id="vote_form_nor" class="vote_form" action="#" method="GET" data-voted="{{$morality_vote}}">
                <ul class="vote_peo_list">
                        @foreach($morality as $key => $value)
                            @if($key%4 == 0)
                                <li class="vote_peo_li">
                            @endif
                            <div class="vote_people @if($key%4 == 3 || $key == (count($morality) - 1)) vote_people_last @endif">
                                <div class="vote_face"><span class="vote_face_num">{{$value->pc_vote}}票</span><span class="vote_face_curain"><a class="vote_face_detail" href="{{route('detail', ['id' => $value->id])}}#nor">查看详情</a></span><img src="{{secure_asset("upload").'/'.$value->avatar}}" alt="face"/></div>
                                <p class="vote_name">{{$value->name}}<span class="vote_v heart">&#xe651;</span><input class="vote_v_in" type="checkbox" name="nor" value="{{$value->id}}"/></p>
                                <p class="vote_part">{{$value->unit}}</p>
                            </div>
                            @if($key%4 == 3 || $key == (count($morality) - 1))
                                </li>
                            @endif
                        @endforeach

                </ul>
                @if(count($morality) != 0)
                    <input class="vote_sub" type="submit" value="投票">
                @else
                    暂无候选人
                @endif
            </form>

        </div>
        <div id="yth" class="vote_container vote_container_hide">
        <h3 class="vote_h">重庆邮电大学第三届“十佳青年教师”候选人</h3>
            <p class="vote_p">（按姓氏笔画排序）</p>
            <form id="vote_form_yth" class="vote_form" action="#" method="GET" data-voted="{{$youngth_vote}}">
                <ul class="vote_peo_list">
                    @foreach($youngth as $key => $value)
                        @if($key%4 == 0)
                            <li class="vote_peo_li">
                                @endif
                                <div class="vote_people @if($key%4 == 3 || $key == (count($youngth) - 1)) vote_people_last @endif">
                                    <div class="vote_face"><span class="vote_face_num">{{$value->pc_vote}}票</span><span class="vote_face_curain"><a class="vote_face_detail" href="{{route('detail', ['id' => $value->id])}}#nor">查看详情</a></span><img src="{{secure_asset("upload").'/'.$value->avatar}}" alt="face"/></div>
                                    <p class="vote_name">{{$value->name}}<span class="vote_v heart">&#xe651;</span><input class="vote_v_in" type="checkbox" name="yh" value="{{$value->id}}"/></p>
                                    <p class="vote_part">{{$value->unit}}</p>
                                </div>
                                @if($key%4 == 3 || $key == (count($youngth) - 1))
                            </li>
                        @endif
                    @endforeach
                </ul>
                @if(count($youngth) != 0)
                <input class="vote_sub" type="submit" value="投票">
                    @else
                    暂无候选人
                @endif
            </form>
        </div>
        <div class="norm_suc">
            <h3 class="norm_suc_h"></h3>
            <p class="norm_suc_p"></p>
            <button class="norm_suc_sub">确定</button>
        </div>
    </div>
@stop

@section('js')
@parent
<script>
    var url = "{{route('voteMethod')}}";
    var _token = "{{csrf_token()}}";
</script>
<script src="{{secure_asset('js/vote.js')}}"></script>
@stop
