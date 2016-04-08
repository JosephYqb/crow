<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no;">
  <title>回复帖子</title>
  <link href="http://libs.baidu.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
<link href="__PUBLIC__/css/mui.min.css" rel="stylesheet" />
  <style>
    .message{
      text-align: center;
      color: red;
    }
  </style>
</head>
<body>
<form method="post">
<div class="mui-input-row" style="margin: 10px 5px;">
  <textarea id="textarea" name= 'content'rows="9" placeholder="输入内容"  ></textarea>
</div>
  <div class="mui-input-row message"><?php echo ($message); ?></div>
<div class="mui-button-row">
  <button type="submit" class="mui-btn mui-btn-primary" >确认</button>&nbsp;&nbsp;
  <button type="reset" class="mui-btn mui-btn-danger" onclick="javascript:history.back()">取消
  </button>
</div></form>

<script src="http://libs.baidu.com/jquery/1.9.0/jquery.js"></script>
<script src ="http://libs.baidu.com/bootstrap/3.0.3/js/bootstrap.min.js" ></script>
<script src="__PUBLIC__/js/mui.min.js"></script>
<script src="__PUBLIC__/js/mui.enterfocus.js"></script>
<script src="__PUBLIC__/js/app.js"></script>
</body>
</html>