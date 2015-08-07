@extends('layouts.master')

@section('title', '填写个人信息')

@section('body')

	<div class="container">
		
		<div role="main" class="ui-content">
			{!! Form::open(['action' => 'UsersController@store', 'method' => 'POST']) !!}
@include ('users.form')
			{!! Form::close() !!}
		</div><!-- /content -->

	</div><!-- /page -->

@endsection
