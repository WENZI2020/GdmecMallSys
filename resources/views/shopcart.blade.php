<!doctype html>
<html lang="zh-cn">
<head>
<title>购物车</title>
@include('basic')
<style type="text/css" media="all">
	body{
		position: relative;
		top: 0;
		left: 0;
		padding: 0;
		margin: 0;
	}
	.block{
		height: 3.6rem;
	}
</style>
</head>

<body data-spy="scroll" data-target="#navbars">
<nav class="navbar navbar-light navbar-expand-sm bg-light fixed-top">
	<i class="fa navbar-brand fa-chevron-left" onclick="back()"></i>
	<span class="navbar-text mx-auto">购物车</span>
	<i class="fa navbar-brand fa-user-circle-o" onclick="account()"></i>
</nav>
<div class="block w-100"></div>
<div class="text-center pt-5">
	<i class="fa fa-5x fa-shopping-basket"></i>
	<p>您的购物车没有商品</p>
	<button class="btn btn-sm btn-outline-dark" onclick="home()">去逛逛</button>
</div>
<div class="mb-5 w-100"></div>
<nav class="navbar navbar-light navbar-expand-sm bg-light fixed-bottom text-nowrap text-center">
	<div class="d-inline-flex flex-column" onclick="home()"><i class="fa fa-lg fa-home"></i><span class="badge">首页</span></div>
</nav>
<script type="text/javascript">
	$().ready(function(){
		for(i=2;i<=5;i++){
			let u=localStorage.getItem(i).split(',');
			$('.fixed-bottom>div:first').clone(true).insertAfter('.fixed-bottom>div:last').bind('click',function(){
				window.location.assign(u[0]);
			}).children('i').addClass(u[1]).removeClass('fa-home').siblings('span').text(u[2]);
		}
	});
	function back(){
		window.history.back();
	}
	function home(){
		window.location.assign('{{route("home")}}');
	}
	function account(){
		window.location.assign('{{route("account")}}');
	}
</script>
</body>
</html>
