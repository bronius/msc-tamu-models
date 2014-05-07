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

    arr = this.name.split('-');
    var clicked = arr[0];
    wizardScrollTheOthers(clicked, section_id, section, href);

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

function wizardScrollTheOthers(clicked, section_id, section, href) {
  wizardScrollTo('#thumbs', 'thumb', section_id, href, clicked);
  wizardScrollTo('#times', 'time', section_id, href, clicked);
  wizardScrollTo('#details', 'info', section_id, href, clicked);
}

function wizardScrollTo(container, block, id, href, clicked_element) {
	var blockid = block + '-' + id;
	var targetblock = $('a[name="'+blockid+'"]');
	$(container + ' .active').toggleClass('active');
	targetblock.toggleClass('active');
	if (clicked_element != block) {
		var top = targetblock.position().top + $(container).scrollTop() - 250;
	  $(container).animate({
	      scrollTop: top
	  }, 500, function () {
	      window.location.hash = href;
	  });
	}
}
