	<div class="form-group">
@if ($user->state == 'auth' && $user->name)
	<p>姓名：{{ $user->name }}</p>
@else
	{!! Form::label('name', '姓名：', ['class' => 'required control-label']) !!}
	<div class="input-group">
		{!! Form::input('text', 'name', $user->name, ['class' => 'form-control', 'placeholder' => '姓名']) !!}
		<span class="input-group-addon">必填</span>
	</div>
@endif
	</div>

	<div class="form-group">
@if ($user->state == 'auth' && $user->gender)
	<p>您是：{{ $user->gender == 'male' ? '帅哥' : '美女' }}</p>
@else
	<fieldset> 
		<label class="control-label">您是<span class="text-warning">（必填）</span>：</label>
		{!! Form::radio('gender', 'male', $user->gender == 'male', ['class' => 'hidden', 'id' => 'gender-male']) !!}
		{!! Form::radio('gender', 'female', $user->gender == 'female', ['class' => 'hidden', 'id' => 'gender-female']) !!}
		<div class="btn-group" role="group">
			{!! Form::label('gender-male', '帅哥', ['class' => 'btn btn-default label-gender']) !!}
			{!! Form::label('gender-female', '美女', ['class' => 'btn btn-default label-gender']) !!}
		</div>
	</fieldset>
@endif
	</div>

	<div class="form-group">
	{!! Form::label('mobile', '手机：', ['class' => 'required']) !!}
	<div class="input-group">
		{!! Form::input('tel', 'mobile', $user->mobile, ['class' => 'form-control', 'placeholder' => '手机号：18888888888']) !!}
		<span class="input-group-addon">必填</span>
	</div>
	</div>

	<div class="form-group">
	{!! Form::label('email', '邮箱：', ['class' => 'required']) !!}
	<div class="input-group">
		{!! Form::input('email', 'email', $user->email, ['class' => 'form-control', 'placeholder' => '电子邮箱：yourname@xxx.com']) !!}
		<span class="input-group-addon">必填</span>
	</div>
	</div>

	<div class="form-group">
@if ($user->state == 'auth' && $user->school)
	<p>学校：{{ $user->school }}</p>
@else
	{!! Form::label('school', '学校：', ['class' => 'required']) !!}
	<div class="input-group">
		{!! Form::input('text', 'school', $user->school, ['class' => 'form-control', 'placeholder' => '学校：北京师范大学']) !!}
		<span class="input-group-addon">必填</span>
	</div>
@endif
	</div>

	<div class="form-group">
@if ($user->state == 'auth' && $user->student_id)
	<p>学号：{{ $user->student_id }}</p>
@else
	{!! Form::label('student_id', '学号：', ['class' => 'required']) !!}
	<div class="input-group">
		{!! Form::input('text', 'student_id', $user->student_id, ['class' => 'form-control', 'placeholder' => '学号：xxxxxxxxxxxx']) !!}
		<span class="input-group-addon">必填</span>
	</div>
@endif
	</div>

	<div class="form-group">
@if ($user->state == 'auth' && $user->student_type)
	<p>学生类型：{{ $user->student_type }}</p>
@else
	{!! Form::label('student_type', '学生类型：', ['class' => 'required']) !!}
	<div class="input-group">
		{!! Form::input('text', 'student_type', $user->student_type, ['placeholder' => '学生类型：如 本科生、研究生 等', 'class' => 'form-control']) !!}
		<span class="input-group-addon">必填</span>
	</div>
@endif
	</div>

	<div class="form-group">
@if ($user->state == 'auth' && $user->department)
	<p>学院：{{ $user->department }}</p>
@else
	{!! Form::label('department', '学院：') !!}
	{!! Form::input('text', 'department', $user->department, ['class' => 'form-control', 'placeholder' => '学院：信息科学与技术学院']) !!}
@endif
	</div>

	<div class="form-group">
	{!! Form::label('qq', 'QQ：') !!}
	{!! Form::input('text', 'qq', $user->qq, ['class' => 'form-control', 'placeholder' => 'QQ']) !!}
	</div>

	{!! Form::submit('确认信息', ['class' => 'btn btn-primary btn-lg btn-block']) !!}
