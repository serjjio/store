$(function(){
	// get the click of the create button
	$('#modalButton').click(function(){
		$('#modal').modal('show')
			//.find('#modalContent')
			//.load($(this).attr('value'));
	});
});


$(function(){
	// get the click of the create button
	$('.modalSubCreate').click(function(){
		$('#root').modal('show')
			.find('#modalContent')
			.load($(this).attr('value'));
	});
});

$(function(){
	// get the click of the create button
	$('.modalUpdate').click(function(e){
		e.preventDefault();
		$('#root').modal('show')
			.find('#modalContent')
			.load($(this).attr('href'));
	});
});







