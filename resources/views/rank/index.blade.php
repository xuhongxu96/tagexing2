@extends ('admin/layout', ['footer' => 'navbar-fixed-bottom'])

@section('title', '等级管理')

@section('body')
<div class="container">

<h3>等级管理</h3>


{!! $rank->render() !!}
<div class="table-responsive">
		<table class="table table-hover table-condensed">
			<tr>
				<th>id                   </th>
				<th>最低分数             </th>
				<th>名称                 </th>
				<th>最大借车时长         </th>
				<th>最大借车时长（活动） </th>
				<th>创建时间             </th>
				<th>修改时间             </th>
				<th>操作                 </th>
			</tr>
        @foreach($rank as $info)
			
			<tr>
				<td>{{ $info->id }}</td>
				<td>{{ $info->min_score }}</td>
				<td>{{ $info->name }}</td>
				<td>{{ $info->max_time }}小时</td>
				<td>{{ $info->max_time_special }}小时</td>
				<td>{{ $info->created_at }}</td>
				<td>{{ $info->updated_at }}</td>
				<td>
{!! Form::open(array('action' => ['RankController@destroy', 'id' => $info->id], 'method' => 'DELETE', 'class' => 'form-inline')) !!}
	<a class="btn btn-primary btn-sm" href="{{ action('RankController@edit', ['id' => $info->id]) }}">编辑</a>
	<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('确定删除吗？');">删除</button>
{!! Form::close() !!}
				</td>
			</tr>

        @endforeach
		</table>
</div>
{!! $rank->render() !!}


</div>

@stop

@section('footer')
<a href="{{ action("RankController@create") }}" class="btn btn-primary btn-block navbar-btn"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>添加新等级</a>
@stop
