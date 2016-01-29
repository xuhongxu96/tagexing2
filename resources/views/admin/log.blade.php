@extends ('admin/layout')

@section('title', '后台日志')

@section('body')
	<div class="container">
		<h3>后台日志</h3>
		<table class="table table-hover table-condensed">
			<tr>
				<th>管理员用户</th>
				<th>日志</th>
				<th>时间</th>
			</tr>
@foreach ($log as $item)
	<tr>
		<td>{{ $item->user->name }}</td>
		<td>{!! nl2br(e($item->log)) !!}</td>
		<td>{{ $item->updated_at }}</td>
	</tr>
@endforeach
		</table>
	</div>
@stop

