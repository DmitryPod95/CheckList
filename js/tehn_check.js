$(document).ready(function(){

	$('input[type="checkbox"]').click(function()
		{
			setTimeout(startAjax, 3000);

			function startAjax(){

				$.ajax({

					method: 'POST',
					url: "handlers/checkboxhandlers.php",
					data: {tehnCheck: $('form').serialize()},
					error:function()
						{
							alert('Ошибка при сохранении!');
						}
					});
				}
		});
});