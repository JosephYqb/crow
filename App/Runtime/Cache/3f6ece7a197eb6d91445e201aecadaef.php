<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <title><?= $post_info['title']; ?></title>
  <link href="http://libs.baidu.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
  <style>
    img.avatar {
      width: 60px;
      height: 60px;
      border-radius: 60px;
    }

    img {
      max-width: 100%;
    }

    .nickname {
      color: #868686;
    }

    .line-height4 {
      line-height: 4;
    }

    .post_main {
      margin: 10px 0;
    }

    .review_info {
      margin: 10px;
      border-top: 2px;
      border-color: gray;
    }

    .content-image > img {
      margin-top: 10px;
    }
    .review_info>.avatar{
      float: left;
      margin-right: 10px;
      width: 60px;
    }



  </style>
</head>
<body>
<!--发帖者信息-->
<div class="row">
  <div class="col-xs-3">
    <!--用户头像-->
    <img class=" avatar" src=" <?= $account[$post_info['user_id']]['headimgurl']; ?> ">
  </div>
  <div class="col-xs-7 line-height4">
    <label class="nickname"><?= $account[$post_info['user_id']]['nickname'] ?></label>
  </div>
  <div class="col-xs-2 line-height4">
    <li class=" glyphicon glyphicon-chevron-right nickname"></li>
  </div>
</div>
<!--帖子详情-->
<div class="post_main">
  <label class="control-label">
    <h1>
      <?= $post_info['title']; ?>
    </h1>
  </label>

  <div>
    <p>
      <?= $post_info['content']; ?>
    </p>
  </div>
  <!--帖子图片信息-->
  <div class="content-image">
    <?php foreach($post_image_info as $image){ ?>
    <img src="<?=$image['img_path']?>"/>
    <?php } ?>
  </div>
  <div>
    <label class="control-label">
      <h3> 全部评论</h3>
    </label>
  </div>
  <br/>
  <!--评论列表-->

  <?php foreach($review_info as $info){ ?>
  <div class="col-xs-12  form-group review_info">
    <!--用户头像-->
    <div class="avatar">
      <img class=" avatar"
           src=" <?= $account[$info['user_id']]['headimgurl']; ?> ">
    </div>
    <div class="col-xs-10">
      <label class="nickname ">
        <?= $account[$info['user_id']]['nickname'];?>
      </label>
      <br/>
      <label>
        <?= $info['content']; ?>
      </label>
      <br/>
      <label>
        <?= compareDate($info['create_time']); ?>
      </label>
    </div>

  </div>

</div>
<?php } ?>

<hr/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
</div>
<script src=" http://libs.baidu.com/jquery/1.9.0/jquery.js"></script>
<script src = "http://libs.baidu.com/bootstrap/3.0.3/js/bootstrap.min.js" ></script>

</body >
</html>