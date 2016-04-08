<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>名片</title>
  
  <style>
    .profile .bg {
      height: 200px;
      background: url(http://s.url.cn/qqun/xiaoqu/buluo/p/js/images/cover.98f7bd5f2385cd3e847dae65818ef134.png) no-repeat;
      background-size: 100% 100%;
    }

    .profile .img, .profile .nickname {
      text-align: center;
      font-size: 25px;
    }
    .profile .province{
      font-size: 20px;
      color: rgb(109, 104, 104);

    }
    img.avatar {
      width: 100px;
      height: 100px;
      border-radius: 60px;
      border: 3px solid white;
      position: relative;
      top: -50px;
      margin-bottom: -35px;
    }
  </style>
</head>
<body>
<!--头像信息-->
<div class="profile">
  <div class="bg"></div>
  <div class="img">
    <img class="avatar" src="<?php echo ($user_info["headimgurl"]); ?> ">
  </div>
  <div class="nickname">
    <label class="control-label"><?php echo ($user_info["nickname"]); ?></label>
    <br/>
    <label class="province">
      <li class=" glyphicon glyphicon-map-marker"></li>
      <span><?php echo ($user_info["province"]); ?></span>
     </label>
  </div>

</div>
<script src="http://libs.baidu.com/jquery/1.9.0/jquery.js"></script>
<script src ="http://libs.baidu.com/bootstrap/3.0.3/js/bootstrap.min.js" ></script>
<script src="__PUBLIC__/js/mui.min.js"></script>
<script src="__PUBLIC__/js/mui.enterfocus.js"></script>
<script src="__PUBLIC__/js/app.js"></script>
</body>
</html>