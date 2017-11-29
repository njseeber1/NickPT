jQuery(window).load(function() {
		if(jQuery('#slider') > 0) {
        jQuery('.nivoSlider').nivoSlider({
        	effect:'fade',
    });
		} else {
			jQuery('#slider').nivoSlider({
        	effect:'fade',
    });
		}
});
	
// navigation script for responsive
var sktbefit_bowser_width = jQuery(window).width();
jQuery(document).ready(function() { 
	jQuery(".site-nav li a").each(function() {
		if (jQuery(this).next().length > 0) {
			jQuery(this).addClass("parent");
		};
	})
	jQuery(".mobile_nav a").click(function(e) { 
		e.preventDefault();
		jQuery(this).toggleClass("active");
		jQuery(".site-nav").slideToggle('fast');
	});
	adjustMenu();
})
// navigation orientation resize callbak
jQuery(window).bind('resize orientationchange', function() {
	ww = jQuery(window).width();
	adjustMenu();
});
// navigation function for responsive
var adjustMenu = function() {
	if (sktbefit_bowser_width < 989) {
		jQuery(".mobile_nav a").css("display", "block");
		if (!jQuery(".mobile_nav a").hasClass("active")) {
			jQuery(".site-nav").hide();
		} else {
			jQuery(".site-nav").show();
		}
		jQuery(".site-nav li").unbind('mouseenter mouseleave');
	} else {
		jQuery(".mobile_nav a").css("display", "none");
		jQuery(".site-nav").show();
		jQuery(".site-nav li").removeClass("hover");
		jQuery(".site-nav li a").unbind('click');
		jQuery(".site-nav li").unbind('mouseenter mouseleave').bind('mouseenter mouseleave', function() {
			jQuery(this).toggleClass('hover');
		});
	}
}

	jQuery(document).ready(function() {
		jQuery.noConflict();
        jQuery('.logo h2').each(function(index, element) {
            var heading = jQuery(element);
            var word_array, last_word, first_part;

            word_array = heading.html().split(/\s+/); // split on spaces
            last_word = word_array.pop();             // pop the last word
            first_part = word_array.join(' ');        // rejoin the first words together

            heading.html([first_part, ' <span>', last_word, '</span>'].join(''));
        });
});