<!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=no">
    <title>您还未绑定小帮手</title>
    <style>
        h1 {
            color: #CC6666;
        }
        h2 {
            line-height: 1.8em;
            font-weight: lighter;
        }
        a {
            display: inline-block;
            text-decoration: none;
            line-height: 1.4em;
            padding: 0 6px;
            margin: 0 4px;
            border-radius: 4px;
            background-color: #6699CC;
            color: #fff;
        }
    </style>
</head>
<body>
    <h1>您还未绑定小帮手</h1>
    <h2>#1 如果您是教职工用户,请先注册账号:<a href="https://redrock.cqupt.edu.cn/RedCenter/index.php/Home/TeacherRegister/index.html">注册地址</a>,如果已经注册账号可直接绑定账号:<a href="http://hongyan.cqupt.edu.cn/MagicLoop/index.php?s=/addon/Bind/Bind/bind/openid/{{ $openid or 'asdf'}}/token/gh_68f0a1ffc303.html&redirect={{urlencode('http://redrock.cqupt.edu.cn/shuangshijia/public/mobilemo?openid='.$openid)}}">绑定地址</a></h2>
    <h2>#2 如果您是学生用户,可直接进行账号绑定:<a href="http://hongyan.cqupt.edu.cn/MagicLoop/index.php?s=/addon/Bind/Bind/bind/openid/{{ $openid or 'asdf'}}/token/gh_68f0a1ffc303.html&redirect={{urlencode('http://redrock.cqupt.edu.cn/shuangshijia/public/mobilemo?openid='.$openid)}}">绑定地址</a></h2>
</body>
</html>