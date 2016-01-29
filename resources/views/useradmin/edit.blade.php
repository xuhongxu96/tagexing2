@extends('admin.layout')
@section('title', '编辑用户')

@section('body')

	<div class="container">
			{!! Form::model($info, ['action' => ['UserAdminController@update', 'id' => $info->id], 'method' => 'PUT'])!!}
@include ('useradmin.form')
			{!! Form::close() !!}
	</div>

@endsection
