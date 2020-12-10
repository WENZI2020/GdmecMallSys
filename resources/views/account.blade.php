<!doctype html>
<html lang="zh-cn">
<head>
<title>我的</title>
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
	.header-info{
		width: 5.6rem;
		height: 5.6rem;
	}
	.header-side{
		position: relative;
		bottom: 0;
		left: 0;
		height: 2.8rem;
		border-bottom-left-radius: 10rem 1rem;
		border-bottom-right-radius: 10rem 1rem;
	}
	.header-side>div{
		border-radius: 0.8rem 0.8rem 0 0;
	}
	.d-flex-1>div{
		height: 5rem;
		width: 4rem;
	}
	.d-flex-2{
		background-color: #EEE;
	}
</style>
</head>

<body data-spy="scroll" data-target="#navbars">
<nav class="navbar navbar-light navbar-expand-sm bg-light fixed-top">
	<i class="fa navbar-brand fa-columns fa-flip-vertical" onclick="home()"></i>
	<span class="mx-auto"></span>
	<i class="fa navbar-brand fa-bullhorn"></i>
	<i class="fa navbar-brand fa-sliders"></i>
</nav>
<div class="block w-100"></div>
<div class="text-white bg-secondary pt-3 pb-2">
	<div class="header-info border rounded-circle overflow-hidden bg-white mx-3 mb-3 d-inline-block">
		<img class="w-100" />
	</div>
	<div class="lead position-absolute d-inline-block mt-2">user</div>
	<div class="d-flex flex-nowrap flex-row justify-content-around small text-nowrap text-center">
		<div class="flex-grow-1"><h2>0</h2>商品收藏</div>
		<div class="flex-grow-1"><h2 class="border-left border-right">0</h2>打卡签到</div>
		<div class="flex-grow-1"><h2>0</h2>浏览记录</div>
	</div>
</div>
<div>
	<div class="header-side w-100 bg-secondary overflow-hidden">
		<div class="w-75 h-100 mx-auto bg-dark"></div>
	</div>
	<p class="mb-1 mx-2 border-bottom">我的订单
		<i class="fa fa-lg fa-border border-0 text-secondary float-right fa-angle-right"></i>
		<span class="text-secondary float-right">全部</span>
	</p>
	<div class="d-flex-1 d-flex flex-nowrap flex-row justify-content-around small text-nowrap text-center text-secondary">
		<div><i class="fa fa-4x fa-stop-circle"></i><br/>待付款</div>
		<div><i class="fa fa-4x fa-inbox"></i><br/>待发货</div>
		<div><i class="fa fa-4x fa-truck"></i><br/>待收货</div>
		<div><i class="fa fa-4x fa-ellipsis-h"></i><br/>待评价</div>
		<div><i class="fa fa-4x fa-compass"></i><br/>退款中</div>
	</div>
</div>
<div class="d-flex-2 text-nowrap p-1">
	<div class="card border-0">
		<div class="card-body p-0">
			<div class="card-title m-1">
				<i class="fa fa-lg fa-border border-0 fa-user-secret"></i>
				<span>我是商家</span>
				<i class="fa fa-lg fa-border border-0 text-secondary float-right fa-angle-right"></i>
			</div>
		</div>
		<div class="card-body p-0 border-top">
			<div class="card-title m-1">
				<i class="fa fa-lg fa-border border-0 fa-bullseye"></i>
				<span>幸运转盘</span>
				<i class="fa fa-lg fa-border border-0 text-secondary float-right fa-angle-right"></i>
			</div>
		</div>
		<div class="card-body p-0 border-top">
			<div class="card-title m-1">
				<i class="fa fa-lg fa-border border-0 fa-globe"></i>
				<span>收货地址</span>
				<i class="fa fa-lg fa-border border-0 text-secondary float-right fa-angle-right"></i>
			</div>
		</div>
		<div class="card-body p-0 border-top">
			<div class="card-title m-1">
				<i class="fa fa-lg fa-border border-0 fa-google-plus-circle"></i>
				<span>邀请好友</span>
				<i class="fa fa-lg fa-border border-0 text-secondary float-right fa-angle-right"></i>
			</div>
		</div>
		<div class="card-body p-0 border-top">
			<div class="card-title m-1">
				<i class="fa fa-lg fa-border border-0 fa-info-circle"></i>
				<span>关于我们</span>
				<i class="fa fa-lg fa-border border-0 text-secondary float-right fa-angle-right"></i>
			</div>
		</div>
		<div class="card-body p-0 border-top">
			<div class="card-title m-1">
				<i class="fa fa-lg fa-border border-0 fa-question-circle-o"></i>
				<span>常见问题</span>
				<i class="fa fa-lg fa-border border-0 text-secondary float-right fa-angle-right"></i>
			</div>
		</div>
	</div>
</div>
<div class="small w-100 pb-1 mb-5 text-center text-nowrap">
	<a class="border-bottom border-secondary">个人中心</a>
	<span class="border-bottom border-secondary mx-4" onclick="movetop2()">返回顶部</span>
	<a class="border-bottom border-secondary" href="{{route('home',['q'=>'logout'])}}">退出登录</a><br/>
	<span>&copy; 2020 机电网购平台(系统) 版权所有</span>
</div>
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
	function movetop2(){
		$('html,body').animate({scrollTop:0},80);
	}
</script>
</body>
</html>

