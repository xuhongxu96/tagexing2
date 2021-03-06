@extends ('layouts.master', ['footer' => 'navbar-fixed-bottom'])

@section ('title', '借车成功')

@section ('body')

<div class="container">
	<div class="alert alert-success text-center">
		<span class="glyphicon glyphicon-ok glyphicon-lg"></span>
		<h3>开锁密码</h3>
		<p class="lock-pwd">{{ $password }}</p>
		<p><a class="btn btn-danger" href="{{ action('ReturnController@getReport') }}" role="button">无法使用？点此报修</a></p>
		<p><a class="btn btn-default" href="#" role="button">不会开锁？点此查看帮助</a></p>
	</div>
</div>

@stop

@section ('footer')
<a class="btn btn-primary btn-block navbar-btn btn-lg" href="{{ action('IndexController@redirect') }}" aria-label="home">
<span class="glyphicon glyphicon-home" aria-hidden="true"></span>
返回首页
</a>
@stop
