@extends ('admin/layout')

@section('title', '借车信息管理')

@section('body')
    <div class="container">

        <h3>借车信息管理</h3>

{!! $rent->render() !!}
<div class="table-responsive">
		<table class="table table-hover table-condensed">
			<tr>
				<th>id           </th>
				<th>类型         </th>
				<th>用户         </th>
				<th>最大借车时长 </th>
				<th>自行车       </th>
				<th>车站         </th>
				<th>密码         </th>
				<th>损坏类型     </th>
				<th>损坏描述     </th>
				<th>创建时间     </th>
				<th>修改时间     </th>
				<th>备注         </th>
				<th>操作         </th>
			</tr>
        @foreach($rent as $info)
			
			<tr>
				<td>{{ $info->id }}</td>
				<td>{{ $info->type == 'rent' ? '借车' : '还车' }}</td>
				<td>{{ $info->user->name }} <br> {{ $info->user->mobile }}</td>
				<td>{{ $info->max_time }}小时 </td>
				<td>{{ $info->bike->name }}</td>
				<td>{{ $info->stop->name }}</td>
				<td>{{ $info->password }}</td>
				<td>{{ $info->broken_type == 'bike' ? '车辆损坏' : ($info->broken_type == 'lock' ? '车锁损坏' : '其它') }}</td>
				<td>{{ $info->broken_desp }}</td>
				<td>{{ $info->created_at }}</td>
				<td>{{ $info->updated_at }}</td>
				<td><input class="form-control input-sm rentComment" id="rentComment{{ $info->id }}" type="text" value="{{ $info->comment }}"></td>
				<td><button class="btn-sm btn btn-primary" onclick="rentInfoSubmit({{ $info->id }}, '{{ csrf_token() }}', '{{ action('AdminController@postCommentRent', ['id' => $info->id]) }}')">提交</button></td>
			</tr>

        @endforeach
		</table>
</div>
{!! $rent->render() !!}

    </div>

@stop
