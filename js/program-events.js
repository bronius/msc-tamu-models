/**
 * Handles the fancy scrolling for Program Events page on TAMU MSC page
 **/
$( document ).ready(function() {
	var $root = $('html, body');
	$('a').click(function() {
	    var href = $.attr(this, 'href');
	    var arr;
	    arr = href.split('-');
	    var section = arr[0];
	    var section_id = arr[1];

	    wizardScrollTo('#thumbs', 'thumb', section_id, hash);
	    wizardScrollTo('#times', 'time', section_id, href);
	    wizardScrollTo('#details', 'info', section_id, href);
	    return false;
	});
	var hash = location.hash;
	if (hash) {
	    var arr;
	    arr = hash.split('-');
	    var section = arr[0];
	    var section_id = arr[1];
	    wizardScrollTo('#thumbs', 'thumb', section_id, hash);
	    wizardScrollTo('#times', 'time', section_id, hash);
	    wizardScrollTo('#details', 'info', section_id, hash);
	}
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