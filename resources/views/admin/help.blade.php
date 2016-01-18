@extends ('admin/layout', ['footer' => 'navbar-fixed-bottom'])

@section('title', '帮助页面管理')

@section('body')
<div class="container">

<h3>编辑帮助页面</h3>

<h4>帮助列表<small>点击进入编辑页面</small></h4>


	<div class="list-group">
@foreach ($help as $item)

		<a class="list-group-item {{ $item->class }}" href="{{ action('HelpController@edit', ['id' => $item->id]) }}"><span class="badge">{{ $item->item_order }}</span>{{ $item->title }}</a>

@endforeach
	</div>
</div>

@stop

@section('footer')
<a href="{{ action("HelpController@create") }}" class="btn btn-primary btn-block navbar-btn"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>添加新页面</a>
@stop
