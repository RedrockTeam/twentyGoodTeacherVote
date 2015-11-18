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
            <a href="{{route('vote', '#rule')}}"><li class="vote_nav_li">投票规则</li></a>
            <a href="{{route('vote', '#nor')}}"><li class="vote_nav_li">十佳师德标兵</li></a>
            <a href="{{route('vote', '#yth')}}"><li class="vote_nav_li">十佳青年教师</li></a>
        </ul>
        <div id="rule" class="vote_container">
            <h3 class="vote_rule_title">投票规则</h3>
            <p class="vote_rule_p">1.每个账号账号每天可在网站或“重邮小帮手”微信公众号上分别为十佳师德标兵和十佳青年教师各投一次票，每次投票投给7-10位候选人，该次投票才有效，否则投票无效。</p>
            <p class="vote_rule_p">2.投票时间：2015年11月23日00时00分01秒—2015年11月27日23时59分59秒。</p>
            <p class="vote_rule_p">3.点击“ <span class="heart">&#xe708;</span> ”可选择候选人进行投票。</p>
        </div>
        <div id="nor" class="vote_container vote_container_hide">
            <ul class="vote_peo_list">
                <li class="vote_peo_li">
                    <div class="vote_people">
                        <div class="vote_face"><span class="vote_face_curain"><a class="vote_face_detail" href="detail.html#nor">查看详情</a></span><img src="img/face.jpg" alt="face"/></div>
                        <p class="vote_name">李四<span class="vote_v heart">&#xe708;</span></p>
                        <p class="vote_part">传媒艺术学院</p>
                    </div>
                    <div class="vote_people">
                        <div class="vote_face"><span class="vote_face_curain"><a class="vote_face_detail" href="detail.html#nor">查看详情</a></span><img src="img/face.jpg" alt="face"/></div>
                        <p class="vote_name">李四<span class="vote_v heart">&#xe708;</span></p>
                        <p class="vote_part">传媒艺术学院</p>
                    </div>
                    <div class="vote_people">
                        <div class="vote_face"><span class="vote_face_curain"><a class="vote_face_detail" href="detail.html#nor">查看详情</a></span><img src="img/face.jpg" alt="face"/></div>
                        <p class="vote_name">李四<span class="vote_v heart">&#xe708;</span></p>
                        <p class="vote_part">传媒艺术学院</p>
                    </div>
                    <div class="vote_people vote_people_last">
                        <div class="vote_face"><span class="vote_face_curain"><a class="vote_face_detail" href="detail.html#nor">查看详情</a></span><img src="img/face.jpg" alt="face"/></div>
                        <p class="vote_name">李四<span class="vote_v heart">&#xe708;</span></p>
                        <p class="vote_part">传媒艺术学院</p>
                    </div>
                </li>
                <li class="vote_peo_li">
                    <div class="vote_people">
                        <div class="vote_face"><span class="vote_face_curain"><a class="vote_face_detail" href="detail.html#nor">查看详情</a></span><img src="img/face.jpg" alt="face"/></div>
                        <p class="vote_name">李四<span class="vote_v heart">&#xe708;</span></p>
                        <p class="vote_part">传媒艺术学院</p>
                    </div>
                    <div class="vote_people">
                        <div class="vote_face"><span class="vote_face_curain"><a class="vote_face_detail" href="detail.html#nor">查看详情</a></span><img src="img/face.jpg" alt="face"/></div>
                        <p class="vote_name">李四<span class="vote_v heart">&#xe708;</span></p>
                        <p class="vote_part">传媒艺术学院</p>
                    </div>
                    <div class="vote_people">
                        <div class="vote_face"><span class="vote_face_curain"><a class="vote_face_detail" href="detail.html#nor">查看详情</a></span><img src="img/face.jpg" alt="face"/></div>
                        <p class="vote_name">李四<span class="vote_v heart">&#xe708;</span></p>
                        <p class="vote_part">传媒艺术学院</p>
                    </div>
                    <div class="vote_people vote_people_last">
                        <div class="vote_face"><span class="vote_face_curain"><a class="vote_face_detail" href="detail.html#nor">查看详情</a></span><img src="img/face.jpg" alt="face"/></div>
                        <p class="vote_name">李四<span class="vote_v heart">&#xe708;</span></p>
                        <p class="vote_part">传媒艺术学院</p>
                    </div>
                </li>
                <li class="vote_peo_li">
                    <div class="vote_people">
                        <div class="vote_face"><span class="vote_face_curain"><a class="vote_face_detail" href="detail.html#nor">查看详情</a></span><img src="img/face.jpg" alt="face"/></div>
                        <p class="vote_name">李四<span class="vote_v heart">&#xe708;</span></p>
                        <p class="vote_part">传媒艺术学院</p>
                    </div>
                    <div class="vote_people">
                        <div class="vote_face"><span class="vote_face_curain"><a class="vote_face_detail" href="detail.html#nor">查看详情</a></span><img src="img/face.jpg" alt="face"/></div>
                        <p class="vote_name">李四<span class="vote_v heart">&#xe708;</span></p>
                        <p class="vote_part">传媒艺术学院</p>
                    </div>
                    <div class="vote_people">
                        <div class="vote_face"><span class="vote_face_curain"><a class="vote_face_detail" href="detail.html#nor">查看详情</a></span><img src="img/face.jpg" alt="face"/></div>
                        <p class="vote_name">李四<span class="vote_v heart">&#xe708;</span></p>
                        <p class="vote_part">传媒艺术学院</p>
                    </div>
                    <div class="vote_people vote_people_last">
                        <div class="vote_face"><span class="vote_face_curain"><a class="vote_face_detail" href="detail.html#nor">查看详情</a></span><img src="img/face.jpg" alt="face"/></div>
                        <p class="vote_name">李四<span class="vote_v heart">&#xe708;</span></p>
                        <p class="vote_part">传媒艺术学院</p>
                    </div>
                </li>
                <button class="vote_sub vote_subed">已投票</button>
            </ul>

        </div>
        <div id="yth" class="vote_container vote_container_hide">
            <ul class="vote_peo_list">
                <li class="vote_peo_li">
                    <div class="vote_people">
                        <div class="vote_face"><span class="vote_face_curain"><a class="vote_face_detail" href="detail.html#yth">查看详情</a></span><img src="img/face.jpg" alt="face"/></div>
                        <p class="vote_name">李四<span class="vote_v heart">&#xe708;</span></p>
                        <p class="vote_part">传媒艺术学院</p>
                    </div>
                    <div class="vote_people">
                        <div class="vote_face"><span class="vote_face_curain"><a class="vote_face_detail" href="detail.html#yth">查看详情</a></span><img src="img/face.jpg" alt="face"/></div>
                        <p class="vote_name">李四<span class="vote_v heart">&#xe708;</span></p>
                        <p class="vote_part">传媒艺术学院</p>
                    </div>
                    <div class="vote_people">
                        <div class="vote_face"><span class="vote_face_curain"><a class="vote_face_detail" href="detail.html#yth">查看详情</a></span><img src="img/face.jpg" alt="face"/></div>
                        <p class="vote_name">李四<span class="vote_v heart">&#xe708;</span></p>
                        <p class="vote_part">传媒艺术学院</p>
                    </div>
                    <div class="vote_people vote_people_last">
                        <div class="vote_face"><span class="vote_face_curain"><a class="vote_face_detail" href="detail.html#yth">查看详情</a></span><img src="img/face.jpg" alt="face"/></div>
                        <p class="vote_name">李四<span class="vote_v heart">&#xe708;</span></p>
                        <p class="vote_part">传媒艺术学院</p>
                    </div>
                </li>
                <li class="vote_peo_li">
                    <div class="vote_people">
                        <div class="vote_face"><span class="vote_face_curain"><a class="vote_face_detail" href="detail.html#yth">查看详情</a></span><img src="img/face.jpg" alt="face"/></div>
                        <p class="vote_name">李四<span class="vote_v heart">&#xe708;</span></p>
                        <p class="vote_part">传媒艺术学院</p>
                    </div>
                    <div class="vote_people">
                        <div class="vote_face"><span class="vote_face_curain"><a class="vote_face_detail" href="detail.html#yth">查看详情</a></span><img src="img/face.jpg" alt="face"/></div>
                        <p class="vote_name">李四<span class="vote_v heart">&#xe708;</span></p>
                        <p class="vote_part">传媒艺术学院</p>
                    </div>
                    <div class="vote_people">
                        <div class="vote_face"><span class="vote_face_curain"><a class="vote_face_detail" href="detail.html#yth">查看详情</a></span><img src="img/face.jpg" alt="face"/></div>
                        <p class="vote_name">李四<span class="vote_v heart">&#xe708;</span></p>
                        <p class="vote_part">传媒艺术学院</p>
                    </div>
                    <div class="vote_people vote_people_last">
                        <div class="vote_face"><span class="vote_face_curain"><a class="vote_face_detail" href="detail.html#yth">查看详情</a></span><img src="img/face.jpg" alt="face"/></div>
                        <p class="vote_name">李四<span class="vote_v heart">&#xe708;</span></p>
                        <p class="vote_part">传媒艺术学院</p>
                    </div>
                </li>
                <li class="vote_peo_li">
                    <div class="vote_people">
                        <div class="vote_face"><span class="vote_face_curain"><a class="vote_face_detail" href="detail.html#yth">查看详情</a></span><img src="img/face.jpg" alt="face"/></div>
                        <p class="vote_name">李四<span class="vote_v heart">&#xe708;</span></p>
                        <p class="vote_part">传媒艺术学院</p>
                    </div>
                    <div class="vote_people">
                        <div class="vote_face"><span class="vote_face_curain"><a class="vote_face_detail" href="detail.html#yth">查看详情</a></span><img src="img/face.jpg" alt="face"/></div>
                        <p class="vote_name">李四<span class="vote_v heart">&#xe708;</span></p>
                        <p class="vote_part">传媒艺术学院</p>
                    </div>

                </li>

            </ul>
            <button class="vote_sub">投票</button>
        </div>
    </div>
@stop
