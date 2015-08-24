@extends ('layouts/master', ['footer' => 'navbar-fixed-bottom'])

@section('title', '使用帮助')

@section('body')

<div class="container">
	<img class="img-responsive center-block" src="{{ asset('images/logo.png') }}">

	<div class="list-group">
		<div class='list-group-item list-group-item-info'>使用帮助</div>
		<a class='list-group-item' href="#">加入计划</a>
		<a class='list-group-item' href="#">借车指南</a>
		<a class='list-group-item' href="#">还车指南</a>
		<a class='list-group-item' href="#">捐赠与商业合作</a>
		<a class='list-group-item' href="#">规章制度</a>
		<div class='list-group-item list-group-item-info'>常见问题</div>
		<a class='list-group-item' href="#">踏鸽行2.0和1.0相比有什么改进？</a>
		<div class='list-group-item list-group-item-success'>注册认证</div>
		<a class='list-group-item' href="#">既然可以直接注册，为什么还要有学校认证？</a>
		<a class='list-group-item' href="#">目前没有我们学校，我可以加入踏鸽行计划吗？</a>
		<a class='list-group-item' href="#">注册之后审核要多少天？</a>
		<a class='list-group-item' href="#">为什么我提交注册信息后直接就审核通过了？</a>
		<div class='list-group-item list-group-item-success'>用户信息</div>
		<a class='list-group-item' href="#">我换手机号、换邮箱或者换QQ了怎么办？</a>
		<a class='list-group-item' href="#">积分和等级有什么用处？</a>
		<div class='list-group-item list-group-item-success'>车辆与车站</div>
		<a class='list-group-item' href="#">公共自行车前后的二维码有什么用？</a>
		<a class='list-group-item' href="#">踏鸽行车站站牌上的动态密码有什么用？</a>
		<a class='list-group-item' href="#">踏鸽行车站站牌上的动态密码没有显示？</a>
		<div class='list-group-item list-group-item-success'>借车</div>
		<a class='list-group-item' href="#">只能通过选择车辆借车吗？</a>
		<a class='list-group-item' href="#">车站动态码是什么？在哪里？</a>
		<a class='list-group-item' href="#">借车后，用平台提供的密码无法打开车锁怎么办？</a>
		<a class='list-group-item' href="#">借车后，发现车是坏的怎么办？</a>
		<div class='list-group-item list-group-item-success'>还车</div>
		<a class='list-group-item' href="#">为什么还车还要修改密码？</a>
		<a class='list-group-item' href="#">如何在还车时修改密码？</a>
		<div class='list-group-item list-group-item-success'>捐赠与商业合作</div>
		<a class='list-group-item' href="#">我有闲置的自行车，怎么才能捐给你们？</a>
		<a class='list-group-item' href="#">我很想奉献力量，却没有自行车怎么办？</a>
		<a class='list-group-item' href="#">我的自行车还很新，能不能低价转让？</a>
		<a class='list-group-item' href="#">我捐赠之后有什么好处吗？</a>
		<a class='list-group-item' href="#">踏鸽行项目中有哪些位置可供投放广告？</a>
		<a class='list-group-item' href="#">冠名权是怎么一回事？</a>
	</div>
</div>


@stop

@section ('footer')
<div class="row">
<div class="col-xs-6">
	<a class="btn btn-primary btn-block navbar-btn btn-lg" href="javascript:history.go(-1);" aria-label="home">
	<span class="glyphicon glyphicon-triangle-left" aria-hidden="true"></span>
	返回上级
	</a>
</div>
<div class="col-xs-6">
	<a class="btn btn-primary btn-block navbar-btn btn-lg" href="{{ action('IndexController@redirect') }}" aria-label="home">
	<span class="glyphicon glyphicon-home" aria-hidden="true"></span>
	返回首页
	</a>
</div>
@stop
