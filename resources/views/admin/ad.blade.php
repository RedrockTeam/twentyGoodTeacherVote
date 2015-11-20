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
        @if(!$errors->info->isEmpty())
            <div class="row text-center">
                <div class="col-md-12"><div class="alert alert-danger" role="alert">{{$errors->info->all()[0]}}</div></div>
            </div>
        @endif
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <form method="post" enctype="multipart/form-data" action="{{route('admin/addad')}}">
                    <div class="form-group">
                        <label for="exampleInputEmail1">标题</label>
                        <input type="text" class="form-control"  placeholder="" name="title" value="{{$data->title or ''}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">正文</label>
                        <textarea name="content" class="form-control" rows="3">{{$data->content or ''}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">上传附件(zip,rar,doc,docx格式)</label>
                        <input type="file" name="photo">
                    </div>
                    <input type="hidden" name="id" value="{{$flag or 0}}">
                    {{csrf_field()}}
                    <button type="submit" class="btn btn-default">提交</button>
                </form>
            </div>
            <div class="col-md-4"></div>
        </div>

    </div>
</body>
</html>