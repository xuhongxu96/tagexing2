@if (isset($report) && $report)
<div class="row">
	<div class="col-xs-6">
		<a class="btn btn-primary btn-block navbar-btn btn-lg" href="{{ action('ReturnController@getStops') }}" aria-label="return">
		<span class="glyphicon glyphicon-import" aria-hidden="true"></span>
		我要还车
		</a>
	</div>
	<div class="col-xs-6">
		<a class="btn btn-primary btn-block navbar-btn btn-lg" href="{{ action('ReturnController@getReport') }}" aria-label="return">
		<span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>
		借车问题
		</a>
	</div>
</div>
@else
<a class="btn btn-primary btn-block navbar-btn btn-lg" href="{{ action('ReturnController@getStops') }}" aria-label="return">
<span class="glyphicon glyphicon-import" aria-hidden="true"></span>
我要还车
</a>
@endif
