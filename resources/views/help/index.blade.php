@extends ('layouts/master', ['footer' => 'navbar-fixed-bottom'])

@section('title', '使用帮助')

@section('body')

<div class="container">
	<img class="img-responsive center-block" src="{{ asset('images/logo.png') }}">

	<div class="list-group">
@foreach ($help as $item)

@if ($item->type == 'caption')

		<div class="list-group-item {{ $item->class }}">{{ $item->title }}</div>

@else

		<a class="list-group-item {{ $item->class }}" href="{{ action('HelpController@show', ['id' => $item->id]) }}">{{ $item->title }}</a>

@endif

@endforeach
	</div>
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
