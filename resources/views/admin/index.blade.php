@extends ('admin/layout')

@section('title', '管理首页')

@section('body')
<div class="jumbotron">
	<div class="container">
		<h1>踏鸽行管理</h1>
		<p>为用户提供最便捷的借车服务</p>
		<table class="table">
@if ($summary->newUser)
			<tr class="danger">
				<td>待审核用户</td>
				<td>{{$summary->newUser}}</td>
			</tr>
@endif
@if ($summary->breakBike)
			<tr class="danger">
				<td>待修和待转移车辆</td>
				<td>{{$summary->breakBike}}</td>
			</tr>
@endif
@if ($summary->disabledUser)
			<tr class="danger">
				<td>禁用用户</td>
				<td>{{$summary->disabledUser}}</td>
			</tr>
@endif
			<tr>
				<td>用户数量</td>
				<td>{{$summary->userCount}}</td>
			</tr>
			<tr>
				<td>借车超过五分钟的用户数量</td>
				<td>{{$summary->validUser}}</td>
			</tr>
			<tr>
				<td>车站数</td>
				<td>{{$summary->stopCount}}</td>
			</tr>
			<tr>
				<td>借车中用户</td>
				<td>{{$summary->rentingUser}}</td>
			</tr>
			<tr>
				<td>借车次数</td>
				<td>{{$summary->rentTimes}}</td>
			</tr>
			<tr>
				<td>还车次数</td>
				<td>{{$summary->returnTimes}}</td>
			</tr>
			<tr>
				<td>自行车数量</td>
				<td>{{$summary->bikeCount}}</td>
			</tr>
			<tr>
				<td>志愿者数量</td>
				<td>{{$summary->adminCount}}</td>
			</tr>
		</table>
	</div>
</div>
@stop

@section('footer')
@stop
