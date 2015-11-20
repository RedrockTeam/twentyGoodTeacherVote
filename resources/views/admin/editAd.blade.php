<!doctype html>
<html lang="zh-CN" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <!-- 新 Bootstrap 核心 CSS 文件 -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
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
        <div class="col-md-2"></div>
        <div class="col-md-2">id</div>
        <div class="col-md-2">标题</div>
        <div class="col-md-2">删</div>
        <div class="col-md-2">改</div>
        <div class="col-md-2"></div>
    </div>
    @foreach($data as $value)
        <br>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-2">{{$value->id}}</div>
            <div class="col-md-2">{{$value->title}}</div>
            <div class="col-md-2"><button class="btn btn-danger btn-xs" data-id="{{$value->id}}">删</button></div>
            <div class="col-md-2"><a href="{{route('admin/adEdit', ['id' => $value->id])}}"><button class="btn btn-warning btn-xs">改</button></a></div>
            <div class="col-md-2"></div>
        </div>
    @endforeach
</div>
<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
<script src="{{asset('js/jquery.min.js')}}"></script>

<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script>
    $(".btn").on('click', function() {
        var id = $(this).data('id');
        $.ajax({
            type: "post",
            url: "{{route('admin/adDel')}}",
            data: {id:id, _token:"{{csrf_token()}}"},
            dataType: "json",
            success: function(data) {
                alert(data.info);
                window.location.href = location.href;
            }
        });
    });
</script>
</body>
</html>