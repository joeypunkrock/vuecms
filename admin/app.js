// settings
const	deleteWarningTitle = 'Are you sure?',
		deleteWarningText = 'You won\'t be able to revert this!',
		deletedTitle = 'Deleted!',
		deletedText = /* elemName + */ ' has been deleted!',
		createdTitle = /* elem + */ " created!",
		createdText = /* elemName + */ " was added successfully!";

const saveReminder = document.querySelector('#saveReminder');

// update success alert
function moduleUpdated(type, title) {
	iziToast.success({
        id: 'success',
        title: title,
        message: type + ' updated',
        position: 'topRight',
        transitionIn: 'bounceInLeft'
    });
}

// listener on editor inputs
$('body').on('change', '.editor .form-control', function() {
	// save reminder
	if ( !$( "#saveReminder" ).length ) {
		iziToast.info({
	        id: 'saveReminder',
	        title: 'Remember to save your changes',
	        position: 'topRight',
	        transitionIn: 'bounceInLeft',
	    	progressBar: false,
	    	timeout: 0
	    });
	}
});

$(function () {
	// init tooltips
	$('[data-toggle="tooltip"]').tooltip();

	$("[name='live']").bootstrapSwitch({
		onText: 'Yes',
		offText: 'No',
		labelText: 'Live',
		size: 'small'
	});
});


