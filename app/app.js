//listener on editor inputs
$('body').on('change', '.editor input', function() {
	$(this).parents('.editor').find('#submit').popover('show');
});