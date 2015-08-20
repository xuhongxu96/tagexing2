@extends ('layouts.master', ['footer' => 'navbar-fixed-bottom'])

@section ('title', '报告问题')

@section ('body')

<div class="container">
	<h3>请选择损坏类型</h3>
@if (isset($password))
	<button class="btn btn-warning btn-block btn-lg" data-toggle="modal" data-target="#lockBroken">车锁损坏</button>
@else
	<a class="btn btn-warning btn-block btn-lg" href="{{ action('ReturnController@getLockBroken') }}">车锁损坏</a>
@endif
	<button class="btn btn-danger btn-block btn-lg" data-toggle="modal" data-target="#bikeBroken">车辆损坏</button>
</div>


<!-- Modal -->
<div class="modal fade" id="lockBroken" tabindex="-1" role="dialog" aria-labelledby="lockBrokenLabel">
	<div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="lockBrokenLabel">车锁报修</h4>
      </div>
      <div class="modal-body">
		<p>请尝试使用该密码打开车锁</p>
		<p class="lock-pwd">{{ $password or '0' }}</p>
      </div>
      <div class="modal-footer">
        <a class="btn btn-primary" href="{{ action('ReturnController@getLockRepaired') }}">打开了</a>
        <a class="btn btn-danger" href="{{ action('ReturnController@getLockBroken') }}">无能为力</a>
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
      </div>
	</div>
</div>

<!-- Modal -->
{!! Form::open(['action' => 'ReturnController@postBikeBroken', 'class' => 'modal fade', 'id' => 'bikeBroken',
				'tabindex' => '-1', 'role' => 'dialog', 'aria-labelledby' => 'bikeBrokenLabel']) !!}
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="bikeBrokenLabel">车辆报修</h4>
      </div>
      <div class="modal-body">
		<div class="form-group">
		{!! Form::label('description', '车辆损坏描述', ['class' => 'control-label']) !!}
		{!! Form::textarea('description', null, ['class' => 'form-control']) !!}
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
		{!! Form::submit('提交', ['class' => 'btn btn-primary']) !!}
      </div>
    </div>
  </div>
{!! Form::close() !!}

@stop

@section ('footer')

<a class="btn btn-primary btn-block navbar-btn btn-lg" href="{{ action('IndexController@redirect') }}" aria-label="home">
<span class="glyphicon glyphicon-home" aria-hidden="true"></span>
返回首页
</a>

@stop
