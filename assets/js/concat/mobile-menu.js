/**
 * mobile-menu.js
 *
 * Handles toggling the navigation menu for small screens and enables tab
 * support for dropdown menus.
 */

(function($){
	// clone the menu
	var myClone = $('.nav-menu--container').clone();
	myClone.addClass('mobile-menu');

	$('body').prepend(myClone);

	$('.menu-toggle').click(function() {
		$('.site').toggleClass('pushed');
	});

  $(document).mouseup(function(e) {
    var myTarget = $('.mobile-menu .menu');
    if ( !myTarget.is(e.target) && ( myTarget.has(e.target).length === 0 ) ) {
      $('.site').removeClass('pushed');
    }
  });

}(jQuery));