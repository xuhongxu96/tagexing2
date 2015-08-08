@extends('layouts.master')

@section('title', '编辑个人信息')

@section('body')

	<div class="container">
@if (isset($user->message) && $user->message)
		<p class="alert alert-danger alert-dismissable" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			{{ $user->message }}
		</p>
@endif
@if ($tip)
		<p class="alert alert-info alert-dismissable" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			{!! $tip !!}
		</p>
@endif
			{!! Form::model($user, ['action' => ['UsersController@update', 'id' => $user->id], 'method' => 'PUT'])!!}
@include ('users.form')
			{!! Form::close() !!}

	</div>

@endsection
