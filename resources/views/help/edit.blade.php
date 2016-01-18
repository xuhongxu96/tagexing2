@extends('admin.layout')
@section('title', '编辑帮助页面')

@section('body')

	<div class="container">
{!! Form::open(array('action' => ['HelpController@destroy', 'id' => $help->id], 'method' => 'DELETE')) !!}
	<button type="submit" class="btn btn-danger btn-mini" onclick="return confirm('确定删除吗？');">删除</button>
{!! Form::close() !!}
			{!! Form::model($help, ['action' => ['HelpController@update', 'id' => $help->id], 'method' => 'PUT'])!!}
@include ('help.form')
			{!! Form::close() !!}
	</div>

@endsection
