@extends ('admin/layout', ['footer' => 'navbar-fixed-bottom'])

@section('title', '单车管理')

@section('body')
<div class="container">

<h3>单车管理</h3>


{!! $bikes->render() !!}
<div class="table-responsive">
		<table class="table table-hover table-condensed">
			<tr>
				<th>id               </th>
				<th>名称             </th>
				<th>状态         </th>
				<th>停放车站             </th>
				<th>当前密码             </th>
				<th>二维码id             </th>
				<th>创建时间             </th>
				<th>修改时间             </th>
				<th>操作                 </th>
			</tr>
        @foreach($bikes as $bike)
			
			<tr>
				<td>{{ $bike->id }}</td>
				<td>{{ $bike->name }}</td>
				<td>{{ trans('state.' . $bike->state) }}</td>
				<td>{{ $bike->stop ? $bike->stop->name : '' }}</td>
				<td>{{ $bike->password }}</td>
				<td>{{ $bike->qrcode_id }}</td>
				<td>{{ $bike->created_at }}</td>
				<td>{{ $bike->updated_at }}</td>
				<td>
{!! Form::open(array('action' => ['BikeController@destroy', 'id' => $bike->id], 'method' => 'DELETE', 'class' => 'form-inline')) !!}
	<a class="btn btn-primary btn-sm" href="{{ action('BikeController@edit', ['id' => $bike->id]) }}">编辑</a>
	<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('确定删除吗？');">删除</button>
{!! Form::close() !!}
				</td>
			</tr>

        @endforeach
		</table>
</div>
{!! $bikes->render() !!}


</div>

@stop

@section('footer')
<a href="{{ action("BikeController@create") }}" class="btn btn-primary btn-block navbar-btn"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>添加新单车</a>
@stop
