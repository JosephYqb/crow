<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <title><?= $post_info['title']; ?></title>

  <link href="http://libs.baidu.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
<link href="__PUBLIC__/css/mui.min.css" rel="stylesheet" />
  <style>
    body {
      word-wrap: break-word;
    }

    hr {
      margin: 0;
    }

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

    .post_user {
      margin: 10px 0;
    }

    .content-image > img {
      margin: 10px auto;
    }

    .review-info > .avatar {
      float: left;
      margin-right: 10px;
      width: 60px;
    }
    .review{
      display: inline-block;
      float: right;

    }

  </style>
</head>
<body>
<!--发帖者信息-->
<a href="<?php echo U('User/getUserInfoById?id='.$post_info['user_id']);?>">
  <div class="row post_user">
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
</a>
<hr/>
<!--帖子详情-->
<div class="post_main">
  <span>
    <h2>
      <?= $post_info['title']; ?>
    </h2>
  </span>

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
  <div class="time">
    <label>
      <?= compareDate($post_info['create_time']); ?>
    </label>
    <div class="review" onclick="do_review()">
      <button>回复</button>
    </div>
  </div>
  <hr/>
  <div>
    <span class="control-label">
      <h4> 全部评论</h4>
    </span>
  </div>
  <hr/>
  <!--评论列表-->
  <div class="review-info-list">
    <?php if(is_array($review_info)): foreach($review_info as $key=>$info): ?><div class="col-xs-12  form-group review-info">

        <!--用户头像-->
        <div class="avatar">
          <img class="avatar"
               src=" <?= $account[$info['user_id']]['headimgurl']; ?> ">
        </div>
        <div class="col-xs-9 do-review" review_id="<?php echo ($info["id"]); ?>">
          <a href="<?php echo U('User/getUserInfoById?id='.$info['user_id']);?>">
            <label class="nickname ">
              <?= $account[$info['user_id']]['nickname'];?>
            </label>
          </a>
          <br/>
          <label>
            <?= $info['content']; ?>
          </label>
          <br/>
          <label>
            <?= compareDate($info['create_time']); ?>
          </label>

          <div>
          </div>

        </div>

      </div>
      <hr/><?php endforeach; endif; ?>
  </div>
  <hr/>
</div>

<!--页尾
<footer class="row">
  <div class="col-xs-12">
    <div class="col-xs-4"></div>
    <div class="col-xs-4">
<label>评论</label>
    </div>
    <div class="col-xs-4"></div>
  </div>
</footer>-->

<script src="http://libs.baidu.com/jquery/1.9.0/jquery.js"></script>
<script src ="http://libs.baidu.com/bootstrap/3.0.3/js/bootstrap.min.js" ></script>
<script src="__PUBLIC__/js/mui.min.js"></script>
<script src="__PUBLIC__/js/mui.enterfocus.js"></script>
<script src="__PUBLIC__/js/app.js"></script>

<script>

  $(".review-info-list").on('click', '.do-review', function () {
    window.location.href = "<?php echo U('Review/reviewPost',array('pid'=> I('get.pid',0,'intval')));?>" +
      "?review_id=" + (this.getAttribute('review_id') >> 0);
  });
  //回复帖子
  function do_review(){
    window.location.href = "<?php echo U('Review/reviewPost',array('pid'=> I('get.pid',0,'intval')));?>";
  }

</script>
</body>
</html>