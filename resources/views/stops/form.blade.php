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

@if ($errors->has('code'))
	<div class="form-group has-error">
@else
	<div class="form-group">
@endif
		{!! Form::label('code', '车站码：', ['class' => 'required control-label']) !!}
		<div class="input-group">
			{!! Form::input('text', 'code', null, ['class' => 'form-control', 'placeholder' => '车站码']) !!}
			<span class="input-group-addon">必填</span>
		</div>
@if ($errors->has('code'))
		<span class="help-block">{{ $errors->first('code') }}</span>
@endif
	</div>
	{!! Form::submit('确认信息', ['class' => 'btn btn-primary btn-lg btn-block']) !!}
