$(document).ready(function(){
	genderID = $('input[name="gender"]:checked').attr('id');
	$('.label-gender[for="' + genderID + '"]').addClass('active');
	$('.label-gender').click(function() {
		$('.label-gender').removeClass('active');
		$(this).addClass('active');
	});
});
