<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html class="ui-page-login">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=3.0,user-scalable=yes" />
    <title>sign up</title>
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

        .mui-input-header-img {
            height: 60px !important;
            padding: 4px 0px;
        }

        .mui-input-header-img>img {
            width: 48px;
            height: 48px;
        }

        #signup-fail>label {
            background-color: #efeff4;
            color: #ff0000;
            font-family: 'Helvetica Neue', Helvetica, sans-serif;
            font-size: small;
            display: block;
            padding: 2px 10px;
        }

        #username-fail>label {
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
    <h1 class="mui-title">注册</h1>
</header>
<div class="mui-content">
    <form id='signup-form' class="mui-input-group" action="<?php echo U('Signup/signUp');?>" method="post" enctype="multipart/form-data">
        <div class="mui-input-row mui-input-header-img">
            <label>头像</label>
            <img src="__PUBLIC__/image/common/photo.png" id="head-img-url">
            <input type="file" id="head-img-file" hidden accept="image/*" onchange="uploadHead()" name="header">
            <!--<input id='head-img' name="header" hidden value="">-->
        </div>
        <div class="mui-input-row">
            <label>昵称</label>
            <input id='account' name="username" type="text" class="mui-input-clear mui-input" placeholder="请输入昵称">
        </div>
        <div class="mui-input-row">
            <label>密码</label>
            <input id='password' name="password" type="password" class="mui-input-clear mui-input" placeholder="请输入密码">
        </div>
    </form>
    <div id="signup-fail" hidden>
        <label >请完善信息!</label>
    </div>
    <div id="username-fail" hidden>
        <label >用户名已存在!</label>
    </div>
    <div class="mui-content-padded">
        <button id='signup' class="mui-btn mui-btn-block mui-btn-primary">注册</button>
        <div class="link-area"><a id='reg'>已有账号?点击登陆</a>
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
    var username_check = true;

    $(function(){
        mui("body").on("tap", "#signup", function(){
            var username = $("#account").val();
            var password = $("#password").val();
            var head_img = $("#head-img").val();
            if (username_check == false) {
                return;
            }
            if(username == ''||password == ''||head_img == '') {
                $("#signup-fail").show();
                return;
            }
            $("#signup-form").submit();
        });

        mui("body").on("tap", "#reg", function(){
            window.location.href="<?php echo U('Login/login');?>";
        });

        mui("body").on("tap", "#head-img-url", function(){
            $("#head-img-file").click();
        });

        $("#account").keyup(function(){
            var username = $(this).val();
            //alert(username);
            $.post("<?php echo U('Signup/checkUsername');?>", {username:username}, function(data){
                if (data == 0) {
                    username_check = false;
                    $("#username-fail").show();
                } else {
                    username_check = true;
                    $("#username-fail").hide();
                }
            });
        });
    });



    function uploadHead() {
        var self = $("#head-img-file")[0];
        var myfile = self.files;
        var reader = new FileReader();
        reader.readAsDataURL(myfile[0]);
        reader.onload = function(e) {
            $("#head-img-url").attr("src", e.target.result);
            //$("#head-img").attr("value", e.target.result);
        }
    }

</script>
</body>

</html>