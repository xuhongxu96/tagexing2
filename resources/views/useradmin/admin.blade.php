@extends('admin.layout')
@section('title', '编辑用户管理权限')

@section('body')

	<div class="container">
<h3>编辑用户管理权限</h3>
			{!! Form::model($info, ['action' => ['UserAdminController@updateAdmin', 'id' => $info->id], 'method' => 'PUT'])!!}
<div class="form-group">
<label for="admin1">
@if ($info->auth & 1)
<input name="admin[]" id="admin1" type="checkbox" value="1" checked>
@else
<input name="admin[]" id="admin1" type="checkbox" value="1">
@endif
帮助页面管理
</label>
</div>
<div class="form-group">
<label for="admin2">
@if ($info->auth & 2)
<input name="admin[]" id="admin2" type="checkbox" value="2" checked>
@else
<input name="admin[]" id="admin2" type="checkbox" value="2">
@endif
系统管理
</label>
</div>
<div class="form-group">
<label for="admin3">
@if ($info->auth & 4)
<input name="admin[]" id="admin3" type="checkbox" value="4" checked>
@else
<input name="admin[]" id="admin3" type="checkbox" value="4">
@endif
后台日志管理
</label>
</div>
<div class="form-group">
<label for="admin4">
@if ($info->auth & 8)
<input name="admin[]" id="admin4" type="checkbox" value="8" checked>
@else
<input name="admin[]" id="admin4" type="checkbox" value="8">
@endif
借车信息管理
</label>
</div>
<div class="form-group">
<label for="admin5">
@if ($info->auth & 16)
<input name="admin[]" id="admin5" type="checkbox" value="16" checked>
@else
<input name="admin[]" id="admin5" type="checkbox" value="16">
@endif
等级管理
</label>
</div>
<div class="form-group">
<label for="admin6">
@if ($info->auth & 32)
<input name="admin[]" id="admin6" type="checkbox" value="32" checked>
@else
<input name="admin[]" id="admin6" type="checkbox" value="32">
@endif
车站管理
</label>
</div>
<div class="form-group">
<label for="admin7">
@if ($info->auth & 64)
<input name="admin[]" id="admin7" type="checkbox" value="64" checked>
@else
<input name="admin[]" id="admin7" type="checkbox" value="64">
@endif
单车管理
</label>
</div>
<div class="form-group">
<label for="admin8">
@if ($info->auth & 128)
<input name="admin[]" id="admin8" type="checkbox" value="128" checked>
@else
<input name="admin[]" id="admin8" type="checkbox" value="128">
@endif
用户认证
</label>
</div>
<div class="form-group">
<label for="admin9">
@if ($info->auth & 256)
<input name="admin[]" id="admin9" type="checkbox" value="256" checked>
@else
<input name="admin[]" id="admin9" type="checkbox" value="256">
@endif
用户管理
</label>
<div class="form-group">
	{!! Form::submit('确认信息', ['class' => 'btn btn-primary btn-lg btn-block']) !!}
			{!! Form::close() !!}
	</div>

@endsection
