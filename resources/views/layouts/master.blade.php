<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width">

    <title>踏鸽行 - @yield('title')</title>

    <!-- Bootstrap -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link href="{{ asset('main/main.css') }}" rel="stylesheet">
	<style>
		@yield('style')
	</style>
</head>

<body>
	<div id="curtain">Loading...</div>
    <nav class="navbar navbar-default">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
				<a class="pull-left btn btn-default navbar-btn visible-xs-block" href="javascript:history.back();" aria-label="back">
					<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					返回
				</a>
                <a class="navbar-brand" href="{{ url('redirect') }}">踏鸽行</a>
				<p class="navbar-text">@yield('title')</p>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="{{ action('UsersController@edit') }}">编辑个人信息</a></li>
                    <li><a href="#">使用帮助</a></li>
                    <li><a href="#">我要捐赠 <span class="label label-danger">HOT</span></a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">商业合作 <span class="label label-info">NEW</span> <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">转让车辆</a></li>
                            <li><a href="#">广告投放</a></li>
                            <li><a href="#">车辆冠名</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">关于我们 <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">踏鸽行团队</a></li>
                            <li><a href="http://xuhongxu.cn">开发者官网</a></li>
                        </ul>
                    </li>
					<li><a href="#">联系我们</a></li>
                </ul>
			</div>
		</div>
    </nav>
    @yield('body')
<nav class="navbar navbar-default {{ $footer or 'hidden' }}"> 
	<div class="container-fluid">
@yield('footer')
	</div>
</nav>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('main/main.js') }}"></script>
</body>

</html>
