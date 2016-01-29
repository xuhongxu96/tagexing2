@extends('admin.layout')
@section('title', '添加车站')

@section('body')

	<div class="container">
			{!! Form::model(null, ['action' => ['StopController@store'], 'method' => 'POST'])!!}
@include ('stops.form')
			{!! Form::close() !!}

	</div>

@endsection
