/*
  Default globally applicable js code for bugbase
*/

$(document).ready( function(){
	// error faders
	$('.errorflash').fadeIn(1500).fadeOut(3000);
	
	$("#highlighted").fadeTo(500,0.2).fadeTo(1000,1.0);
	
	// Fix contentSpacer's height
	// sometimes JS is like a swiss army knife.
	var h1=$('#leftBox .boxContent').height();
	var h2=$('#rightBox .boxContent').height();
	var maxHeight = (h1>h2 ? h1:h2) + 40;
	if (maxHeight > 100){
		$('#contentSpacer').css('height',maxHeight.toString() + 'px');
	}
} );


// Validation helpers
//

function showValidationErrors(){
  $('.validationError').fadeIn('slow');
}

function hideValidationErrors(){
  $('#validationErrors').empty();
}

function addError(msg){
  $("#validationErrors").append("<p>"+msg+"</p");
}

