@extends('layout')
@section('css')
    <link rel="stylesheet" href="css/index.css"/>
    <link rel="stylesheet" href="css/rank.css"/>
@stop
@section('rank')
    data-main="1"
@stop
@section('content')
    <div class="rank shadow">
        <h3 class="rank_h">“十佳师德标兵”候选人排行榜</h3>
        <table align="center">
            <thead>
                <tr>
                    <th rowspan="2">排名</th>
                    <th rowspan="2">候选人</th>
                    <th colspan="3" class="rank_th">网络投票环节</th>
                    <th colspan="2" class="rank_th">学生评审环节</th>
                    <th colspan="2" class="rank_th">教师评审环节</th>
                    <th rowspan="2">总得分</th>
                </tr>
                <tr>
                    <th>网站得票</th>
                    <th>微信得票</th>
                    <th>折算得分</th>
                    <th>得票</th>
                    <th>折算得分</th>
                    <th>得票</th>
                    <th>折算得分</th>
                </tr>
            </thead>
            <tbody>
            @foreach($mo as $key => $value)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$value->name}}</td>
                    <td>{{$value->pc_vote}}</td>
                    <td>{{$value->wechat_vote}}</td>
                    <td>{{$value->online_score}}</td>
                    <td>{{$value->student_vote}}</td>
                    <td>{{$value->student_score}}</td>
                    <td>{{$value->teacher_vote}}</td>
                    <td>{{$value->teacher_score}}</td>
                    <td>{{$value->total_score}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <h3 class="rank_h rank_yth">“十佳青年教师”候选人排行榜</h3>
        <table align="center">
            <thead>
            <tr>
                <th rowspan="2">排名</th>
                <th rowspan="2">候选人</th>
                <th colspan="3" class="rank_th">网络投票环节</th>
                <th colspan="2" class="rank_th">学生评审环节</th>
                <th colspan="2" class="rank_th">教师评审环节</th>
                <th rowspan="2">总得分</th>
            </tr>
            <tr>
                <th>网站得票</th>
                <th>微信得票</th>
                <th>折算得分</th>
                <th>得票</th>
                <th>折算得分</th>
                <th>得票</th>
                <th>折算得分</th>
            </tr>
            </thead>
            <tbody>
            @foreach($yo as $key => $value)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$value->name}}</td>
                    <td>{{$value->pc_vote}}</td>
                    <td>{{$value->wechat_vote}}</td>
                    <td>{{$value->online_score}}</td>
                    <td>{{$value->student_vote}}</td>
                    <td>{{$value->student_score}}</td>
                    <td>{{$value->teacher_vote}}</td>
                    <td>{{$value->teacher_score}}</td>
                    <td>{{$value->total_score}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="footer">
        <p class="footer_p">地址：重庆市南岸区崇文路2号（重庆邮电大学内） 400065 E-mail:redrock@cqupt.edu.cn (023-62461084)</p>
    </div>
</div>
@stop
@section('js')
@parent
    <script src="js/vote-min.js"></script>
@stop