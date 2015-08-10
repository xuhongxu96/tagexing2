@extends ('layouts.master', ['footer' => 'navbar-fixed-bottom'])

@section ('title', '选择车站')

@section ('body')

<div class="container">

<h3>请选择车站</h3>

<div class="list-group" class="list-filter">
	<form>
		<div class="form-group has-feedback">
			<input class="form-control filter" type="search">
			<span class="glyphicon glyphicon-search form-control-feedback" aria-hidden="true"></span>
		</div>
	</form>
@foreach ($stops as $stop)
	@if ($stop->bikes->count())
		<a class="list-group-item" href="{{ action('RentController@getBikes', ['stopId' => $stop->id]) }}">
			<span class="glyphicon glyphicon-flag text-danger" aria-hidden="true"></span>
			<span class="filter-text">{{ $stop->name }}车站</span><span class="badge alert-info">{{ $stop->bikes->count() }}辆车</span>
		</a>
	@else
		<div class="list-group-item disabled">
			<span class="glyphicon glyphicon-flag" aria-hidden="true"></span>
			<span class="filter-text">{{ $stop->name }}车站</span><span class="badge">无车</span>
		</div>
	@endif
@endforeach
</div>

</div>
@stop

@section ('footer')
<a class="btn btn-default btn-block navbar-btn" href="{{ action('WechatController@redirect') }}" aria-label="home">
<span class="glyphicon glyphicon-home" aria-hidden="true"></span>
返回首页
</a>
@stop
