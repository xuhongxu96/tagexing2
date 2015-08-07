@extends('layouts.wechat')

@section('title', '加入踏鸽行')

@section('body')

	<div data-role="page">
		
		<div data-role="header">
			<h2>加入踏鸽行</h2>
		</div><!-- /header -->

		<div role="main" class="ui-content align-center">
			<img class="img-mid" src="{{ asset('images/logo.png') }}">
			<div class="poem">
				<p>想去借本书可是懒得走？</p>
				<p>还在发愁取快递要走好远？</p>
				<p>学生公交卡没钱了要去充值？</p>
				<p>想去附近高校害怕被堵在途中？</p>
				<br>
				<p>加入<span class="stress">踏鸽行</span>计划，从此再无烦恼！</p>
			</div><!-- /poem -->
			{!! Form::open(['action' => 'RegisterController@auth', 'data-ajax' => 'false']) !!}
					{!! Form::label('school', '请选择您的学校：') !!}
					{!! Form::select('school', [ '北京师范大学' => '北京师范大学', ], '北京师范大学') !!}
				{!! Form::submit('立刻加入！') !!}
			{!! Form::close() !!}
			<a href="{{ action('RegisterController@details') }}">没有您的学校？点此注册！（需等待审核）</a>
		</div><!-- /content -->

	</div><!-- /page -->

@endsection
