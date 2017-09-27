//listener on editor inputs
$('body').on('change', '.editor input', function() {
	$(this).parents('.editor').find('#submit').popover('show');
});

$(window).on('load', function() {

	//check list items
	$('.checked-list-box li').each(function() {
		if( $(this).attr('check') == 'true' ) {
			console.log('tu');
			$(this).children('i').first().removeClass('fa-square-o').addClass('fa-check-square-o');
		}
	});

});

//check/uncheck list items
$('body').on('click', '.checked-list-box li > i', function () {
	const todo = $(this).parent('li');
	const check = todo.attr('check');
	const icon = $(this);
	if( check == 'false' )  {
		todo.attr('check', 'true');
		icon.removeClass('fa-square-o').addClass('fa-check-square-o');
	} 
	else if( check == 'true' ) {
		todo.attr('check', 'false');
		icon.removeClass('fa-check-square-o').addClass('fa-square-o');
	}
});
