$(document).ready(function() {
	var $grid = $('.grid').masonry({
		"itemSelector": ".grid-item", 
		"columnWidth": ".grid-item", 
		"percentPosition": true
	});
	$grid.imagesLoaded().progress( function() {
		$grid.masonry('layout');
	});
	
	$('.gallery-item a').colorbox({ opacity:0.85 , rel:'gal', maxWidth:'95%', maxHeight:'95%', });
});