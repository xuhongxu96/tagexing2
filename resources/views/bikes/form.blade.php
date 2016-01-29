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

@if ($errors->has('state'))
	<div class="form-group has-error">
@else
	<div class="form-group">
@endif
		{!! Form::label('state', '状态：', ['class' => 'required control-label']) !!}
		<div class="input-group">
			{!! Form::select('state', ['normal' => '正常', 'rented' => '已借出', 'broken' => '损坏', 'reparing' => '修理中', 'repaired' => '修好待用'], null, ['class' => 'form-control']) !!}
			<span class="input-group-addon">必填</span>
		</div>
@if ($errors->has('state'))
		<span class="help-block">{{ $errors->first('state') }}</span>
@endif
	</div>

@if ($errors->has('stop_id'))
	<div class="form-group has-error">
@else
	<div class="form-group">
@endif
		{!! Form::label('stop_id', '停放车站：', ['class' => 'required control-label']) !!}
		<div class="input-group">
			{!! Form::select('stop_id', $stop, null, ['class' => 'form-control']) !!}
			<span class="input-group-addon">必填</span>
		</div>
@if ($errors->has('stop_id'))
		<span class="help-block">{{ $errors->first('stop_id') }}</span>
@endif
	</div>

@if ($errors->has('password'))
	<div class="form-group has-error">
@else
	<div class="form-group">
@endif
		{!! Form::label('password', '当前密码：', ['class' => 'required control-label']) !!}
		<div class="input-group">
			{!! Form::input('text', 'password', null, ['class' => 'form-control', 'placeholder' => '当前密码']) !!}
			<span class="input-group-addon">必填</span>
		</div>
@if ($errors->has('password'))
		<span class="help-block">{{ $errors->first('password') }}</span>
@endif
	</div>

@if ($errors->has('qrcode_id'))
	<div class="form-group has-error">
@else
	<div class="form-group">
@endif
		{!! Form::label('qrcode_id', '二维码id：', ['class' => 'required control-label']) !!}
		<div class="input-group">
			{!! Form::input('text', 'qrcode_id', null, ['class' => 'form-control', 'placeholder' => '二维码id']) !!}
			<span class="input-group-addon">必填</span>
		</div>
@if ($errors->has('qrcode_id'))
		<span class="help-block">{{ $errors->first('qrcode_id') }}</span>
@endif
	</div>
	{!! Form::submit('确认信息', ['class' => 'btn btn-primary btn-lg btn-block']) !!}
