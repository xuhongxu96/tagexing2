@extends('admin.layout')
@section('title', '添加等级')

@section('body')

	<div class="container">
			{!! Form::model(null, ['action' => ['RankController@store'], 'method' => 'POST'])!!}
@include ('rank.form')
			{!! Form::close() !!}

	</div>

@endsection
