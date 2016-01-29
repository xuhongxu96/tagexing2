@extends ('admin/layout')

@section('title', '系统设置')

@section('body')
	<div class="container">
		<h3>系统设置</h3>
@if (Cache::get('special_time', false))
		<a class="btn btn-warning active" href="{{ action('AdminController@getSpecialTime', ['state' => 'disable']) }}">禁用活动时长</a>
@else
		<a class="btn btn-primary" href="{{ action('AdminController@getSpecialTime', ['state' => 'enable']) }}">启动活动时长</a>
@endif
<hr>
			{!! Form::open(['action' => 'AdminController@putBulletin', 'method' => 'PUT'])!!}
			{!! Form::label('type', '类型：', ['class' => 'control-label']) !!}
			{!! Form::select('type', ['info' => '信息', 'danger' => '严重警告', 'warning' => '警告', 'success' => '喜报'], Cache::get('tip')['type'], ['class' => 'form-control']) !!}
			{!! Form::label('content', '公告：', ['class' => 'control-label']) !!}
			{!! Form::textarea('content', Cache::get('tip')['message'], ['class' => 'form-control']) !!}
			{!! Form::submit('确认信息', ['class' => 'btn btn-primary btn-block']) !!}
			{!! Form::close() !!}
	</div>
@stop

