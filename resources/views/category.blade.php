<!doctype html>
<html lang="zh-cn">
<head>
<title>分类</title>
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
	<div class="btn-group btn-group-sm mx-auto">
		<button class="btn btn-dark" onclick="search()">搜索分类/品牌/商品</button>
	</div>
	<i class="fa fa-bullhorn navbar-brand"></i>
	<i class="fa fa-user-circle-o navbar-brand" onclick="account()"></i>
</nav>
<div class="block w-100"></div>
<div class="d-flex flex-row flex-nowrap justify-content-between">
<iframe class="iframe-1 border-0 w-25 vh-100">
	@include('basic')
	<body class="m-0">
		<ul class="list-group text-center border-right border-secondary text-nowrap">
			@foreach($iframe1 as $i)
			<li class="list-group-item px-0 rounded-0 border-0">{{$i->contents}}</li>
			@endforeach
		</ul>
		<script type="text/javascript">
		    $('.list-group-item:contains({{$q}})').addClass('text-white bg-secondary');
	    	$('html,body').animate({scrollTop:$('.list-group-item:contains({{$q}})').offset().top},500);
			$('.list-group-item').bind('click',function(){
				top.postMessage($(this).text(),'{{route("category")}}');
			});
		</script>
	</body>
</iframe>
<iframe class="iframe-2 border-0 w-75 vh-100">
	@include('basic')
	<body class="m-0">
		<ul class="list-group small">
			<li class="list-group-item rounded-0 border-right-0 border-left-0">
				<span>全部</span>
				<i class="fa fa-lg fa-border border-0 float-right fa-angle-right"></i>
			</li>
			@foreach($iframe2 as $i)
			<li class="list-group-item rounded-0 border-right-0 border-left-0">
				<span>{{$i->units}}</span>
				<i class="fa fa-lg fa-border border-0 float-right fa-angle-right"></i>
			</li>
			@if(count($is=array_filter(array_slice($i->toArray(),4)))>0)
			<li class="list-group-item rounded-0 border-0 pb-2">
				<div class="d-flex flex-wrap flex-row justify-content-between text-nowrap">
				    @foreach($is as $u)
					<div class="rounded border mb-2 px-2">{{$u}}</div>
					@endforeach
				</div>
			</li>
			@endif
			@endforeach
		</ul>
	</body>
</iframe>
</div>
<div class="mb-5 w-100"></div>
<nav class="navbar navbar-light navbar-expand-sm bg-light fixed-bottom text-nowrap text-center">
	<div class="d-inline-flex flex-column" onclick="home()"><i class="fa fa-lg fa-home"></i><span class="badge">首页</span></div>
</nav>
<script type="text/javascript">
	$().ready(function(){
		var href='http://671097.echu.net/blog/public/index.php/';
		for(i=2;i<=5;i++){
			let u=localStorage.getItem(i).split(',');
			$('.fixed-bottom>div:first').clone(true).insertAfter('.fixed-bottom>div:last').bind('click',function(){
				window.location.assign(href+u[0]);
			}).children('i').addClass(u[1]).removeClass('fa-home').siblings('span').text(u[2]);
		}
		$('.iframe-1').attr({'srcdoc':$('.iframe-1').html()});
		$('.iframe-2').attr({'srcdoc':$('.iframe-2').html()});
	});
	window.addEventListener('message',function(e){
		window.location.replace('{{route("category")}}'+'?q='+e.data);
	});
	function back(){
		window.history.back();
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
</script>
</body>
</html>
