<!doctype html>
<html lang="zh-CN" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <!-- 新 Bootstrap 核心 CSS 文件 -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <style>
        body {
            background-color: #337ab7;
        }
    </style>
    <title>双十佳后台</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <form method="post" enctype="multipart/form-data" action="{{route('admin/addCandidate')}}">
                    <div class="form-group">
                        <label for="exampleInputEmail1">姓名</label>
                        <input type="text" class="form-control"  placeholder="" name="name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">介绍</label>
                        <input type="text" class="form-control"  placeholder="" name="introduce">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">单位</label>
                        <input type="text" class="form-control"  placeholder="" name="unit">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">选择类型</label>
                    <select class="form-control" name="type">
                        <option value="1">十佳师德标兵</option>
                        <option value="2">十佳青年教师</option>
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