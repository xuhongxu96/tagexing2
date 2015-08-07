@extends('layouts.master')

@section('title', '加入踏鸽行')

@section('body')

		<div class="container text-center">
			<img class="img-responsive center-block" src="{{ asset('images/logo.png') }}">
			<div class="poem bg-info">
				<p>想去借本书可是懒得走？</p>
				<p>还在发愁取快递要走好远？</p>
				<p>学生公交卡没钱了要去充值？</p>
				<p>想去附近高校害怕被堵在途中？</p>
				<br>
				<p>加入<strong class="text-primary">踏鸽行</strong>计划，从此再无烦恼！</p>
			</div><!-- /poem -->
			{!! Form::open(['action' => 'AuthController@auth']) !!}
				<div class="form-group">
					{!! Form::label('school', '请选择您的学校：') !!}
					{!! Form::select('school', [ '北京师范大学' => '北京师范大学', ], '北京师范大学', ['class' => 'form-control']) !!}
				</div>
				<a href="{{ action('RegisterController@details') }}">没有您的学校？点此注册！</a>
				<br>
				<br>
				{!! Form::submit('立刻加入！', ['class' => 'btn btn-primary btn-lg btn-block']) !!}
			{!! Form::close() !!}
		</div><!-- /content -->

@endsection
