<!doctype html>
<html lang="zh-cn">
<head>
<title>登录</title>
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
	.alert{
		position: fixed;
		top: 3.7rem;
		right: 0.2rem;
		z-index: 2000;
	}
	.socialite>span{
		position: absolute;
		top: -0.7rem;
		left: 0;
		right: 0;
		z-index: 10;
	}
</style>
</head>

<body>
<div class="alert alert-dismissible fade alert-light text-center border">
	<a class="alert-link text-dark font-weight-bold">警告信息</a>
	<button class="close" data-dismiss="alert">
	    <i class="fa fa-close"></i>
	</button>
</div>
<div class="block w-100"></div>
<div class="text-center mx-2 pt-5">
	<i class="fa fa-2x fa-border font-weight-bold">积点<br/>商城</i>
	<form method="post" action="{{route('email')}}" onsubmit="submittext()">
		<div class="form-group border-bottom mt-3">
			<input class="form-control border-0" type="text" name="username" value="{{old('username')}}" placeholder="请输入电子邮箱地址" oninput="submitabled()" />
			<input class="form-control" type="hidden" name="_token" value="{{csrf_token()}}" />
		</div>
		<div class="input-group border-bottom">
			<input class="form-control border-0" type="password" name="captcha" placeholder="验证码" oninput="submitabled()" />
			<div class="input-group-append">
				<input class="form-control border-0 bg-white" type="button" name="ced" value="获取验证码" onclick="captchaed()" />
			</div>
		</div>
		<div class="small text-left text-danger pl-1 errors"></div>
		@foreach($errors->all() as $e)
		<div class="small text-left text-danger pl-1">{{$e}}</div>
		@endforeach
		<button disabled class="btn btn-block btn-dark mt-4" type="submit" id="submit">立即登录</button>
		<div class="small mt-1 pb-4">未注册的邮箱验证后自动注册</div>
	</form>
	<div class="socialite position-relative mt-5 pt-5 border-top">
		<span class="small text-secondary">其他登录方式</span>
		<a href="{{$fullurl[1]}}"><i class="fa fa-qq fa-2x fa-border border-0 text-white bg-primary rounded rounded-pill"></i></a>
		<a href="{{$fullurl[2]}}"><i class="fa fa-paw fa-2x fa-border border-0 text-white bg-primary rounded rounded-pill"></i></a>
		<a href="{{$fullurl[0]}}"><i class="fa fa-wechat fa-2x fa-border border-0 text-white bg-success rounded rounded-pill"></i></a>
		<a href="{{$fullurl[3]}}"><i class="fa fa-weibo fa-2x fa-border border-0 text-white bg-danger rounded rounded-pill"></i></a>
		<a href="{{$fullurl[4]}}"><i class="fa fa-github-alt fa-2x fa-border border-0 text-white bg-dark rounded rounded-pill"></i></a>
	</div>
</div>
<div class="mb-5 w-100"></div>
<div class="w-100 small text-center text-nowrap bg-white fixed-bottom text-secondary">
	<span>登录/注册即表示同意<a href="{{route('privacy')}}">《隐私保护政策》</a></span>
</div>
<script type="text/javascript">
	$().ready(function(){
	});
	function captchaed(){
		$.ajax({url:'{{route("email")}}',
			type:'post',
			data:{q:$('[name="username"]').val(),_token:'{{csrf_token()}}'},
			complete:function(data){
				if(data.status==422){
					$('.errors').text('用户名\t字段格式或含有语义错误');
				}else if(data.status==200){
					$('.errors').text('');
					$('[name="ced"]').attr({'disabled':true}).addClass('text-secondary');
				}
			}
		});
	}
	function submitabled(){
		if($('[name="username"]').val().length>0&&$('[name="captcha"]').val().length>0){
			$('form>button').removeAttr('disabled');
		}else{
			$('form>button').attr({'disabled':true});
		}
	}
	function submittext(){
		$('#submit').text('正在登录');
	}
	@if(session('alerted'))
		$('.alert').addClass('show');
	    $('.alert>a').text('验证码不匹配');
	@endif
</script>
</body>
</html>
