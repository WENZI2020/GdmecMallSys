<!doctype html>
<html lang="zh-cn" manifest="{{asset('website.appcache')}}">
<head>
<title>机电网购平台(系统)</title>
@include('basic')
<script type="text/javascript" src="https://api.map.baidu.com/api?v=2.0&type=webgl&ak=8cgmD6rtGHTqkuZYqhMfkK13drcPweUF"></script>
<style type="text/css" media="all">
	body{
		position: relative;
		top: 0;
		left: 0;
		padding: 0;
		margin: 0;
	}
	.block{
		height: 7.1rem;
	}
	.alert{
		position: fixed;
		top: 3.7rem;
		right: 0.2rem;
		z-index: 2000;
	}
	.noimg{
		position: absolute;
		left: 0;
		right: 0;
		text-align: center;
	}
	.carousel-item{
		text-shadow: 0.1rem 0.1rem 0.4rem #000;
		height: 20rem;
	}
	.carousel-side{
		position: absolute;
		bottom: 0;
		left: 0;
		height: 1.3rem;
		border-top-left-radius: 10rem 1rem;
		border-top-right-radius: 10rem 1rem;
	}
	.movetop-1{
		position: fixed;
		right: 0.5rem;
		bottom: 4.3rem;
		z-index: 10;
		opacity: 0.8;
	}
	.d-flex-1{
		height: 9rem;
	}
	.d-flex-1>div{
		width: 4rem;
	}
	.d-flex-2{
		background-color: #EEE;
		padding: 0.1rem;
	}
	.d-flex-2>div{
		width: 9.7rem;
		margin: 0.1rem;
	}
</style>
</head>

<body data-spy="scroll" data-target="#navbars">
<div class="fixed">
<nav class="navbar navbar-dark navbar-expand-sm bg-dark">
	<span class="badge navbar-brand" onclick="reload()">机电<br/>商城</span>
	<div class="btn-group btn-group-sm mx-auto">
		<button class="btn btn-light" onclick="search()">搜索分类/品牌/商品</button>
	</div>
	<i class="fa text-white fa-bullhorn navbar-brand"></i>
	<i class="fa text-white fa-user-circle-o navbar-brand" onclick="account()"></i>
</nav>
<nav class="navbar navbar-light bg-light">
	<span class="navbar-text">推荐</span>
	<span class="navbar-text" id="geo">定位中</span>
	<button class="navbar-toggler border-0" data-toggle="collapse" data-target="#collapsed">
		<span class="navbar-toggler-icon small"></span>
	</button>
	<div class="navbar-collapse collapse" id="collapsed">
		<ul class="navbar-nav">
		    @foreach($dropdown as $i)
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" data-toggle="dropdown">{{$i->contents}}</a>
				<div class="dropdown-menu text-center">
					<a class="dropdown-item small">全部</a>
					@if(count($is=array_filter(array_slice($i->toArray(),4)))>0)
					<div class="dropdown-divider"></div>
					@foreach($is as $u)
					<a class="dropdown-item small">{{$u}}</a>
					@endforeach
					@endif
				</div>
			</li>
			@endforeach
		</ul>
	</div>
</nav>
</div>
<div class="alert alert-dismissible fade alert-light text-center border">
	<a class="alert-link text-dark font-weight-bold">警告信息</a>
	<button class="close" data-dismiss="alert">
	    <i class="fa fa-close"></i>
	</button>
</div>
<div class="block w-100 d-none"></div>
<div class="carousel slide bg-secondary" data-ride="carousel">
	<a class="carousel-control-prev" data-slide="prev" href=".carousel">
		<span class="carousel-control-prev-icon"></span>
	</a>
	<a class="carousel-control-next" data-slide="next" href=".carousel">
		<span class="carousel-control-next-icon"></span>
	</a>
	<ul class="carousel-indicators">
		<li class="active" data-slide-to="0" data-target=".carousel"></li>
		<li data-slide-to="1" data-target=".carousel"></li>
		<li data-slide-to="2" data-target=".carousel"></li>
	</ul>
	<div class="carousel-inner">
		<i class="noimg fa fa-5x fa-image text-white pt-5 mt-5"></i>
		<div class="carousel-item text-white active">
			<img class="w-100" src="http://bing.ioliu.cn/v1/rand?w=1080&h=1080" />
			<div class="carousel-caption">
				<h1 class="text-uppercase">临期食品</h1>
				<span>全场清仓大甩卖</span>
				<p class="mb-5 pb-5">全部百货都不留</p>
			</div>
		</div>
		<div class="carousel-item text-white">
			<img class="w-100" src="http://bing.ioliu.cn/v1/rand?w=1024&h=1024" />
			<div class="carousel-caption">
				<h1 class="text-uppercase">断码衣鞋</h1>
				<span>全场清仓大甩卖</span>
				<p class="mb-5 pb-5">全部百货都不留</p>
			</div>
		</div>
		<div class="carousel-item text-white">
			<img class="w-100" src="http://bing.ioliu.cn/v1/rand?w=1050&h=1050" />
			<div class="carousel-caption">
				<h1 class="text-uppercase">满减直送</h1>
				<span>全场清仓大甩卖</span>
				<p class="mb-5 pb-5">全部百货都不留</p>
			</div>
		</div>
	</div>
	<div class="carousel-side w-100 bg-white"></div>
</div>
<i class="movetop-1 fa fa-2x fa-arrow-up fa-border border rounded-circle bg-white" onclick="movetop1()"></i>
<div class="d-flex-1 d-flex flex-wrap flex-row justify-content-around small text-nowrap text-center">
	<div class="h-50"><i class="fa fa-4x fa-clock-o"></i><br/>天气预报</div>
	<div class="h-50"><i class="fa fa-4x fa-calendar"></i><br/>天气预报</div>
	<div class="h-50"><i class="fa fa-4x fa-calculator"></i><br/>天气预报</div>
	<div class="h-50"><i class="fa fa-4x fa-facebook"></i><br/>天气预报</div>
	<div class="h-50"><i class="fa fa-4x fa-facebook"></i><br/>天气预报</div>
	<div class="h-50"><i class="fa fa-4x fa-sun-o"></i><br/>天气预报</div>
	<div class="h-50"><i class="fa fa-4x fa-map-signs"></i><br/>天气预报</div>
	<div class="h-50"><i class="fa fa-4x fa-pie-chart"></i><br/>天气预报</div>
	<div class="h-50"><i class="fa fa-4x fa-facebook"></i><br/>天气预报</div>
	<div class="h-50"><i class="fa fa-4x fa-facebook"></i><br/>天气预报</div>
</div>
<div class="d-flex-2 d-flex flex-wrap flex-row small text-nowrap justify-content-center">
	<p class="order-0 lead w-100 mb-0 text-center">猜你喜欢</p>
	<div class="card overflow-hidden border-0">
		<img class="card-img-top bg-dark" src=".jpg" />
		<div class="card-body p-0">
			<span class="card-title">山寨洗衣机</span><br/>
			<span class="card-text text-secondary">品质保真，高性价比。</span><br/>
			<span class="badge badge-secondary badge-pill">自营</span>
			<a class="card-link">&yen;999.0</a>
		</div>
	</div>
	<div class="card overflow-hidden border-0">
		<img class="card-img-top bg-dark" src=".jpg" />
		<div class="card-body p-0">
			<span class="card-title">山寨洗衣机</span><br/>
			<span class="card-text text-secondary">品质保真，高性价比。</span><br/>
			<span class="badge badge-secondary badge-pill">自营</span>
			<a class="card-link">&yen;999.0</a>
		</div>
	</div>
</div>
<div class="small w-100 pb-1 mb-5 text-center text-nowrap">
	<span class="border-bottom border-secondary" onclick="movetop2()">返回顶部</span><br/>
	<span>&copy; 2020 机电网购平台(系统) 版权所有</span>
</div>
<nav class="navbar navbar-light navbar-expand-sm bg-light fixed-bottom text-nowrap text-center">
	<div class="d-inline-flex flex-column" onclick="home()"><i class="fa fa-lg fa-home"></i><span class="badge">首页</span></div>
</nav>
<script type="text/javascript">
	$().ready(function(){
		localStorage.setItem('1',['home','fa-home','首页']);
		localStorage.setItem('2',['category','fa-bars','分类']);
		localStorage.setItem('3',['nowlive','fa-video-camera','短视频']);
		localStorage.setItem('4',['shopcart','fa-shopping-cart','购物车']);
		localStorage.setItem('5',['account','fa-user','我的']);
		for(i=2;i<=5;i++){
			let u=localStorage.getItem(i).split(',');
			$('.fixed-bottom>div:first').clone(true).insertAfter('.fixed-bottom>div:last').bind('click',function(){
				window.location.assign(u[0]);
			}).children('i').addClass(u[1]).removeClass('fa-home').siblings('span').text(u[2]);
		}
		var q=decodeURIComponent(window.location.search.substr(3)).replace(/<[^<>]+>/g,'').replace(/\++/g,' ').trim();
		openDatabase('websqlite','1.0','','2*1024*1024').transaction(function(dbo){
			if(q.length!=0){
			   dbo.executeSql('CREATE TABLE IF NOT EXISTS searches(name VARCHAR(100) unique NOT NULL)');
			   dbo.executeSql('INSERT INTO searches(name) VALUES(?)',[q]);
		    }
		});
		$(window).bind('scroll',function(){
			if(pageYOffset<110){
				$('.block').addClass('d-none');
				$('.fixed').removeClass('fixed-top');
				$('.movetop-1').fadeOut();
			}else if(pageYOffset>=110){
				$('.block').removeClass('d-none');
				$('.fixed').addClass('fixed-top');
				$('.movetop-1').fadeIn();
			}
		});
	});
	function reload(){
		window.location.reload();
	}
	function home(){
		window.location.assign('{{route("home")}}');
	}
	function search(){
		window.location.assign('{{route("search")}}');
	}
	function account(){
		window.location.assign('{{route("account")}}');
	}
	function movetop1(){
		$('html,body').animate({scrollTop:0},500);
	}
	function movetop2(){
		$('html,body').animate({scrollTop:0},80);
	}
	window.navigator.geolocation.getCurrentPosition(function(e){
		var point=new BMapGL.Point(e.coords.longitude,e.coords.latitude);
		var geocoder=new BMapGL.Geocoder();
		geocoder.getLocation(point,function(r){
			var city=r.addressComponents.city;
			var district=r.addressComponents.district;
			$('#geo').text(city+district);
		});
	},function(e){
		$('.alert').addClass('show');
		switch(e.code){
		case e.PERMISSION_DENIED:
			$('.alert>a').text('用户拒绝访问');
			break;
		case e.POSITION_UNAVAILABLE:
			$('.alert>a').text('位置无法获取');
			break;
		case e.TIMEOUT:
			$('.alert>a').text('设备请求超时');
			break;
		case e.UNKNOWN_ERROR:
			$('.alert>a').text('未知错误');
			break;
		}
	});
</script>
</body>
</html>