@if ($errors->has('name'))
	<div class="form-group has-error">
@else
	<div class="form-group">
@endif
		{!! Form::label('name', '姓名：', ['class' => 'required control-label']) !!}
		<div class="input-group">
			{!! Form::input('text', 'name', null, ['class' => 'form-control', 'placeholder' => '姓名', $user->name ? $readonly : "" ]) !!}
			<span class="input-group-addon">必填</span>
		</div>
@if ($errors->has('name'))
		<span class="help-block">{{ $errors->first('name') }}</span>
@endif
	</div>

@if ($errors->has('gender'))
	<div class="form-group has-error">
@else
	<div class="form-group">
@endif
		<fieldset class="{{ $user->gender ? $readonly : "" }}"> 
			<label class="control-label">您是<span class="text-danger">（必填）</span>：</label>
			{!! Form::radio('gender', 'male', $user->gender == 'male', ['class' => 'hidden', 'id' => 'gender-male']) !!}
			{!! Form::radio('gender', 'female', $user->gender == 'female', ['class' => 'hidden', 'id' => 'gender-female']) !!}
			<div class="btn-group" role="group">
				{!! Form::label('gender-male', '帅哥', ['class' => 'btn btn-default label-gender ' . ($user->gender ? $readonly : "")]) !!}
				{!! Form::label('gender-female', '美女', ['class' => 'btn btn-default label-gender ' . ($user->gender ? $readonly : "")]) !!}
			</div>
		</fieldset>
@if ($errors->has('gender'))
		<span class="help-block">{{ $errors->first('gender') }}</span>
@endif
	</div>

@if ($errors->has('mobile'))
	<div class="form-group has-error">
@else
	<div class="form-group">
@endif
		{!! Form::label('mobile', '手机：', ['class' => 'required']) !!}
		<div class="input-group">
			{!! Form::input('tel', 'mobile', null, ['class' => 'form-control', 'placeholder' => '手机号：18888888888']) !!}
			<span class="input-group-addon">必填</span>
		</div>
@if ($errors->has('mobile'))
		<span class="help-block">{{ $errors->first('mobile') }}</span>
@endif
	</div>

@if ($errors->has('email'))
	<div class="form-group has-error">
@else
	<div class="form-group">
@endif
		{!! Form::label('email', '邮箱：', ['class' => 'required']) !!}
		<div class="input-group">
			{!! Form::input('email', 'email', null, ['class' => 'form-control', 'placeholder' => '电子邮箱：yourname@xxx.com']) !!}
			<span class="input-group-addon">必填</span>
		</div>
@if ($errors->has('email'))
		<span class="help-block">{{ $errors->first('email') }}</span>
@endif
	</div>

@if ($errors->has('school'))
	<div class="form-group has-error">
@else
	<div class="form-group">
@endif
		{!! Form::label('school', '学校：', ['class' => 'required']) !!}
		<div class="input-group">
			{!! Form::input('text', 'school', null, ['class' => 'form-control', 'placeholder' => '学校：北京师范大学', $user->school ? $readonly : ""]) !!}
			<span class="input-group-addon">必填</span>
		</div>
	</div>

@if ($errors->has('student_id'))
	<div class="form-group has-error">
@else
	<div class="form-group">
@endif
		{!! Form::label('student_id', '学号：', ['class' => 'required']) !!}
		<div class="input-group">
			{!! Form::input('tel', 'student_id', null, ['class' => 'form-control', 'placeholder' => '学号：xxxxxxxxxxxx', $user->student_id ? $readonly : ""]) !!}
			<span class="input-group-addon">必填</span>
		</div>
@if ($errors->has('student_id'))
		<span class="help-block">{{ $errors->first('student_id') }}</span>
@endif
	</div>

@if ($errors->has('student_type'))
	<div class="form-group has-error">
@else
	<div class="form-group">
@endif
		{!! Form::label('student_type', '学生类型：', ['class' => 'required']) !!}
		<div class="input-group">
			{!! Form::input('text', 'student_type', null, ['placeholder' => '学生类型：如 本科生、研究生 等', 'class' => 'form-control', $user->student_type ? $readonly : ""]) !!}
			<span class="input-group-addon">必填</span>
		</div>
@if ($errors->has('student_type'))
		<span class="help-block">{{ $errors->first('student_type') }}</span>
@endif
	</div>

@if ($errors->has('department'))
	<div class="form-group has-error">
@else
	<div class="form-group">
@endif
		{!! Form::label('department', '学院：') !!}
		{!! Form::input('text', 'department', null, ['class' => 'form-control', 'placeholder' => '学院：信息科学与技术学院', $user->department ? $readonly : ""]) !!}
@if ($errors->has('department'))
		<span class="help-block">{{ $errors->first('department') }}</span>
@endif
	</div>

@if ($errors->has('qq'))
	<div class="form-group has-error">
@else
	<div class="form-group">
@endif
		{!! Form::label('qq', 'QQ：') !!}
		{!! Form::input('tel', 'qq', null, ['class' => 'form-control', 'placeholder' => 'QQ']) !!}
@if ($errors->has('qq'))
		<span class="help-block">{{ $errors->first('qq') }}</span>
@endif
	</div>

	{!! Form::submit('确认信息', ['class' => 'btn btn-primary btn-lg btn-block']) !!}
