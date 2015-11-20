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
            <form method="post" action="{{route('admin/verify')}}">
                <div class="form-group">
                    <label for="exampleInputEmail1">用户名</label>
                    <input type="text" class="form-control" name="username" placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">密码</label>
                    <input type="password" class="form-control" name="pwd" placeholder="password">
                </div>
                {{csrf_field()}}
                <button type="submit" class="btn btn-default">登录</button>
            </form>
        </div>
        <div class="col-md-4"></div>
    </div>

</div>
<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
<script src="{{asset('js/jquery.min.js')}}"></script>

<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="{{asset('js/bootstrap.min.js')}}"></script>
</body>
</html>