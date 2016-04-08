<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <title>发帖</title>
    
    <style>
        body{
            margin: 0;
            padding: 0;
            background: #F0F0F0;
        }
        #title{
            height: 20%;
            font-size: 500%;
        }
        #content{
            height: 80%;
            font-size: 500%;
        }
        #picture{
            font-size: 700%;
            margin-left: 20%;
        }
        #button{
            font-size: 500%;
            margin-left: 75%;
        }
        #space{
            height: 100px;
            background: #F0F0F0;
        }

        #head-img-url{
            width: 250px;
            height: 250px;
        }
        #test{
            background: #F0F0F0;
        }
        #button-group{
            background: #F8F8F8;
        }
    </style>

</head>
<body>
<form>
    <input type="text" class="form-control" placeholder="标题" id="title">
    <textarea class="form-control" placeholder="内容" rows="4" id="content"></textarea>
</form>
<div id="space"></div>

<div class="container-fluid" id="button-group">
    <div class="row">
        <div class="col-xs-2"><span class="glyphicon glyphicon-picture" aria-hidden="true" id="picture"></span></div>
        <div class="col-xs-8"><button type="submit" class="btn btn-primary btn-lg" id="button">发表</button></div>
    </div>
</div>

<div id="test">
    <div id="addPicture">
        <img src="__PUBLIC__/image/common/addPicture.png" id="head-img-url">
    </div>
    <input type="file" id="head-img-file" accept="image/*" name="header" onchange="uploadPicture()" style="display: none;">
</div>

<script src="http://libs.baidu.com/jquery/1.9.0/jquery.js"></script>
<script src ="http://libs.baidu.com/bootstrap/3.0.3/js/bootstrap.min.js" ></script>
<script src="__PUBLIC__/js/mui.min.js"></script>
<script src="__PUBLIC__/js/mui.enterfocus.js"></script>
<script src="__PUBLIC__/js/app.js"></script>

<script>
    $("#addPicture").on("click",function(){
        $("#head-img-file").click();
    });

    function uploadPicture(){
        var self = $("#head-img-file")[0];
        var myfile = self.files;
        var reader = new FileReader();
        reader.readAsDataURL(myfile[0]);
        reader.onload = function(e) {
            $("#head-img-url").attr("src", e.target.result);
        }
    }

    $("#button").click(function(){
        $.post("{U('PostMes/addPost')",{title: $("#title").val(), content: $("#content").val()},function(data){
            if(data.code ==1){
                alert("操作成功！");
            }else{
                alert("操作失败！");
            }
        });
    });

</script>
</body>
</html>