$(document).ready(function(){
	genderID = $('input[name="gender"]:checked').attr('id');
	$('.label-gender[for="' + genderID + '"]').addClass('btn-primary active');
	$('.label-gender').click(function() {
		if ($(this).hasClass('disabled')) return false;
		$('.label-gender').removeClass('active btn-primary');
		$(this).addClass('active btn-primary');
	});
});
