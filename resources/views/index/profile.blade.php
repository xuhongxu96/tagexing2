<?php
  //set headers to NOT cache a page
  header("Cache-Control: no-cache, must-revalidate, no-store"); //HTTP 1.1
  header("Pragma: no-cache"); //HTTP 1.0
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past
?>
@extends ('layouts/master', ['footer' => 'navbar-fixed-bottom'])

@section ('title', '个人档案')

@section ('body')

<div class="container">

@include ('index.header')

<div class="list-group">
	<div class="list-group-item list-group-item-info">踏鸽行驶证 <span class="badge">{{ $user->created_at }}注册</span> </div>
	<a class="list-group-item" href="{{ action("UsersController@edit", ['id' => $user->id]) }}">
		<strong> {{ $user->name }} </strong>
		<br> 
		<small>{{ $user->student_id }} </small>
		<small>{{ $user->student_type }}</small>
		<br> 
		<small>来自 {{ $user->school }} {{ $user->department }}  </small>
		<br>
	</a>
	<div class="list-group-item list-group-item-info">状态信息</div>
@include ('index.' . $user->state . '.info')
	<div class="list-group-item list-group-item-info">成长记录</div>
	<a class="list-group-item {{ $user->score <= 0 ? 'list-group-item-danger' : '' }}" href="{{ action('IndexController@score') }}">积分：{{ $user->score }}</a>
	<div class="list-group-item">等级：{{ $rank->name or '没等级啦～' }}</div>
@if (Cache::get('special_time', false))
	<div class="list-group-item">允许借车时长：{{ $rank->max_time_special or 0 }}小时<span class="label label-warning">活动时期</span></div>
@else
	<div class="list-group-item">允许借车时长：{{ $rank->max_time or 0 }}小时</div>
@endif
	<div class="list-group-item">累计借车时长：{{ $user->total or 0}}</div>
<!-- 车站信息列表，暂无必要 -->
<!--
	<div class="list-group-item list-group-item-info">车站信息</div>
@foreach ($stops as $stop)
	<div class="list-group-item {{ $stop->bikes->count() ? '' : 'list-group-item-warning' }}">{{ $stop->name }}站：{{ $stop->bikes->count() }}辆车</div>
@endforeach
-->
</div>
</div>

@stop

@section ('footer')
@include ('index.' . $user->state . '.footer')
@stop

