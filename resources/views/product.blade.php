<!doctype html>
<html lang="zh-cn">
<head>
<title>详情</title>
<!-- @include('basic') -->
<base />
<meta charset="utf-8">
<meta name="keywords" content="标题" />
<meta name="description" content="详情" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1.0,shrink-to-fit=no">
<link rel="icon" type="image/x-icon" href="../../public/favicon.ico" />
<link rel="stylesheet" type="text/css" media="all" href="../../public/css/font-awesome.css" />
<link rel="stylesheet" type="text/css" media="all" href="../../public/css/popper.css" />
<link rel="stylesheet" type="text/css" media="all" href="../../public/css/bootstrap.css" />
<script type="text/javascript" src="../../public/ui/jquery.js"></script>
<script type="text/javascript" src="../../public/ui/popper.js"></script>
<script type="text/javascript" src="../../public/ui/bootstrap.js"></script>
<style type="text/css" media="all">
	body{
		padding: 0;
		margin: 0;
	}
	.tooltip{
		box-shadow: 0 0;
		background-color: transparent;
	}
	.navbar-dark{
		text-shadow: 0.1rem 0.1rem 1.3rem #000;
	}
	.carousel-1{
		height: 23.6rem;
		white-space: nowrap;
		overflow-x: auto;
		overflow-y: hidden;
	}
	.noimg{
		position: absolute;
		left: 0;
		right: 0;
		z-index: -1;
	}
</style>
</head>

<body data-spy="scroll" data-target="#navbars">
<nav class="navbar navbar-dark navbar-expand-sm fixed-top text-white">
	<i class="fa navbar-brand fa-chevron-left" onclick="back()"></i>
	<span class="mx-auto"></span>
	<i class="fa navbar-brand fa-ellipsis-v" data-toggle="tooltip" data-placement="bottom" data-html="true">
		<div class="tooltip-1 d-none">
			<div class="m-2 text-left" onclick="home()">
				<i class="fa fa-lg fa-border border-0 fa-home d-inline-block w-25 text-center"></i>
				<span>首页</span>
			</div>
		</div>
	</i>
</nav>
<div class="carousel-1 text-center">
	<i class="noimg fa fa-5x fa-image pt-5 mt-5"></i>
	<img class="h-100 d-none position-relative"/>
</div>
<div class="mb-5 w-100"></div>
<nav class="navbar navbar-light navbar-expand-sm bg-light fixed-bottom text-nowrap text-center">
</nav>
<script type="text/javascript">
	var imgs=['T1pBVsBCJ_1RCvBVdK_800.jpg','6c3ad025eb43063f.jpg!q70.dpg.webp','O1CN01b5PmD824e7SNRfqgn_!!2599057415.jpg_2200x2200Q100s50.jpg_.webp'];
	$().ready(function(){
		for(i=0;i<imgs.length;i++){
			let e=$('.carousel-1>img:first').clone(true).insertAfter('.carousel-1>img:last');
			e.removeClass('d-none').attr({'src':'../../public/img/'+imgs[i]});
		}
		var href='http://671097.echu.net/blog/public/index.php/';
		for(i=2;i<=5;i++){
			let u=localStorage.getItem(i).split(',');
			$('.tooltip-1>div:first').clone(true).insertAfter('.tooltip-1>div:last').bind('click',function(){
				window.location.assign(href+u[0]);
			}).children('i').addClass(u[1]).removeClass('fa-home').siblings('span').text(u[2]);
		}
		$('[data-toggle="tooltip"]').attr({'title':$('.tooltip-1').clone(true).removeClass('d-none').html()}).tooltip();
	});
	window.setInterval(carousel1,2000);
	function carousel1(){
		if($('.carousel-1>img').css('left')>'-0px'){
			$('.carousel-1>img').animate({left:'-=23.6rem'},1000);
		}else{
			$('.carousel-1>img').animate({left:'+=23.6rem'},1000);
		}
		console.log($('.carousel-1>img').css('left'))
	}
	function back(){
		window.history.back();
	}
	function home(){
		window.location.assign('{{route("home")}}');
	}
</script>
</body>
</html>
