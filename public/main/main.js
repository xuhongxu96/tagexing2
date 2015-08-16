function timeAdd(e, a) {
	var time = $('.' + e).html().match(/\d+/g);
	for (var i = 0; i < 4; ++i) {
		time[i] = parseInt(time[i]);
	}
	time[1] += time[0] * 24;
	time[2] += time[1] * 60;
	time[3] += time[2] * 60;
	if (a)
		++time[3];
	else
		--time[3]
	time[2] = parseInt(time[3] / 60);
	time[3] %= 60;
	time[1] = parseInt(time[2] / 60);
	time[2] %= 60;
	time[0] = parseInt(time[1] / 24);
	time[1] %= 24;
	$('.' + e).html(time[0] + '天' + time[1] + '时' + time[2] + '分' + time[3] + '秒');
}
$(document).ready(function() {
	$('#curtain').fadeOut(600);
	$(window).bind('beforeunload', function() {
		$('#curtain').show();
	});

	$('.filter').each(function() {
		this.oninput = (function(event) {
			var val = $(this).val();
			var list = $(this).parentsUntil('.list-filter');
			list.children('.list-group-item').removeClass('hidden');
			list.children('.list-group-item').each(function() {
				if ($(this).children('.filter-text').html().indexOf(val) == -1) {
					$(this).addClass('hidden');
				}
			});
		})
	});

	if ($('.restTime').length) {
		setInterval(function() {
			timeAdd('restTime', 0);
		}, 1000);
	}

	if ($('.overTime').length) {
		setInterval(function() {
			timeAdd('overTime', 1);
		}, 1000);
	}
});
