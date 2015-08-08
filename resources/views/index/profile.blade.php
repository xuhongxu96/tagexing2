@extends ('layouts/master')

@section ('title', '个人档案')

@section ('style')
	body { padding-bottom: 70px; }
@endsection

@section ('body')

<div class="container">

@include ('index.header')

<div class="list-group">
	<div class="list-group-item list-group-item-info">踏鸽行驶证</div>
	<a class="list-group-item" href="{{ action("UsersController@edit", ['id' => $user->id]) }}"><small class="pull-right">{{ $user->student_type }}</small><strong> {{ $user->name }} </strong> <br> <small>{{ $user->student_id }} <br> 来自 {{ $user->school }} {{ $user->department }}  </small></a></li>
	<div class="list-group-item list-group-item-info">状态信息</div>
@include ('index.' . $user->state . '.info')
	<div class="list-group-item list-group-item-info">成长记录</div>
	<a class="list-group-item" href="#">积分：{{ $user->score }}</a>
	<div class="list-group-item">等级：初级骑手</div>
	<div class="list-group-item">允许借车时长：2小时</div>
	<div class="list-group-item">累计借车时长：1小时</div>
	<div class="list-group-item list-group-item-info">车站信息</div>
	<div class="list-group-item">教八车站：4辆车</div>
	<div class="list-group-item list-group-item-warning">教八车站：0辆车</div>
</div>

<nav class="navbar navbar-default navbar-fixed-bottom">
	<div class="container">
@include ('index.' . $user->state . '.footer')
	</div>
</nav>

</div>

@endsection
