$(document).ready(function() {
	$('#curtain').fadeOut(300);
	$(window).bind('beforeunload', function() {
		$('#curtain').fadeIn(100);
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
});

