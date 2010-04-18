/*
  Default globally applicable js code for bugbase
*/

$(document).ready( function(){
	// error faders
	$('.errorflash').fadeIn(1500).fadeOut(3000);
	
	// Fix contentSpacer's height
	// sometimes JS is like a swiss army knife.
	var h1=$('#leftBox .boxContent').height();
	var h2=$('#rightBox').height();
	var maxHeight = (h1>h2 ? h1:h2) + 40;
	$('#contentSpacer').css('height',maxHeight.toString() + 'px');
	
} );

