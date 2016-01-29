@extends ('admin/layout', ['footer' => 'navbar-fixed-bottom'])

@section('title', '车站管理')

@section('body')
<div class="container">

<h3>车站管理</h3>


{!! $stops->render() !!}
<div class="table-responsive">
		<table class="table table-hover table-condensed">
			<tr>
				<th>id               </th>
				<th>名称             </th>
				<th>车站码           </th>
				<th>创建时间             </th>
				<th>修改时间             </th>
				<th>操作             </th>
			</tr>
        @foreach($stops as $stop)
			
			<tr>
				<td>{{ $stop->id }}</td>
				<td>{{ $stop->name }}</td>
				<td>{{ substr($stop->code, 0, 20) }}...</td>
				<td>{{ $stop->created_at }}</td>
				<td>{{ $stop->updated_at }}</td>
				<td>
{!! Form::open(array('action' => ['StopController@destroy', 'id' => $stop->id], 'method' => 'DELETE', 'class' => 'form-inline')) !!}
	<a class="btn btn-primary btn-sm" href="{{ action('StopController@edit', ['id' => $stop->id]) }}">编辑</a>
	<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('确定删除吗？');">删除</button>
{!! Form::close() !!}
				</td>
			</tr>

        @endforeach
		</table>
</div>
{!! $stops->render() !!}


</div>

@stop

@section('footer')
<a href="{{ action("StopController@create") }}" class="btn btn-primary btn-block navbar-btn"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>添加新车站</a>
@stop
