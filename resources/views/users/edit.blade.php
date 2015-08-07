@extends('layouts.master')

@section('title', '编辑个人信息')

@section('body')

	<div class="container">
		
		<div role="main" class="ui-content">
			{!! Form::model($user, ['action' => ['UsersController@update', 'id' => $user->id], 'method' => 'PUT'])!!}
@include ('users.form')
			{!! Form::close() !!}
		</div><!-- /content -->

	</div><!-- /page -->

@endsection
