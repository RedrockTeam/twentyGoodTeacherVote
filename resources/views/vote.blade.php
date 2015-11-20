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
        <div id="rule" class="vote_container">
            <h3 class="vote_rule_title">投票规则</h3>
            <p class="vote_rule_p">1.每个账号账号每天可在网站或“重邮小帮手”微信公众号上分别为十佳师德标兵和十佳青年教师各投一次票，每次投票投给7-10位候选人，该次投票才有效，否则投票无效。</p>
            <p class="vote_rule_p">2.投票时间：2015年11月23日9:00 - 2015年11月29日21:00。</p>
            <p class="vote_rule_p">3.点击“ <span class="heart">&#xe651;</span> ”可选择候选人进行投票。</p>
        </div>
        <div id="nor" class="vote_container vote_container_hide">
            <!--voted已投票-->
            <form id="vote_form_nor" class="vote_form" action="#" method="GET" data-voted="{{$morality_vote}}">
                <ul class="vote_peo_list">
                        @foreach($morality as $key => $value)
                            @if($key%4 == 0)
                                <li class="vote_peo_li">
                            @endif
                            <div class="vote_people @if($key%4 == 3 || $key == (count($morality) - 1)) vote_people_last @endif">
                                <div class="vote_face"><span class="vote_face_curain"><a class="vote_face_detail" href="{{route('detail', ['id' => $value->id])}}#nor">查看详情</a></span><img src="{{asset("upload").'/'.$value->avatar}}" alt="face"/></div>
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
            <form id="vote_form_yth" class="vote_form" action="#" method="GET" data-voted="{{$youngth_vote}}">
                <ul class="vote_peo_list">
                    @foreach($youngth as $key => $value)
                        @if($key%4 == 0)
                            <li class="vote_peo_li">
                                @endif
                                <div class="vote_people @if($key%4 == 3 || $key == (count($youngth) - 1)) vote_people_last @endif">
                                    <div class="vote_face"><span class="vote_face_curain"><a class="vote_face_detail" href="{{route('detail', ['id' => $value->id])}}#nor">查看详情</a></span><img src="{{asset("upload").'/'.$value->avatar}}" alt="face"/></div>
                                    <p class="vote_name">{{$value->name}}<span class="vote_v heart">&#xe651;</span><input class="vote_v_in" type="checkbox" name="nor" value="{{$value->id}}"/></p>
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
    </div>
@stop

@section('js')
@parent
<script>
    var url = "{{route('voteMethod')}}";
    var _token = "{{csrf_token()}}";
</script>
<script src="{{asset('js/vote.js')}}"></script>
@stop
