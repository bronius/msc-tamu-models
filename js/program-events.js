/**
 * Handles the fancy scrolling for Program Events page on TAMU MSC page
 **/
$( document ).ready(function() {
	var $root = $('html, body');
	$('a').click(function() {
	    var href = $.attr(this, 'href');
	    var arr
	    arr = href.split('-');
	    var section = arr[0];
	    var section_id = arr[1];

	    wizardScrollTo('#times', 'time', section_id, href);
	    wizardScrollTo('#details', 'info', section_id, href);
	    return false;
	});
});

function wizardScrollTo(container, block, id, href) {
	var blockid = block + '-' + id;
	var targetblock = $('a[name="'+blockid+'"]');
	$(container + ' .active').toggleClass('active');
	targetblock.toggleClass('active');
  $(container).animate({
      scrollTop: targetblock.offset().top - 100
  }, 500, function () {
      window.location.hash = href;
  });
}
// $('#times').animate({ scrollTop: $('#times a[name="time-109"]').offset().top} , 500)