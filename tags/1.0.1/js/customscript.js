jQuery(document).ready(function () { 
	/* mobile menu */
	jQuery(".menu_toggle").click(function() {
		jQuery("#header_nav").toggle();
		jQuery(this).toggleClass("active");
	});

	/* menu limit */
	
    var full_width = 0;
    jQuery("ul.menu:first > li").each(function( index ) {    
        if((jQuery(this).width() + full_width) > 500) {
            jQuery(this).remove();
        }
        full_width = full_width + jQuery(this).width(); 
    });
	
	/* end - menu limit */
	
	jQuery(".fnav a:last-child").css('border-right','none');
	
	jQuery(".slidernav").tabs("div.panes > div");
	
	/* Vechiul cod pentru SlidesJS
	jQuery("#sliderr").slidesjs({
        width: 940,
        height: 528,
		play: {
		  active: false,
			// [boolean] Generate the play and stop buttons.
			// You cannot use your own buttons. Sorry.
		  effect: "slide",
			// [string] Can be either "slide" or "fade".
		  interval: 5000,
			// [number] Time spent on each slide in milliseconds.
		  auto: true,
			// [boolean] Start playing the slideshow on load.
		  swap: false,
			// [boolean] show/hide stop and play buttons
		  pauseOnHover: true,
			// [boolean] pause a playing slideshow on hover
		  restartDelay: 2500
			// [number] restart delay on inactive slideshow
		},
		navigation: {
		  active: false,
			// [boolean] Generates next and previous buttons.
			// You can set to false and use your own buttons.
			// User defined buttons must have the following:
			// previous button: class="slidesjs-previous slidesjs-navigation"
			// next button: class="slidesjs-next slidesjs-navigation"
		  effect: "slide"
			// [string] Can be either "slide" or "fade".
		}
	}); */

jQuery("#sliderr .sliderWrapper").cycle({
	fx: "fade",
	next: ".slider-buttons.left",
	prev: ".slider-buttons.right"
});
	
	if(jQuery('.buyalbum').length === 0) {
		jQuery('#header_nav').css('float','right');
	}
	
	if(jQuery('.about_banner').length === 0) {
		jQuery('.about_content').css('width','auto');
		jQuery('.about_content').css('max-width','600px');
		jQuery('.about_content').css('margin-left','0px');
	}
});