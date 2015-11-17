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
        <div class="detail_container">
            <h3 class="detail_title">事迹简介</h3>
            <div class="detail_face"><img src="img/face.jpg" alt="face"/></div>
            <div class="detail_group">
                <!--多年后又用到了&nbsp;，这里真是有毒-->
                <span class="detail_key">姓&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;名 :</span>
                <span class="detail_val">张三</span>
            </div>
            <div class="detail_group">
                <span class="detail_key">性&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;别 :</span>
                <span class="detail_val">男</span>
            </div>
            <div class="detail_group">
                <span class="detail_key">出&nbsp;&nbsp;&nbsp;生&nbsp;&nbsp;&nbsp;年&nbsp;&nbsp;&nbsp;月 :</span>
                <span class="detail_val">1980年10月23日</span>
            </div>
            <div class="detail_group">
                <span class="detail_key detail_key_space">参加工作时间 :</span>
                <span class="detail_val">5年</span>
            </div>
            <div class="detail_group">
                <span class="detail_key detail_key_space">专业技术职务 :</span>
                <span class="detail_val">巴拉巴拉</span>
            </div>
            <div class="detail_group">
                <span class="detail_key">行&nbsp;&nbsp;&nbsp;政&nbsp;&nbsp;&nbsp;职&nbsp;&nbsp;&nbsp;务 :</span>
                <span class="detail_val">哈哈哈哈哈</span>
            </div>
            <div class="detail_group">
                <span class="detail_key">最&nbsp;&nbsp;&nbsp;高&nbsp;&nbsp;&nbsp;学&nbsp;&nbsp;&nbsp;位 :</span>
                <span class="detail_val">博士</span>
            </div>
            <div class="detail_group">
                <span class="detail_key">所&nbsp;&nbsp;&nbsp;在&nbsp;&nbsp;&nbsp;单&nbsp;&nbsp;&nbsp;位 :</span>
                <span class="detail_val">重庆邮电大学</span>
            </div>
            <div class="detail_group">
                <span class="detail_key">主&nbsp;&nbsp;&nbsp;要&nbsp;&nbsp;&nbsp;事&nbsp;&nbsp;&nbsp;迹 :</span>
                <span class="detail_val detail_val_blo">
                    <p class="detail_val_p">打算离开的敬爱是离开的</p>
                    <p class="detail_val_p">那是可敬的把卡上空间</p>
                    <p class="detail_val_p">奥斯卡的哦啊是见面的来看的</p>
                    <p class="detail_val_p">你爸是可敬的扳倒井卡刷包到健康</p>
                </span>
            </div>
            <div class="detail_group">
                <span class="detail_key">突出成绩取得情况:</span>
                <span class="detail_val detail_val_blo">
                    <p class="detail_val_p">打算离开的敬爱是离开的</p>
                    <p class="detail_val_p">那是可敬的把卡上空间</p>
                    <p class="detail_val_p">奥斯卡的哦啊是见面的来看的</p>
                    <p class="detail_val_p">你爸是可敬的扳倒井卡刷包到健康的那款是脑袋上能打死哦对哈纳斯殴打和煎熬搜ID几哈死哦大神解答死哦单机啊死哦大师级地哦啊事件的</p>
                </span>
            </div>
        </div>
    </div>
@stop
