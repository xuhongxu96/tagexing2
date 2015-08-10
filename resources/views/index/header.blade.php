<!-- 系统公告 -->
@if (isset($tip) && $tip)
	<p class="alert alert-{{ $tip['type'] }} alert-dismissable" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		公告：{{ $tip['message'] }}
	</p>
@endif

<!-- Header -->
	<h3>踏鸽行 公共自行车 <span class="label label-primary">2.0</span></h3>
	<p>由 <a href="#imall" data-toggle="collapse" aria-expanded="false" aria-controls="imall">imall公益</a> 驱动</p>

<!-- imall简介 -->
	<div class="collapse" id="imall">
		<div class="alert alert-info">
		<button type="button" class="close" data-toggle="collapse" data-target="#imall" aria-expanded="false" aria-controls="imall"><span aria-hidden="true">&times;</span></button>
		imall校园公益电商平台，募捐二手物品，卖出所得善款投资公益事业！
		<a class="btn btn-info" href="http://www.imall365.org">点此进入 imall公益商城</a>
		</div>
	</div>
	<hr>
<!-- welcome -->
	<h4>欢迎 {{ $user->name }} {{ $nick }}！</h4>

<!-- 后台对用户留言 -->
@if (isset($user->message) && $user->message)
	<p class="alert alert-danger alert-dismissable" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		{{ $user->message }}
	</p>
@endif
