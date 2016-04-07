<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0 ,maximum-scale=3.0 , minimum-scale=1.0 ,user-scalable=no">

		<link rel="stylesheet" href="__PUBLIC__/css/mui.min.css">
		<style>
		    .mui-iframe-wrapper {
			    top: 0px !important;
			}
		</style>
	</head>
	<script src="__PUBLIC__/js/mui.min.js"></script>
	<script type="text/javascript">
		var key_word = "<?php echo ($key_word); ?>";
		var open = "<?php echo ($open); ?>";
		var url = "";
		if (typeof(key_word) == '') {
			url = "<?php echo U('Index/index', array('open' => $open));?>";
		} else {
			url = "<?php echo U('Index/index', array('open' => $open, 'key_word' => $key_word));?>";
		}
		//alert(key_word);
		//alert(open);
		//alert(url);
		mui.init({
			subpages:[{
				url: url,
				id: 'home_index',
				styles:{
					top: '45px',
					bottom: '0px',
				}
			}]
		});

	</script>

</html>