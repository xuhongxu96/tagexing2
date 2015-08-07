@extends('layouts.master')

@section('title', '编辑个人信息')

@section('body')

	<div class="container">
		
		<div role="main" class="ui-content">
			{!! Form::open(['action' => 'UsersController@update', 'method' => 'PATCH', 'class' => '']) !!}
@include ('users.form')
			{!! Form::close() !!}
		</div><!-- /content -->

	</div><!-- /page -->

@endsection
