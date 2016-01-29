@extends ('admin/layout')

@section('title', '用户详细信息')

@section('body')
<div class="container">

	<h3>用户详细信息</h3>

	<table class="table table-hover table-condensed">
		<tr>
			<th>id</th>
			<td>{{ $info->id }} </td>
		</tr>
		<tr>
			<th>姓名</th>
			<td>{{ $info->name }} </td>
		</tr>
		<tr>
			<th>性别</th>
			<td>{{ trans('gender.' . $info->gender) }} </td>
		</tr>
		<tr>
			<th>Email</th>
			<td>{{ $info->email }} </td>
		</tr>
		<tr>
			<th>手机</th>
			<td>{{ $info->mobile }} </td>
		</tr>
		<tr>
			<th>QQ</th>
			<td>{{ $info->qq }} </td>
		</tr>
		<tr>
			<th>状态</th>
			<td>{{ trans('state.' . $info->state) }} </td>
		</tr>
		<tr>
			<th>解禁时间</th>
			<td>{{ $info->free_at or '' }} </td>
		</tr>
		<tr>
			<th>积分</th>
			<td>{{ $info->score }} </td>
		</tr>
		<tr>
			<th>累计借车时长</th>
			<td>{{ $info->total or 0 }} </td>
		</tr>
		<tr>
			<th>管理权限</th>
			<td>
			<ul>
			@if ($info->auth & Config::get('admin.adminHelp'))
			<li>帮助页面管理</li>
			@endif
			@if ($info->auth & Config::get('admin.adminBike'))
			<li>单车管理</li>
			@endif
			@if ($info->auth & Config::get('admin.adminStop'))
			<li>车站管理</li>
			@endif
			@if ($info->auth & Config::get('admin.adminLevel'))
			<li>等级管理</li>
			@endif
			@if ($info->auth & Config::get('admin.adminRent'))
			<li>借车信息管理</li>
			@endif
			@if ($info->auth & Config::get('admin.adminLog'))
			<li>后台日志管理</li>
			@endif
			@if ($info->auth & Config::get('admin.adminAuth'))
			<li>用户认证</li>
			@endif
			@if ($info->auth & Config::get('admin.adminUser'))
			<li>用户管理</li>
			@endif
			@if ($info->auth & Config::get('admin.adminSetting'))
			<li>系统管理</li>
			@endif
			</ul>
			</td>
		</tr>
		<tr>
			<th>学校</th>
			<td>{{ $info->school }} </td>
		</tr>
		<tr>
			<th>学号</th>
			<td>{{ $info->student_id }} </td>
		</tr>
		<tr>
			<th>学院</th>
			<td>{{ $info->department }} </td>
		</tr>
		<tr>
			<th>学生类型</th>
			<td>{{ $info->student_type }} </td>
		</tr>
		<tr>
			<th>管理员留言</th>
			<td>{{ $info->message }} </td>
		</tr>
		<tr>
			<th>注册时间</th>
			<td>{{ $info->created_at }} </td>
		</tr>
		<tr>
			<th>修改时间</th>
			<td>{{ $info->updated_at }} </td>
		</tr>
	</table>


</div>

@stop

