<!doctype html>
<html lang="zh-CN" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <!-- 新 Bootstrap 核心 CSS 文件 -->
    <link rel="stylesheet" href="{{secure_asset('css/bootstrap.min.css')}}">
    <style>
        /*body {*/
            /*background-color: #337ab7;*/
        /*}*/
    </style>
    <title>双十佳后台</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3"><a href="{{route('admin/index')}}">修改</a></div>
            <div class="col-md-3"><a href="{{route('admin/add')}}">添加</a></div>
            <div class="col-md-3"><a href="{{route('admin/ad')}}">发公告</a></div>
            <div class="col-md-3"><a href="{{route('admin/editAd')}}">公告列表</a></div>
        </div>
        <div class="row">
            <div class="col-md-1 h3">ID</div>
            <div class="col-md-1 h3">姓名</div>
            <div class="col-md-1 h3">介绍</div>
            <div class="col-md-1 h3">单位</div>
            <div class="col-md-1 h3">pc投票</div>
            <div class="col-md-1 h3">微信投票</div>
            <div class="col-md-1 h3">学生投票</div>
            <div class="col-md-1 h3">教师投票</div>
            <div class="col-md-1 h3">修改头像</div>
            <div class="col-md-1 h3">提名时间</div>
            <div class="col-md-1 h3">候选人状态</div>
            <div class="col-md-1 h3">操作</div>
        </div>
        @foreach($candidate as $value)
            <br>
            <div class="row">
                <div class="col-md-1">{{$value->id}}</div>
                <div class="col-md-1"><input type="text" class="form-control"  value="{{$value->name}}" name="name"></div>
                <div class="col-md-1">
                    <input type="text" class="form-control"  value="{{$value->introduce}}" name="introduce">
                </div>
                <div class="col-md-1"><input type="text" class="form-control"  value="{{$value->unit}}" name="unit"></div>
                <div class="col-md-1"><input type="text" class="form-control"  value="{{$value->pc_vote}}" name="pc_vote" disabled></div>
                <div class="col-md-1"><input type="text" class="form-control"  value="{{$value->wechat_vote}}" name="wechat_vote" disabled></div>
                <div class="col-md-1"><input type="text" class="form-control"  value="{{$value->student_vote}}" name="student_vote" ></div>
                <div class="col-md-1"><input type="text" class="form-control"  value="{{$value->teacher_vote}}" name="teacher_vote" ></div>
                <div class="col-md-1">
                    <form action="{{route('admin/editphoto')}}" method="post" enctype="multipart/form-data">
                        <input type="file" class="form-control"  name="photo">
                        <input type="hidden" value="{{$value->id}}" name="id">
                        {{csrf_field()}}
                        <button class="btn btn-xs btn-warning">修改头像</button>
                    </form>
                </div>
                <div class="col-md-1">{{$value->created_at}}</div>
                <div class="col-md-1">{!! $value->status == 0 ? '<span class="label label-danger">冻结</span>':'<span class="label label-success">正常</span>' !!} {{$value->type == 1? '师德':'青年'}}</div>
                <div class="col-md-1">
                    <span><button class="btn btn-xs btn-warning" data-id="{{$value->id}}">修改</button></span>
                    <span><button class="btn btn-xs btn-success" data-id="{{$value->id}}">激活</button></span>
                    <span><button class="btn btn-xs btn-danger" data-id="{{$value->id}}">冻结</button></span>
                </div>
            </div>
        @endforeach
    </div>
    <!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
    <script src="{{secure_asset('js/jquery.min.js')}}"></script>

    <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
    <script src="{{secure_asset('js/bootstrap.min.js')}}"></script>
    <script>
        $(".btn-warning").on('click', function() {
            var id = $(this).data('id');
            var input_dom = $(this).parents('.row').find('input');
            var value = {};
            $.each(input_dom, function(k, v) {
                if($(v).attr('name') != 'photo' && $(v).attr('name') != '_token') {
                    value[$(v).attr('name')] = $(v).val();
                }

            });
            $.ajax({
                type: "post",
                url: "{{route('admin/edit')}}",
                data: {'data':value, 'id':id, _token:"{{csrf_token()}}"},
                dataType: "json",
                success: function(data) {
                    if(data.status == 200) {
                        alert('修改成功');
                    } else {
                        alert(data.info)
                    }
                }
            });
        });
        $(".btn-success").on('click', function() {
            var id = $(this).data('id');
            var lable = $(this).parents('.row').find('span').eq(0);
            $.ajax({
                type: "post",
                url: "{{route('admin/updatestatus')}}",
                data: {'data':{'status':1}, 'id':id, _token:"{{csrf_token()}}"},
                dataType: "json",
                success: function(data) {
                    if(data.status == 200) {
                        lable.removeClass().addClass('label label-success');
                        lable.html('正常');
                        alert('修改成功');
                    } else {
                        alert(data.info)
                    }
                }
            });
        });
        $(".btn-danger").on('click', function() {
            var id = $(this).data('id');
            var lable = $(this).parents('.row').find('span').eq(0);
            $.ajax({
                type: "post",
                url: "{{route('admin/updatestatus')}}",
                data: {'data':{'status':0}, 'id':id, _token:"{{csrf_token()}}"},
                dataType: "json",
                success: function(data) {
                    if(data.status == 200) {
                        lable.removeClass().addClass('label label-danger');
                        lable.html('冻结');
                        alert('修改成功');
                    } else {
                        alert(data.info)
                    }
                }
            });
        });
    </script>
</body>
</html>