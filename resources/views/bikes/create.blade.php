@extends('admin.layout')
@section('title', '添加单车')

@section('body')

	<div class="container">
			{!! Form::model(null, ['action' => ['BikeController@store'], 'method' => 'POST'])!!}
@include ('bikes.form')
			{!! Form::close() !!}

	</div>

@endsection
