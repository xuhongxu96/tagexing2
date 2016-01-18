@extends('admin.layout')
@section('title', '添加帮助页面')

@section('body')

	<div class="container">
			{!! Form::model(null, ['action' => ['HelpController@store'], 'method' => 'POST'])!!}
@include ('help.form')
			{!! Form::close() !!}

	</div>

@endsection
