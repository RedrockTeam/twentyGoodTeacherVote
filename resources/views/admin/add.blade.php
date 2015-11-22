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
                <form method="post" enctype="multipart/form-data" action="{{route('admin/addCandidate')}}">
                    <div class="form-group">
                        <label for="exampleInputEmail1">姓名</label>
                        <input type="text" class="form-control"  placeholder="" name="name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">主要事迹</label>
                            <textarea name="introduce" class="form-control" rows="3"></textarea>
                        </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">单位</label>
                        <input type="text" class="form-control"  placeholder="" name="unit">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">出   生   年   月</label>
                        <input type="text" class="form-control"  placeholder="" name="birthday">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">参加工作时间</label>
                        <input type="text" class="form-control"  placeholder="" name="worktime">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">专业技术职务</label>
                        <input type="text" class="form-control"  placeholder="" name="major_level">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">行   政   职   务</label>
                        <input type="text" class="form-control"  placeholder="" name="level">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">最   高   学   历 </label>
                        <input type="text" class="form-control"  placeholder="" name="highest_level">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">最   高   学   位 </label>
                        <input type="text" class="form-control"  placeholder="" name="degree">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">突出成绩取得情况 </label>
                        <textarea name="grade" class="form-control" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">选择类型</label>
                    <select class="form-control" name="type">
                        <option value="1">十佳师德标兵</option>
                        <option value="2">十佳青年教师</option>
                    </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">选择性别</label>
                        <select class="form-control" name="gender">
                            <option value="1">男</option>
                            <option value="2">女</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">上传照片</label>
                        <input type="file" name="photo">
                    </div>
                    {{csrf_field()}}
                    <button type="submit" class="btn btn-default">提交</button>
                </form>
            </div>
            <div class="col-md-4"></div>
        </div>

    </div>
</body>
</html>