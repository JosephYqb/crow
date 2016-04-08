<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html class="ui-page-login">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=3.0,user-scalable=yes" />
    <title>login</title>
    <link href="__PUBLIC__/css/mui.min.css" rel="stylesheet" />
    <style>
        .ui-page-login,
        body {
            width: 100%;
            height: 100%;
            margin: 0px;
            padding: 0px;
        }

        .mui-content{height: 100%;}
        .area {
            margin: 20px auto 0px auto;
        }

        .mui-input-group {
            margin-top: 10px;
        }

        .mui-input-group:first-child {
            margin-top: 20px;
        }

        .mui-input-group label {
            width: 22%;
        }

        .mui-input-row label~input,
        .mui-input-row label~select,
        .mui-input-row label~textarea {
            width: 78%;
        }

        .mui-checkbox input[type=checkbox],
        .mui-radio input[type=radio] {
            top: 6px;
        }

        .mui-content-padded {
            margin-top: 25px;
        }

        .mui-btn {
            padding: 10px;
        }

        .link-area {
            display: block;
            margin-top: 25px;
            text-align: center;
        }

        .spliter {
            color: #bbb;
            padding: 0px 8px;
        }

        .oauth-area {
            position: absolute;
            bottom: 20px;
            left: 0px;
            text-align: center;
            width: 100%;
            padding: 0px;
            margin: 0px;
        }

        .oauth-area .oauth-btn {
            display: inline-block;
            width: 50px;
            height: 50px;
            background-size: 30px 30px;
            background-position: center center;
            background-repeat: no-repeat;
            margin: 0px 20px;
            /*-webkit-filter: grayscale(100%); */
            border: solid 1px #ddd;
            border-radius: 25px;
        }

        .oauth-area .oauth-btn:active {
            border: solid 1px #aaa;
        }

        .oauth-area .oauth-btn.disabled {
            background-color: #ddd;
        }

        #login-fail>label {
            background-color: #efeff4;
            color: #ff0000;
            font-family: 'Helvetica Neue', Helvetica, sans-serif;
            font-size: small;
            display: block;
            padding: 2px 10px;
        }
    </style>

</head>

<body>
<header class="mui-bar mui-bar-nav">
    <h1 class="mui-title">登录</h1>
</header>
<div class="mui-content">
    <form id='login-form' class="mui-input-group" action="<?php echo U('Login/login');?>" method="post">
        <div class="mui-input-row">
            <label>昵称</label>
            <input id='account' name="username" type="text" class="mui-input-clear mui-input" placeholder="请输入昵称">
        </div>
        <div class="mui-input-row">
            <label>密码</label>
            <input id='password' name="password" type="password" class="mui-input-clear mui-input" placeholder="请输入密码">
        </div>
    </form>
    <div id="login-fail" <?php if($flag != 1): ?>hidden<?php endif; ?>>
        <label >登陆失败,请重试!</label>
    </div>
    <div class="mui-content-padded">
        <button id='login' class="mui-btn mui-btn-block mui-btn-primary">登录</button>
        <div class="link-area"><a id='reg'>没有账号?点击注册</a>
        </div>
    </div>
    <div class="mui-content-padded oauth-area">

    </div>
</div>
<script src="http://cdn.bootcss.com/jquery/2.2.1/jquery.min.js"></script>
<script src="__PUBLIC__/js/mui.min.js"></script>
<script src="__PUBLIC__/js/mui.enterfocus.js"></script>
<script src="__PUBLIC__/js/app.js"></script>
<script>
    $(function(){
        mui("body").on("tap", "#login", function(){
            $("#login-form").submit();
        });

        mui("body").on("tap", "#reg", function(){
            window.location.href="<?php echo U('Signup/signUp');?>";
        });
    });

</script>
</body>

</html>