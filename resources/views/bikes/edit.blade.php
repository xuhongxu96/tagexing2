@extends('admin.layout')
@section('title', '编辑单车')

@section('body')

	<div class="container">
{!! Form::open(array('action' => ['BikeController@destroy', 'id' => $bike->id], 'method' => 'DELETE')) !!}
	<button type="submit" class="btn btn-danger btn-mini" onclick="return confirm('确定删除吗？');">删除</button>
{!! Form::close() !!}
			{!! Form::model($bike, ['action' => ['BikeController@update', 'id' => $bike->id], 'method' => 'PUT'])!!}
@include ('bikes.form')
			{!! Form::close() !!}
	</div>

@endsection
