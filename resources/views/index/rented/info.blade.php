<div class="list-group-item">状态：已借车</div>
<div class="list-group-item">您借的是：{{ $rent->bike->name }}</div>
<div class="list-group-item">开锁密码：{{ $rent->password }}</div>
@if ($interval->invert)
<div class="list-group-item {{ $returnTime->diffInMinutes() < 30 ? 'list-group-item-warning' : '' }}">剩余时长：<span class="restTime">{{ $interval->format('%d天%h时%i分%s秒') }}</span></div>
@else
<div class="list-group-item list-group-item-danger">已经超时：<span class="overTime">{{ $interval->format('%d天%h时%i分%s秒') }}</span></div>
@endif
<div class="list-group-item {{ $interval->invert ? '' : 'list-group-item-danger' }}">借车时间：{{ $rent->created_at }}</div>
<div class="list-group-item {{ $interval->invert ? '' : 'list-group-item-danger' }}">还车期限：{{ $returnTime }}</div>
