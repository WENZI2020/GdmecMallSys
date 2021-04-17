<!doctype html>
<html lang="zh-cn">
<head>
<title>隐私保护政策</title>
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
	.content>div{
		column-count: 2;
		-webkit-column-count: 2;
		-moz-column-count: 2;
		column-gap: 0.4rem;
		-webkit-column-gap: 0.4rem;
		-moz-column-gap: 0.4rem;
	}
</style>
</head>

<body data-spy="scroll" data-target="#navbars">
<div class="block w-100"></div>
<div class="lead text-center">隐私保护政策</div>
<div>生效日期：{{$date}}
	<a class="text-dark float-right border border-dark rounded rounded-pill" download href="{{asset('storage/privacys.txt')}}">下载</a>
	<div class="float-right border border-dark rounded rounded-pill" onclick="execCommand('print')">打印</div>
</div>
<span class="small font-weight-bold">本政策将帮助您了解以下内容：</span>
<ul class="breadcrumb small">
	<li class="breadcrumb-item d-none">
	    <a href="#"></a>
	</li>
</ul>
<div class="content text-justify">{{$read}}</div>
<div class="small w-100 pb-1 mb-5 text-center text-nowrap">
	<span class="border-bottom border-secondary" onclick="movetop2()">返回顶部</span><br/>
	<span>&copy; 2020 积点小曾 版权所有 备案许可证号：</span>
</div>
<script type="text/javascript">
    $().ready(function(){
    	$('.content').html($('.content').text());
    	for(i=0;i<$('.content>b').length;i++){
			var e=$('.breadcrumb-item:first').clone(true).insertAfter('.breadcrumb-item:last');
			e.removeClass('d-none').children('a').attr({'href':'#'+i}).text($('.content>b').eq(i).text());
		}
    });
	function movetop2(){
		$('html,body').animate({scrollTop:0},80);
	}
</script>
</body>
</html>