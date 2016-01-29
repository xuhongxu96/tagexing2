@extends ('admin/layout')

@section('title', '用户管理')

@section('body')
<div class="container">

<h3>用户管理</h3>


{!! $users->render() !!}
<div class="table-responsive">
		<table class="table table-hover table-condensed">
			<tr>
				<th>id</th>
				<th>姓名</th>
				<th>手机</th>
				<th>Email</th>
				<th>积分</th>
				<th>状态</th>
				<th>解禁时间</th>
				<th>注册时间</th>
				<th>操作</th>
			</tr>
        @foreach($users as $info)
			
			<tr>
				<td>{{ $info->id }}</td>
				<td>{{ $info->name }}</td>
				<td>{{ $info->mobile }}</td>
				<td>{{ $info->email }}</td>
				<td>{{ $info->score }}</td>
				<td>{{ trans('state.' . $info->state) }}</td>
				<td>{{ $info->free_at or '' }}</td>
				<td>{{ $info->created_at }}</td>
				<td>
{!! Form::open(array('action' => ['UserAdminController@destroy', 'id' => $info->id], 'method' => 'DELETE', 'class' => 'form-inline')) !!}
	<a class="btn btn-info btn-sm" href="{{ action('UserAdminController@show', ['id' => $info->id]) }}">详细</a>
@if ($info->state != 'register' && $info->state != 'auth')
	<a class="btn btn-warning btn-sm" href="{{ action('UserAdminController@auth', ['id' => $info->id]) }}">取消认证</a>
@else
	<a class="btn btn-success btn-sm" href="{{ action('UserAdminController@auth', ['id' => $info->id]) }}">认证</a>
@endif
@if ($user->auth & \Config::get('admin.adminUser'))
	<a class="btn btn-primary btn-sm" href="{{ action('UserAdminController@edit', ['id' => $info->id]) }}">编辑</a>
@endif
@if ($user->auth & \Config::get('admin.adminSetting'))
	<a class="btn btn-primary btn-sm" href="{{ action('UserAdminController@admin', ['id' => $info->id]) }}">管理权限</a>
@endif
{!! Form::close() !!}
				</td>
			</tr>

        @endforeach
		</table>
</div>
{!! $users->render() !!}


</div>

@stop

