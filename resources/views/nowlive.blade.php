<!doctype html>
<html lang="zh-cn">
<head> 
<title>短视频</title>
@include('basic')
<style type="text/css" media="all">
	body{
		position: relative;
		top: 0;
		left: 0;
		padding: 0;
		margin: 0;
	}
	.navbar-dark{
		text-shadow: 0.1rem 0.1rem 1.3rem #000;
	}
	.fixed-right{
		position: fixed;
		right: 0;
		top: 3.6rem;
		bottom: 7.2rem;
		z-index: 1030;
	}
	.media-1{
		align-items: center;
		position: fixed;
		right: 0.5rem;
		bottom: 4.3rem;
		z-index: 10;
		width: 2.9rem;
		height: 2.9rem;
		animation: media-11 3.6s linear infinite paused;
	}
	.video-1{
		background: black no-repeat center;
		background-size: cover;
		position: absolute;
		top: 0;
		left: 0;
		z-index: -10;
		filter: blur(1.6rem);
	}
	.video-2{
		position: fixed;
		width: 7rem;
		height: 7rem;
		padding-left: 2rem;
		top: 0;
		bottom: 0;
		left: 0;
		right: 0;
		z-index: 1030;
		opacity: 0.8;
	}
	.av-title{
		text-shadow: 0.1rem 0.1rem 0.4rem #000;
		line-height: 1rem;
		position: fixed;
		left: 21%;
		right: 21%;
		bottom: 3.2rem;
		z-index: 10;
	}
	@keyframes media-11{
		from{transform: rotate(0deg);}
		to{transform: rotate(360deg);}
	}
</style>
</head>

<body>
<nav class="navbar navbar-dark navbar-expand-sm fixed-top text-white">
	<i class="fa navbar-brand fa-chevron-left" onclick="back()"></i><br/>
	<span class="navbar-text mx-auto">短视频</span><br/>
	<i class="fa navbar-brand fa-user-circle-o" onclick="account()"></i>
</nav>
<nav class="navbar navbar-dark fixed-right text-white text-center">
	<div class="d-inline-flex flex-column navbar-nav">
		<i class="fa fa-2x fa-heart mr-0"></i>
		<span class="badge">喜欢</span>
		<i class="fa fa-2x fa-commenting mr-0"></i>
		<span class="badge">评论</span>
		<i class="fa fa-2x fa-share mr-0"></i>
		<span class="badge">分享</span>
	</div>
</nav>
<div class="media-1 media border rounded-circle overflow-hidden bg-white" onclick="media1()">
	<div class="media-body">
		<audio onended="audiostop()"></audio>
		<img class="w-100" />
	</div>
</div>
<div class="media-2 media" onclick="media2()">
	<div class="media-body">
		<video class="vh-100 vw-100" loop></video>
	</div>
</div>
<div class="video-1 vh-100 vw-100"></div>
<i class="video-2 m-auto fa fa-5x fa-play fa-border border text-white rounded-circle" onclick="video2()"></i>
<div class="av-title text-white overflow-hidden text-center">
	<span class="text-justify"></span>
	<div class="d-inline-block mt-1 text-nowrap position-relative"></div>
</div>
<nav class="navbar navbar-dark navbar-expand-sm fixed-bottom text-nowrap text-center text-light">
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
		audiolamp();
		$.getJSON('https://v1.alapi.cn/api/video/url',{url:'https://v.douyin.com/JC5HLBG/'},function(data,status,xhr){
			$('video').attr({'src':data.data.video_url,'poster':data.data.cover_url});
			$('.video-1').css({'background-image':'url('+data.data.cover_url+')'});
			$('.av-title>span').text(data.data.title);
		});
		$.getJSON('https://api.uomg.com/api/rand.music',{sort:'抖音榜',format:'json'},function(data,status,xhr){
			$('audio').attr({'src':data.data.url});
			$('audio').siblings('img').attr({'src':data.data.picurl});
			var s='';
			var a=data.data.name+'\t'+data.data.artistsname+'\t';
			var b=a.match(/[\w\d\s]+/g).join('').length/2;
			var c='<span>'+a+'</span>';
			var n=Math.ceil($('html,body').width()/(a.length-b)/16);
			for(i=0;i<n;i++){
				s=s+c;
			}
			$('.av-title>div').html(s);
		});
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
	function media1(){
		if($('audio')[0].paused||$('audio')[0].ended){
			$('audio')[0].play();
			$('.media-1').css({'animation-play-state':'running'});
		}else{
			$('audio')[0].pause();
			$('.media-1').css({'animation-play-state':'paused'});
		}
	}
	function media2(){
		if($('video')[0].paused||$('video')[0].ended){
			$('video')[0].play();
			$('.video-2').addClass('d-none');
		}else{
			$('video')[0].pause();
			$('.video-2').removeClass('d-none');
		}
	}
	function video2(){
		$('.media-2').trigger('click');
	}
	function audiostop(){
			$('.media-1').css({'animation-play-state':'paused'});
	}
	function audiolamp(){
		if($('.av-title>div').css('right')>'130px'){
			$('.av-title>div>span:first').clone(true).insertAfter('.av-title>div>span:last');
		}
		$('.av-title>div').animate({left:'-=4rem'},1800,audiolamp);
	}
</script>
</body>
</html>

