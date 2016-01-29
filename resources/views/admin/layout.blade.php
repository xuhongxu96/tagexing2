<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width">

    <title>踏鸽行 管理- @yield('title')</title>

    <!-- Bootstrap -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link href="{{ asset('main/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mr-uploader.min.css') }}" rel="stylesheet">
	<style>
		@yield('style')
	</style>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/mr-uploader.all.min.js') }}"></script>
	@yield('head')
</head>

@if (isset($footer))
<body style="padding-bottom: 60px;">
@else
<body>
@endif
	<!--<div id="curtain">Loading...</div>-->
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
				<a class="navbar-brand" href="{{ url('admin') }}"><span class="text-primary">踏鸽行</span></a>
				<p class="navbar-text"><span class="text-primary">@yield('title')</span></p>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav">
					<li><a href="{{ url('admin') }}">主页</a></li>
                    <li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">系统管理<span class="caret"></span></a>
                        <ul class="dropdown-menu">
@if ($user->auth & Config::get("admin.adminHelp", 1))
							<li><a href="{{ action('AdminController@getHelp') }}">帮助页面</a></li>
@endif
@if ($user->auth & Config::get("admin.adminSetting", 2))
							<li><a href="{{ action('AdminController@getSetting') }}">系统设置</a></li>
@endif
@if ($user->auth & Config::get("admin.adminLog", 4))
							<li><a href="{{ action('AdminController@getLog') }}">后台日志</a></li>
@endif
                        </ul>
                    </li>
@if ($user->auth & Config::get("admin.adminRent", 8))
					<li><a href="{{ action('AdminController@getRentInfo') }}">借车信息</a></li>
@endif
@if ($user->auth & Config::get("admin.adminLevel", 16))
					<li><a href="{{ action('RankController@index') }}">等级管理</a></li>
@endif
@if ($user->auth & Config::get("admin.adminStop", 32))
					<li><a href="{{ action('StopController@index') }}">车站管理</a></li>
@endif
@if ($user->auth & Config::get("admin.adminBike", 64))
					<li><a href="{{ action('BikeController@index') }}">单车管理</a></li>
@endif
@if (($user->auth & Config::get("admin.adminAuth", 128)) || ($user->auth & Config::get('admin.adminUser', 256)))
					<li><a href="{{ action('UserAdminController@index') }}">用户管理</a></li>
@endif
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

    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('main/main.js') }}"></script>
</body>

</html>
