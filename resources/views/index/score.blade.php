@extends ('layouts/master', ['footer' => 'navbar-fixed-bottom'])

@section ('title', '积分明细')

@section ('body')

<div class="container">


<div class="list-group">
@foreach ($scores as $score)
	<div class="list-group-item {{ $score->score >= 0 ? 'list-group-item-success' : 'list-group-item-warning' }}"><span class="badge">{{ $score->score }}</span>{{ $score->reason }}</div>
@endforeach
</div>

@stop

@section ('footer')
<div class="row">
<div class="col-xs-6">
	<a class="btn btn-primary btn-block navbar-btn btn-lg" href="javascript:history.go(-1);" aria-label="home">
	<span class="glyphicon glyphicon-triangle-left" aria-hidden="true"></span>
	返回上级
	</a>
</div>
<div class="col-xs-6">
	<a class="btn btn-primary btn-block navbar-btn btn-lg" href="{{ action('IndexController@redirect') }}" aria-label="home">
	<span class="glyphicon glyphicon-home" aria-hidden="true"></span>
	返回首页
	</a>
</div>
@stop

