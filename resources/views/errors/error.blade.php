@extends ('layouts/master', ['footer' => 'navbar-fixed-bottom'])

@section('title', '错误提示')

@section('body')

<div class="container text-danger">
	<div class="page-header">
		<h1>{{ $title }}</h1>
	</div>
	<p>{{ $error }}</p>
</div>

@stop

@section ('footer')
<div class="row">
<div class="col-xs-6">
	<a class="btn btn-primary btn-block navbar-btn" href="javascript:history.go(-1);" aria-label="home">
	<span class="glyphicon glyphicon-triangle-left" aria-hidden="true"></span>
	返回上级
	</a>
</div>
<div class="col-xs-6">
	<a class="btn btn-primary btn-block navbar-btn" href="{{ action('IndexController@redirect') }}" aria-label="home">
	<span class="glyphicon glyphicon-home" aria-hidden="true"></span>
	返回首页
	</a>
</div>
@stop
