@if (isset($tip) && $tip)
<p class="alert alert-{{ $tip['type'] }} alert-dismissable" role="alert">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	公告：{{ $tip['message'] }}
</p>
@endif

	<h3>踏鸽行 公共自行车 <span class="badge">2.0</span><br><small>由imall公益驱动</small></h3>
	<hr>
	<h4>欢迎 {{ $user->name }}！</h4>
@if (isset($user->message) && $user->message)
	<p class="alert alert-danger alert-dismissable" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		{{ $user->message }}
	</p>
@endif
