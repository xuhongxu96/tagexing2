@extends ('layouts/master', ['footer' => 'navbar-fixed-bottom'])

@section('title', $help->page_title)

@section('body')

<div class="container">

<h3>{{ $help->page_title }}<small>{{ $help->title }}</small></h3>

{!! $help->content !!}

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
