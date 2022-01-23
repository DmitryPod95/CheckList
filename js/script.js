$(document).ready(function(){
	$( ".show-more" ).click(function() {

		$(this).parent(".check-top").next('.check-bottom').slideToggle("300");
	});

	$('.exit-link').click(function(){
		$.ajax({
			url: 'handlers/logout.php',
			method: 'POST',
			data: {action:'logout'},
			success: function()
				{
					location.href = '/';
				},
		});
	});
});