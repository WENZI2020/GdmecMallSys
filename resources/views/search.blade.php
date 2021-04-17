<!doctype html>
<html lang="zh-cn">
<head>
<title>搜索</title>
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
	.list-group{
		position: absolute;
		top: 3.5rem;
		left: 0;
		z-index: 10;
	}
</style>
</head>

<body data-spy="scroll" data-target="#navbars">
<nav class="navbar navbar-light navbar-expand-sm bg-light fixed-top">
	<i class="fa navbar-brand fa-chevron-left" onclick="back()"></i>
	<form class="form-inline mx-auto" id="forms" method="get" action="{{route('home')}}">
		<div class="input-group input-group-sm">
			<div class="input-group-prepend">
				<span class="input-group-text bg-white text-secondary">
					<i class="fa fa-search"></i>
				</span>
			</div>
			<input class="form-control" type="search" name="q" autocomplete="off" autofocus placeholder="搜索词" oninput="relatedword()" />
		</div>
	</form>
	<button class="btn btn-sm btn-dark font-weight-light" type="submit" form="forms">搜索</button>
</nav>
<div class="block w-100"></div>
<ul class="list-group w-100">
	<li class="list-group-item border-left-0 border-right-0 d-none">
		<span></span>
		<i class="fa fa-crosshairs fa-border border-0 float-right text-secondary"></i>
	</li>
</ul>
<div class="d-flex-1 d-flex flex-wrap flex-row justify-content-around small text-nowrap">
	<p class="order-0 lead w-100 pl-3 mb-0">热门搜索
		<i class="fa fa-border border-0 mr-1 float-right text-secondary fa-random fa-rotate-270" onclick="random()"></i>
	</p>
	<div class="rounded rounded-pill bg-light px-2 py-2 ml-2 mb-2 d-none"></div>
</div>
<div class="d-flex-2 d-flex flex-wrap flex-row justify-content-around small text-nowrap">
	<p class="order-0 lead w-100 pl-3 mb-0">最近搜索
		<i class="fa fa-lg fa-border border-0 float-right text-secondary fa-trash-o" onclick="trash()"></i>
	</p>
	<div class="rounded rounded-pill bg-light px-2 py-2 ml-2 mb-2 d-none"></div>
</div>
<script type="text/javascript">
	var db;
	$().ready(function(){
		$.getJSON('https://v1.alapi.cn/api/tophub/wiki',function(data,status,xhr){
			for(i=0;i<data.data.new.length;i++){
				var e=$('.d-flex-1>div:first').clone(true).insertAfter('.d-flex-1>div:last');
				e.removeClass('d-none').text(data.data.new[i].title);
			}
			$('.d-flex-1>div').not(':first').slice(data.data.new.length/2,-1).addClass('d-none');
			$('.d-flex-1>div:last').addClass('d-none');
		});
		db=openDatabase('websqlite','1.0','','2*1024*1024');
		db.transaction(function(dbo){
			dbo.executeSql('SELECT * FROM searches',[],function(dbo,r){
				for(i=0;i<r.rows.length;i++){
					var e=$('.d-flex-2>div:last').clone(true).insertBefore('.d-flex-2>div:first');
					e.removeClass('d-none').text(r.rows[i].name);
				}
			},null);
		});
	});
	window.setInterval(placeholder,2000);
	function back(){
		window.history.back();
	}
	function placeholder(){
		var p=$('.d-flex-1>div').not('.d-none');
		if(p.length!=0){
			$('.form-control').attr({'placeholder':p.eq(Math.floor(Math.random()*p.length)).text()});
		}
	}
	function relatedword(){
		$('.list-group-item').not(':first').detach();
		$.ajax({url:'https://suggest.taobao.com/sug',
			type:'get',
			dataType:'jsonp',
			data:{code:'utf-8',q:$('[name="q"]').val()},
			success:function(data){
				for(i=0;i<data.result.length;i++){
					var e=$('.list-group-item:first').clone(true).insertAfter('.list-group-item:last');
					e.removeClass('d-none').children('span').text(data.result[i][0]);
				}
			}
		});
	}
	function random(){
		$('.d-flex-1>div').not(':first').toggleClass('d-none');
	}
	function trash(){
		db.transaction(function(dbo){
			dbo.executeSql('DELETE FROM searches',[],function(dbo,r){
				$('.d-flex-2>div:first').detach();
			},null);
		});
	}
</script>
</body>
</html>
