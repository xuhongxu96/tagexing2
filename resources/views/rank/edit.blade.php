@extends('admin.layout')
@section('title', '编辑等级')

@section('body')

	<div class="container">
{!! Form::open(array('action' => ['RankController@destroy', 'id' => $rank->id], 'method' => 'DELETE')) !!}
	<button type="submit" class="btn btn-danger btn-mini" onclick="return confirm('确定删除吗？');">删除</button>
{!! Form::close() !!}
			{!! Form::model($rank, ['action' => ['RankController@update', 'id' => $rank->id], 'method' => 'PUT'])!!}
@include ('rank.form')
			{!! Form::close() !!}
	</div>

@endsection
