@extends('layouts.master')

@section('title', '填写个人信息')

@section('body')

	<div class="container">
		
			{!! Form::open(['action' => 'UsersController@store', 'method' => 'POST']) !!}
@include ('users.form')
			{!! Form::close() !!}

	</div>

@endsection
