<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width user-scalable=yes initial-scale=1.0 maximum-scale=3.0 minimum-scale=1.0">
    <title>crow</title>
    <link rel="stylesheet" type="text/css" href="http://cdn.bootcss.com/icono/1.3.0/icono.min.css">
    <!--<link rel="stylesheet" href="__PUBLIC__/css/reset.css" />-->
    <!--<link rel="stylesheet" href="__PUBLIC__/css/pullToRefresh.css" />-->
    <link rel="stylesheet" href="__PUBLIC__/css/mui.min.css" />
    <style>
        .clear {
            clear: both;
        }

        body {
            margin: 0px;
            padding: 0px;
            background-color: #B3B3B3;
        }

        #main-content {
            background-color: #B3B3B3;
        }

        #top {
            height: 100px;
            width: 100%;
            /*background-color: #00AAFF;*/
            background: url("__PUBLIC__/image/common/top.jpg") no-repeat -10px 0px;
        }

        #top>.top-headimg {
            width: 70px;
            height: 70px;
            margin-top: 15px;
            margin-bottom: 15px;
            margin-left: 20px;
            float: left;
        }

        #top>.top-headimg>img {
            width: 100%;
            height: 100%;
            border-radius: 50px;
        }

        #top>.top-nickname {
            margin-top: 40px;
            margin-left: 15px;
            float: left;
        }

        #menu {
            height: 50px;
            background-color: #FFFFFF;
            padding: 0px 10px;
        }

        #menu>div {
            float: left;
            margin: 0px 0px;
            height: 50px;
        }

        #menu>div>a {
            text-decoration: none;
            color: #000000;
            display: block;
            height: 50px;
            font-size: 0.8em;
            font-weight: bold;
            text-align: center;
            padding: 2px 25px;
        }

        .menu-icon {
            display: block;
            width: 15px;
            height: 20px;
            margin: 0px auto;
        }

        .icon-post {
            background: url("__PUBLIC__/image/icon/post.ico") no-repeat 0px 4px;
        }

        .icon-search {
            background: url("__PUBLIC__/image/icon/search.ico") no-repeat 0px 3px;
        }

        .icon-home {
            background: url("__PUBLIC__/image/icon/home.ico") no-repeat 0px 4px;
        }

        .divider {
            border-left: 1px solid #B3B3B3;
            border-right: 1px solid #B3B3B3;
            height: 60% !important;
            margin-top: 8px !important;
        }

        #content {
            margin: 0px;
            padding: 0px;
        }

        #content>ul {
            list-style-type: none;
            padding: 0px;
            margin: 0px;
        }

        #content>ul>li {
            margin: 5px 0px;
			z-index: 1000;
        }

        #content>ul>li.content-list>a {
            display: block;
            width: 100%;
            margin: 0px auto;
            background-color: #FFFFFF;
            text-decoration: none;
            color: #000000;
        }

        #content>ul>li.content-list>a>div {
            margin: 0px 20px;
            padding: 5px 0px;
        }

        #content>ul>li.content-list>a>div:nth-child(1)>div:nth-child(1) {
            float: left;
            height: 30px;
            width: 30px;
        }

        #content>ul>li.content-list>a>div:nth-child(1)>div:nth-child(1)>img {
            height: 100%;
            width: 100%;
            border-radius: 50px;
        }

        #content>ul>li.content-list>a>div:nth-child(1)>div:nth-child(2) {
            float: left;
            height: 30px;
            margin-left: 10px;
        }

        #content>ul>li.content-list>a>div:nth-child(1)>div:nth-child(2)>ul {
            padding-left: 0px;
            list-style-type: none;
        }

        #content>ul>li.content-list>a>div:nth-child(1)>div:nth-child(2)>ul>li:nth-child(2) {
            font-size: 0.5em;
            color: #B3B3B3;
			margin-top: -6px;
        }

        #content>ul>li.content-list>a>div>ul {
            list-style-type: none;
            padding-left: 0px;
        }

        #content>ul>li.content-list>a>div:nth-child(2)>ul>li:nth-child(1)>span {
            font-size: 1.0em;
        }

        #content>ul>li.content-list>a>div:nth-child(2)>ul>li:nth-child(2)>span {
            font-size: 0.9em;
            color: #B3B3B3;
            display: block;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        #content>ul>li.content-list>a>div:nth-child(3)>ul>li ,#content>ul>li.content-list>a>div:nth-child(4)>ul>li {
            float: left;
        }

        #content>ul>li.content-list>a>div:nth-child(3)>ul>li {
            display: block;
            width: 23%;
            height: 78px;
            margin: 0px 2px;
        }

        #content>ul>li.content-list>a>div:nth-child(3)>ul>li>img {
            width: 100%;
            height: 100%;
        }

        #content>ul>li.content-list>a>div:nth-child(4)>ul>li>div>i {
            display: block;
            min-width: 15px;
            height: 15px;
            margin: 0px auto;
            font-size: 0.5em;
            color: #7A7772;
            padding-left: 2px;
            float: left;
        }

        .icon-see {
            background: url("__PUBLIC__/image/icon/see.ico") no-repeat 0px 4px;
        }

        .icon-message {
            background: url("__PUBLIC__/image/icon/message.ico") no-repeat 0px 1px;
        }

        #write {
            position: fixed;
			top: 75%;
			left: 80%;
            height: 44px;
			width: 44px;
            border-radius: 15px;
            background-color: rgba(0, 0, 0, 0);
            z-index: 1000;
        }

        #write>a {
            display: block;
            width: 100%;
            height: 100%;
        }

        #write>a>.icon-write {
            background: url("__PUBLIC__/image/icon/write.ico") no-repeat;
            display: block;
            width: 100%;
            height: 100%;
        }
    </style>
	<!--App自定义的css-->
		<style type="text/css">
			.mui-preview-image.mui-fullscreen {
				position: fixed;
				z-index: 20;
				background-color: #000;
			}
			.mui-preview-header,
			.mui-preview-footer {
				position: absolute;
				width: 100%;
				left: 0;
				z-index: 10;
			}
			.mui-preview-header {
				height: 44px;
				top: 0;
			}
			.mui-preview-footer {
				height: 50px;
				bottom: 0px;
			}
			.mui-preview-header .mui-preview-indicator {
				display: block;
				line-height: 25px;
				color: #fff;
				text-align: center;
				margin: 15px auto;
				width: 70px;
				background-color: rgba(0, 0, 0, 0.4);
				border-radius: 12px;
				font-size: 16px;
			}
			.mui-preview-image {
				display: none;
				-webkit-animation-duration: 0.5s;
				animation-duration: 0.5s;
				-webkit-animation-fill-mode: both;
				animation-fill-mode: both;
			}
			.mui-preview-image.mui-preview-in {
				-webkit-animation-name: fadeIn;
				animation-name: fadeIn;
			}
			.mui-preview-image.mui-preview-out {
				background: none;
				-webkit-animation-name: fadeOut;
				animation-name: fadeOut;
			}
			.mui-preview-image.mui-preview-out .mui-preview-header,
			.mui-preview-image.mui-preview-out .mui-preview-footer {
				display: none;
			}
			.mui-zoom-scroller {
				position: absolute;
				display: -webkit-box;
				display: -webkit-flex;
				display: flex;
				-webkit-box-align: center;
				-webkit-align-items: center;
				align-items: center;
				-webkit-box-pack: center;
				-webkit-justify-content: center;
				justify-content: center;
				left: 0;
				right: 0;
				bottom: 0;
				top: 0;
				width: 100%;
				height: 100%;
				margin: 0;
				-webkit-backface-visibility: hidden;
			}
			.mui-zoom {
				-webkit-transform-style: preserve-3d;
				transform-style: preserve-3d;
			}
			.mui-slider .mui-slider-group .mui-slider-item img {
				width: auto;
				height: auto;
				max-width: 100%;
				max-height: 100%;
			}
			.mui-android-4-1 .mui-slider .mui-slider-group .mui-slider-item img {
				width: 100%;
			}
			.mui-android-4-1 .mui-slider.mui-preview-image .mui-slider-group .mui-slider-item {
				display: inline-table;
			}
			.mui-android-4-1 .mui-slider.mui-preview-image .mui-zoom-scroller img {
				display: table-cell;
				vertical-align: middle;
			}
			.mui-preview-loading {
				position: absolute;
				width: 100%;
				height: 100%;
				top: 0;
				left: 0;
				display: none;
			}
			.mui-preview-loading.mui-active {
				display: block;
			}
			.mui-preview-loading .mui-spinner-white {
				position: absolute;
				top: 50%;
				left: 50%;
				margin-left: -25px;
				margin-top: -25px;
				height: 50px;
				width: 50px;
			}
			.mui-preview-image img.mui-transitioning {
				-webkit-transition: -webkit-transform 0.5s ease, opacity 0.5s ease;
				transition: transform 0.5s ease, opacity 0.5s ease;
			}
			@-webkit-keyframes fadeIn {
				0% {
					opacity: 0;
				}
				100% {
					opacity: 1;
				}
			}
			@keyframes fadeIn {
				0% {
					opacity: 0;
				}
				100% {
					opacity: 1;
				}
			}
			@-webkit-keyframes fadeOut {
				0% {
					opacity: 1;
				}
				100% {
					opacity: 0;
				}
			}
			@keyframes fadeOut {
				0% {
					opacity: 1;
				}
				100% {
					opacity: 0;
				}
			}
			.content-list>a>div:nth-child(3)>ul>li>img {
				max-width: 100%;
				height: auto;
			}

            #search-page {
                width: 100%;
                padding: 7px 5px;
            }

            #search-page>form>div {
                float: left;
            }

            .input-search {
                width: 81%;
                margin-right: 4%;
            }

            .button-search {
                width: 14%;
            }

            .button-search>button {
                border-radius: 5px;
                width: 100%;
            }
		</style>

    <script src="http://cdn.bootcss.com/jquery/2.2.1/jquery.min.js"></script>
</head>
<body>
<div id="write">
    <div hidden id="open-id"><?php echo ($open); ?></div>
    <div hidden id="shit-list"><?php echo ($shit_list); ?></div>
    <div hidden id="key-word"><?php echo ($key_word); ?></div>
    <a href="#">
        <i class="icon-write"></i>
    </a>
</div>
<div id="pullrefresh" class="mui-content mui-scroll-wrapper">
<div class="mui-scroll">
<ul class="mui-table-view mui-table-view-chevron">
<div id="main-content">

    <div id="top">
        <div class="top-headimg">
            <img src="__PUBLIC__/image/common/logo.jpg">
        </div>
        <div class="top-nickname">
            <span>可肉肉</span>
        </div>
        <div class="clear"></div>
    </div>
    <div id="menu">
        <div class="post"><a href="#"><i class="icon-post menu-icon"></i>帖子</a></div>
        <div class="divider"></div>
        <div class="search"><a href="#"><i class="icon-search menu-icon"></i>搜索</a></div>
        <div class="divider"></div>
        <div class="home"><a href="#"><i class="icon-home menu-icon"></i>我的</a></div>
        <div class="clear"></div>
    </div>

    <div id="content">
        <ul>
            <?php if(is_array($post_list)): $i = 0; $__LIST__ = $post_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$post): $mod = ($i % 2 );++$i;?><li class="content-list" data-id=<?php echo ($post["id"]); ?>>
                <a href="#">
                    <div>
                        <div><img src=<?php echo ($post["headimgurl"]); ?>></div>
                        <div>
                            <ul>
                                <li><span><?php echo ($post["nickname"]); ?></span></li>
                                <li><span><?php echo ($post["update_time"]); ?></span></li>
                            </ul>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div>
                        <ul>
                            <li><span><?php echo ($post["title"]); ?></span></li>
                            <li><span><?php echo ($post["content"]); ?></span></li>
                        </ul>
                    </div>
                    <div>
                        <ul class="img-list">
                            <?php if(is_array($post["post_image"])): $j = 0; $__LIST__ = $post["post_image"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$image): $mod = ($j % 2 );++$j;?><li><img src=<?php echo ($image); ?> data-preview-src="" data-preview-group=<?php echo ($post["id"]); ?>/></li><?php endforeach; endif; else: echo "" ;endif; ?>
                            <div class="clear"></div>
                        </ul>
                    </div>
                    <div>
                        <ul>
                            <li>
                                <div>
                                    <i class="icon-see"></i>
                                    <i><?php echo ($post["read_num"]); ?></i>
                                    <div class="clear"></div>
                                </div>
                            </li>
                            <li><div class="divider"></div></li>
                            <li>
                                <div>
                                    <i class="icon-message"></i>
                                    <i><?php echo ($post["review_num"]); ?></i>
                                    <div class="clear"></div>
                                </div>
                            </li>
                            <div class="clear"></div>
                        </ul>
                    </div>
                </a>
            </li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </div>
	
	
</div>
<div id="search-page" hidden style="width: 100%;">
    <form action="<?php echo U('Index/home');?>" method="post">
        <input hidden value=<?php echo ($open); ?> name="open" />
        <div class="mui-input-row mui-search input-search">
            <input type="search" class="mui-input-clear" name="key_word" placeholder="请输入搜索关键字" onkeydown="searchSubmit()">
        </div>
        <div class="button-search">
            <button type="button" class="mui-btn mui-btn-outlined">取消</button>
        </div>
        <div class="clear"></div>
    </form>
</div>
</ul>
</div>
</div>
</body>
<script src="__PUBLIC__/js/mui.min.js"></script>
<script src="__PUBLIC__/js/mui.zoom.js"></script>
<script src="__PUBLIC__/js/mui.previewimage.js"></script>
<script>
    mui.init({
		pullRefresh: {
			container: '#pullrefresh',
			down: {
			    contentdown: '',
				contentrefresh: '',
				contentover: '该页面由工作室制作！',
				callback: pulldownRefresh
			},
			up: {
				contentrefresh: '正在加载...',
				callback: pullupRefresh
			}
		}
	});
	
	/**
	* 下拉
	*/
	function pulldownRefresh() {
	    mui('#pullrefresh').pullRefresh().endPulldownToRefresh();
	}
	
	var count = 2;
	/**
	 * 上拉加载
	 */
	function pullupRefresh() {
		setTimeout(function() {
            var open_id = $("#open-id").text();
            var shit_list = $("#shit-list").text();
            var key_word = $("#key-word").text();
            var node = '';
            var image_list = '';
            $.get("<?php echo U('Index/index');?>", {open:open_id, page:count, shit_list:shit_list, key_word:key_word}, function(data){
                var post_list = JSON.parse(data);
                for (i in post_list) {
                    image_list = '';
                    for (j in post_list[i].post_image) {
                        image_list += '<li><img src="'+post_list[i].post_image[j]+'"/></li>';
                    }
                    node = '<li class="content-list" data-id="'+post_list[i].id+'"><a href="#"><div><div><img src="'+post_list[i].headimgurl+'"></div><div><ul><li><span>'+post_list[i].nickname+'</span></li><li><span>'+post_list[i].update_time+'</span></li></ul></div><div class="clear"></div></div><div><ul><li><span>'+post_list[i].title+'</span></li><li><span>'+post_list[i].content+'</span></li></ul></div><div><ul>'+image_list+'<div class="clear"></div></ul></div><div><ul><li><div><i class="icon-see"></i><i>'+post_list[i].read_num+'</i><div class="clear"></div></div></li><li><div class="divider"></div></li><li><div><i class="icon-message"></i><i>'+post_list[i].review_num+'</i><div class="clear"></div></div></li><div class="clear"></div></ul></div></a></li>';
                    $("#content>ul").append(node);
                }
                mui('#pullrefresh').pullRefresh().endPullupToRefresh((++count > <?php echo ($page_num); ?>)); //参数为true代表没有更多数据了。
            });

		}, 500);
	}
	
	mui.previewImage();
	
	$(function(){
        var img = $(".img-list>li>img")
        var search_body = $("#search-page")
        var height = img.css("width");
        img.css("height", height);
        var body_height = $(window).height();
        search_body.css("height", body_height);


	    mui("body").on("tap", ".content-list", function(){
		    var pid = $(this).attr("data-id");
			window.parent.location.href="__ROOT__/index.php/Post/detail/pid/"+pid;
		});

		
		mui("body").on("tap", ".img-list>li>img", function(){
		    $("#write").fadeOut();
		});
		
		mui("body").on("tap", ".mui-zoom-scroller", function(){
		    $("#write").fadeIn();
		});

        mui("body").on("tap", "#write", function(){
            window.parent.location.href="<?php echo U('PostMes/postMes');?>";
        });

        mui("body").on("tap", ".search", function(){
            $("#main-content").slideUp(1000);
            $("#search-page").slideDown(1000);
            $("#write").fadeOut();
        });

        mui("body").on("tap", ".button-search", function(){
            $("#main-content").slideDown(1000);
            $("#search-page").slideUp(1000);
            $("#write").fadeIn();
        });

        mui("body").on("tap", ".post", function(){
            window.parent.location.href = "<?php echo U('Index/home', array('open' => $open));?>"
        });

	});

    function searchSubmit(){
        var code = window.event.keyCode;
        if (code == 13){
            $("#search-page>form").submit();
        } else {
            return false;
        }
    }
	
	
</script>
</html>