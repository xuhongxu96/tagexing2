@extends ('layouts.master', ['footer' => 'navbar-fixed-bottom'])

@section ('title', '选择车辆')

@section ('body')

<div class="container">

<h3>{{ $stop->name }}车站<small>选择您心仪的车辆</small></h3>


<div class="list-group" class="list-filter">
	<form>
		<div class="form-group has-feedback">
			<input class="form-control filter" type="search">
			<span class="glyphicon glyphicon-search form-control-feedback" aria-hidden="true"></span>
		</div>
	</form>
@foreach ($bikes as $bike)
	@if ($bike->state == 'normal')
		<a class="list-group-item" href="{{ action('RentController@getCode', ['stopId' => $stop->id, 'bikeId' => $bike->id]) }}">
			<span class="glyphicon glyphicon-tag" aria-hidden="true"></span>
			<span class="filter-text">{{ $bike->name }}</span></span>
		</a>
	@endif
@endforeach
</div>

</div>
@stop

@section ('footer')
<a class="btn btn-default btn-block navbar-btn" href="{{ action('IndexController@redirect') }}" aria-label="home">
<span class="glyphicon glyphicon-home" aria-hidden="true"></span>
返回首页
</a>
@stop
