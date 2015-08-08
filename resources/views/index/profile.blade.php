@extends ('layouts/master')

@section ('title', '个人档案')

@section ('style')
	body { padding-bottom: 70px; }
@endsection

@section ('body')

<div class="container">

@include ('index.header')

<ul class="list-group">
	<li class="list-group-item list-group-item-info">状态信息</li>
	<li class="list-group-item">状态：{{ $user->state }}</li>
	<li class="list-group-item list-group-item-info">等级信息</li>
	<li class="list-group-item">积分：10</li>
	<li class="list-group-item list-group-item-info">车站信息</li>
</ul>

<nav class="navbar navbar-default navbar-fixed-bottom">
	<div class="container">
		<a class="btn btn-primary navbar-btn btn-block" href="#">我要借车</a>
	</div>
</nav>

</div>

@endsection
