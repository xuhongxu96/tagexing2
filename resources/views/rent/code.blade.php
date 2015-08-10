@extends ('layouts.master', ['footer' => 'navbar-fixed-bottom'])

@section ('title', '输入车站码')

@section ('body')

<div class="container">
	<h3>输入车站码</h3>
	{!! Form::open(['action' => ['RentController@postRent', 'stopId' => $stopId, 'bikeId' => $bikeId], 'method' => 'POST'])!!}
		<div class="form-group form-group-lg">
			{!! Form::input('tel', 'code', null, ['class' => 'form-control', 'placeholder' => '车站动态码']) !!}
				<span class="help-block">
				<span class="glyphicon glyphicon-question-sign"></span>
				车站动态码用于确认用户位置是否在车站，每分钟变化一次，位于车站站牌正面，轻按按钮显示密码。
				<span>
				<a href="#">仍然不会？点此查看图文帮助</a>
		</div>
		<input class="btn btn-primary btn-block btn-lg" type="submit" value="确认">
	{!! Form::close() !!}
</div>

@stop

@section ('footer')
<a class="btn btn-default btn-block navbar-btn" href="{{ action('WechatController@redirect') }}" aria-label="home">
<span class="glyphicon glyphicon-home" aria-hidden="true"></span>
返回首页
</a>
@stop
