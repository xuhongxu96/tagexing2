@extends('admin.layout')
@section('title', '编辑车站')

@section('body')

	<div class="container">
{!! Form::open(array('action' => ['StopController@destroy', 'id' => $stop->id], 'method' => 'DELETE')) !!}
	<button type="submit" class="btn btn-danger btn-mini" onclick="return confirm('确定删除吗？');">删除</button>
{!! Form::close() !!}
			{!! Form::model($stop, ['action' => ['StopController@update', 'id' => $stop->id], 'method' => 'PUT'])!!}
@include ('stops.form')
			{!! Form::close() !!}
	</div>

@endsection
