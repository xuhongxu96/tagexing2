@section ('head')
@stop

@if ($errors->has('name'))
	<div class="form-group has-error">
@else
	<div class="form-group">
@endif
		{!! Form::label('name', '名称：', ['class' => 'required control-label']) !!}
		<div class="input-group">
			{!! Form::input('text', 'name', null, ['class' => 'form-control', 'placeholder' => '名称']) !!}
			<span class="input-group-addon">必填</span>
		</div>
@if ($errors->has('name'))
		<span class="help-block">{{ $errors->first('name') }}</span>
@endif
	</div>

@if ($errors->has('min_score'))
	<div class="form-group has-error">
@else
	<div class="form-group">
@endif
		{!! Form::label('min_score', '最低分数：', ['class' => 'required control-label']) !!}
		<div class="input-group">
			{!! Form::input('number', 'min_score', null, ['class' => 'form-control', 'placeholder' => '最低分数']) !!}
			<span class="input-group-addon">必填</span>
		</div>
@if ($errors->has('min_score'))
		<span class="help-block">{{ $errors->first('min_score') }}</span>
@endif
	</div>

@if ($errors->has('max_time'))
	<div class="form-group has-error">
@else
	<div class="form-group">
@endif
		{!! Form::label('max_time', '最大借车时长（小时）：', ['class' => 'required control-label']) !!}
		<div class="input-group">
			{!! Form::input('number', 'max_time', null, ['class' => 'form-control', 'placeholder' => '最大借车时长']) !!}
			<span class="input-group-addon">必填</span>
		</div>
@if ($errors->has('max_time'))
		<span class="help-block">{{ $errors->first('max_time') }}</span>
@endif
	</div>

@if ($errors->has('max_time_special'))
	<div class="form-group has-error">
@else
	<div class="form-group">
@endif
		{!! Form::label('max_time_special', '活动时期最大借车时长（小时）：', ['class' => 'required control-label']) !!}
		<div class="input-group">
			{!! Form::input('number', 'max_time_special', null, ['class' => 'form-control', 'placeholder' => '最大借车时长']) !!}
			<span class="input-group-addon">必填</span>
		</div>
@if ($errors->has('max_time_special'))
		<span class="help-block">{{ $errors->first('max_time_special') }}</span>
@endif
	</div>
	{!! Form::submit('确认信息', ['class' => 'btn btn-primary btn-lg btn-block']) !!}
