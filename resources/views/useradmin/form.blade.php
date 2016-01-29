@section ('head')
@stop

<h3 class="text-center">基本信息</h3>

@if ($errors->has('name'))
	<div class="form-group has-error">
@else
	<div class="form-group">
@endif
		{!! Form::label('name', '姓名：', ['class' => 'required control-label']) !!}
		<div class="input-group">
			{!! Form::input('text', 'name', null, ['class' => 'form-control', 'placeholder' => '姓名']) !!}
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
		<fieldset> 
			<label class="control-label">您是<span class="text-danger">（必填）</span>：</label>
			<div class="btn-group" role="group" data-toggle="buttons">
				<label class="btn btn-primary {{ $user->gender == 'male' ? 'active' : '' }}" for="gender-male">
					{!! Form::radio('gender', 'male', $user->gender == 'male', ['class' => 'hidden', 'id' => 'gender-male']) !!}
					帅哥
				</label>
				<label class="btn btn-primary {{ $user->gender == 'female' ? 'active' : '' }}" for="gender-female">
					{!! Form::radio('gender', 'female', $user->gender == 'female', ['class' => 'hidden', 'id' => 'gender-female']) !!}
					美女
				</label>
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
<hr>
<h3 class="text-center">状态信息</h3>

@if ($errors->has('state'))
	<div class="form-group has-error">
@else
	<div class="form-group">
@endif
		{!! Form::label('state', '状态：', ['class' => 'required control-label']) !!}
		<div class="input-group">
			{!! Form::select('state', ['normal' => '正常', 'register' => '待审核', 'rented' => '借用中', 'disabled' => '已禁用'], null, ['class' => 'form-control']) !!}
			<span class="input-group-addon">必填</span>
		</div>
@if ($errors->has('state'))
		<span class="help-block">{{ $errors->first('state') }}</span>
@endif
	</div>

@if ($errors->has('free_at'))
	<div class="form-group has-error">
@else
	<div class="form-group">
@endif
		{!! Form::label('free_at', '解禁时间（mm/dd/yyyy）：', ['class' => '']) !!}
			{!! Form::input('date', 'free_at', null, ['class' => 'form-control', 'placeholder' => '状态为已禁用时填写']) !!}
@if ($errors->has('free_at'))
		<span class="help-block">{{ $errors->first('free_at') }}</span>
@endif
	</div>

@if ($errors->has('score'))
	<div class="form-group has-error">
@else
	<div class="form-group">
@endif
		{!! Form::label('score', '积分：', ['class' => 'required']) !!}
		<div class="input-group">
			{!! Form::input('number', 'score', null, ['class' => 'form-control', 'placeholder' => '积分']) !!}
			<span class="input-group-addon">必填</span>
		</div>
@if ($errors->has('score'))
		<span class="help-block">{{ $errors->first('score') }}</span>
@endif
	</div>

@if ($errors->has('message'))
	<div class="form-group has-error">
@else
	<div class="form-group">
@endif
		{!! Form::label('message', '留言', ['class' => 'control-label']) !!}
			{!! Form::textarea('message', null, ['class' => 'form-control', 'placeholder' => '管理员留言', 'rows' => '5']) !!}
@if ($errors->has('message'))
		<span class="help-block">{{ $errors->first('message') }}</span>
@endif
	</div>
<hr>
<h3 class="text-center">学生信息</h3>

@if ($errors->has('school'))
	<div class="form-group has-error">
@else
	<div class="form-group">
@endif
		{!! Form::label('school', '学校：', ['class' => 'required']) !!}
		<div class="input-group">
			{!! Form::input('text', 'school', null, ['class' => 'form-control', 'placeholder' => '学校：北京师范大学']) !!}
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
			{!! Form::input('tel', 'student_id', null, ['class' => 'form-control', 'placeholder' => '学号：xxxxxxxxxxxx']) !!}
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
			{!! Form::input('text', 'student_type', null, ['placeholder' => '学生类型：如 本科生、研究生 等', 'class' => 'form-control']) !!}
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
		{!! Form::input('text', 'department', null, ['class' => 'form-control', 'placeholder' => '学院：信息科学与技术学院']) !!}
@if ($errors->has('department'))
		<span class="help-block">{{ $errors->first('department') }}</span>
@endif
	</div>


	{!! Form::submit('确认信息', ['class' => 'btn btn-primary btn-lg btn-block']) !!}
