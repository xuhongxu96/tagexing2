<div class="list-group-item">状态：待借车</div>
@if (isset($unlockPassword))
<div class="list-group-item">开锁密码：{{ $unlockPassword }}</div>
@endif
@if (isset($lockPassword))
<div class="list-group-item">锁车密码：{{ $lockPassword }}</div>
@endif
