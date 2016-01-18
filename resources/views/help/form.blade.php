@section ('head')
@stop

@if ($errors->has('item_order'))
	<div class="form-group has-error">
@else
	<div class="form-group">
@endif
		{!! Form::label('item_order', '顺序：', ['class' => 'required control-label']) !!}
		<div class="input-group">
			{!! Form::input('text', 'item_order', null, ['class' => 'form-control', 'placeholder' => '顺序']) !!}
			<span class="input-group-addon">必填</span>
		</div>
@if ($errors->has('item_order'))
		<span class="help-block">{{ $errors->first('item_order') }}</span>
@endif
	</div>

@if ($errors->has('title'))
	<div class="form-group has-error">
@else
	<div class="form-group">
@endif
		{!! Form::label('title', '标题：', ['class' => 'required control-label']) !!}
		<div class="input-group">
			{!! Form::input('text', 'title', null, ['class' => 'form-control', 'placeholder' => '标题']) !!}
			<span class="input-group-addon">必填</span>
		</div>
@if ($errors->has('title'))
		<span class="help-block">{{ $errors->first('title') }}</span>
@endif
	</div>

@if ($errors->has('type'))
	<div class="form-group has-error">
@else
	<div class="form-group">
@endif
		{!! Form::label('type', '类型：', ['class' => 'required control-label']) !!}
		<div class="input-group">
			{!! Form::select('type', ['caption' => '标题', 'link' => '帮助页面'], null, ['class' => 'form-control']) !!}
			<span class="input-group-addon">必填</span>
		</div>
@if ($errors->has('type'))
		<span class="help-block">{{ $errors->first('type') }}</span>
@endif
	</div>

@if ($errors->has('class'))
	<div class="form-group has-error">
@else
	<div class="form-group">
@endif
		{!! Form::label('class', '底色：', ['class' => 'required control-label']) !!}
		<div class="input-group">
			{!! Form::select('class', ['' => '白色（默认）', 'list-group-item-success' => '绿色', 'list-group-item-info' => '蓝色', 'list-group-item-warning' => '黄色', 'list-group-item-danger' => '红色'], null, ['class' => 'form-control']) !!}
			<span class="input-group-addon">必填</span>
		</div>
@if ($errors->has('class'))
		<span class="help-block">{{ $errors->first('class') }}</span>
@endif
	</div>

@if ($errors->has('page_title'))
	<div class="form-group has-error">
@else
	<div class="form-group">
@endif
		{!! Form::label('page_title', '页面标题：', ['class' => 'required control-label']) !!}
		<div class="input-group">
			{!! Form::input('text', 'page_title', null, ['class' => 'form-control', 'placeholder' => '页面标题']) !!}
			<span class="input-group-addon">必填</span>
		</div>
@if ($errors->has('page_title'))
		<span class="help-block">{{ $errors->first('page_title') }}</span>
@endif
	</div>

@if ($errors->has('content'))
	<div class="form-group has-error">
@else
	<div class="form-group">
@endif
		{!! Form::label('content', '页面内容：', ['class' => 'required control-label']) !!}
		{!! Editor::view(isset($help) ? $help->content : null) !!}
@if ($errors->has('content'))
		<span class="help-block">{{ $errors->first('content') }}</span>
@endif
	</div>
	{!! Form::submit('确认信息', ['class' => 'btn btn-primary btn-lg btn-block']) !!}
